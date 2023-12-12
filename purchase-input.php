<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'judge.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu-cartback.php'; ?>
<?php include_once 'view_counter.class.php';
$counter = new ViewCounter();
//ページ固有のID
$id = 0012;
$count = $counter->log($id,$_SESSION['customer']['id']);
// echo $count;
?>
<div class="hero-body py-5">
<?php
    if(isset($_GET['hogeA'])){
        echo '<p class="has-text-danger">',$_GET['hogeA'],'</p>';
    }
    $pdo=new PDO($connect, USER, PASS);
    $id=$_SESSION['customer']['id'];
    $sql=$pdo->prepare('select P.*,c.* from Products as P inner join Carts as c 
                        on P.product_id = c.product_id
                        where customer_id=?');
    $sql->execute([$id]);
    $sum=$discount=0;
    $count=0;
    $wari=[
        'name'=>[],
        'd'=>[],
        'dp'=>[],
        'c'=>[]
    ];
    $n=0;
    foreach ($sql as $row){
        $sum+=$row["cart_quantity"]*$row["price"];
        $count += $row["cart_quantity"];
        if($row["discount"] != 0){
        $discount+=$row['price']*($row["discount"]/100)*$row['cart_quantity'];
        $wari['name'][$n] = $row['product_name'];
        $wari['d'][$n] = $row['discount'];
        $wari['dp'][$n] = $row['price']*($row["discount"]/100);
        $wari['c'][$n] = $row['cart_quantity'];
        $n++;
        }
    }
    $fee=100;
    $total=round($sum-$discount+$fee);
    echo '<label class="label">ご請求額：￥',number_format($total),'</label>';
    echo '<div class="box">';
    echo '<p>商品合計(',$count,'点)：',number_format($sum),'円</p>';
    for( $i=0;$i<$n;$i++){
    echo '<p class="txt-limit2">割引：',$wari['name'][$i],'</p>','<p class="pl-6">-',$wari['dp'][$i],'円(',$wari['d'][$i],'%)×',$wari['c'][$i],'</p>';
    }
    echo '<p>配送料・手数料：',number_format($fee),'円','</p>';
    echo '</div>';
    echo '<label class="label">お届け先</label>';
    echo '<div class="box">';
    echo '<p>',$_SESSION['customer']['address'],'</p>';
    $_SESSION['order']=[
        'total'=>$total,
        'fee'=>$fee
    ];
    echo '<a href="customer-input.php">住所変更</a>';
    echo '</div>';
    echo '<label class="label">支払い方法</label>';
    echo '<div class="box">';
    echo '<p>',$_SESSION['customer']['payment'],'</p>';
    echo '<a href="customer-payment-input.php">支払い方法を変更</a>';
    echo '</div>';
    ?>
    <button type="button" class="button is-large is-warning mx-auto is-fullwidth" onclick="location.href='purchase-process.php'">購入を確定する</button>
</div>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>