<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'judge.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu-back.php'; ?>

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

    $wari=[
        'name'=>[],
        'd'=>[],
        'dp'=>[],
        'c'=>[]
    ];
    $n=0;
    foreach ($sql as $row){
        $sum+=$row["cart_quantity"]*$row["price"];
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
    echo '<p>ご請求金額',$total,'</p>';
    echo '<p>小計',$sum,'</p>';
    for( $i=0;$i<$n;$i++){
    echo '<p>割引',$wari['name'][$i],$wari['dp'][$i],'円(',$wari['d'][$i],'%)×',$wari['c'][$i],'</p>';
    }
    echo '<p>配送料・手数料',$fee,'円','</p>';

    echo 'お届け先';
    
    echo $_SESSION['customer']['address'];
    $_SESSION['order']=[
        'total'=>$total,
        'fee'=>$fee
    ];
    ?>
    <button type="button" onclick="location.href='customer-input.php'">住所変更</button><br>
<?php
    echo '支払い方法';
    echo $_SESSION['customer']['payment'];
    ?>
    <button type="button" onclick="location.href='customer-payment-input.php'">支払い方法を変更</button><br>
    <button type="button" onclick="location.href='purchase-process.php'">購入を確定する</button>

<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>