<?php require 'not-access.php'; ?>
<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'judge.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu-back.php'; ?>
<?php include_once 'view_counter.class.php';
$counter = new ViewCounter();
//ページ固有のID
$id = 0008;
$count = $counter->log($id,$_SESSION['customer']['id']);
// echo $count;
?>

<div class="hero-body py-5">

<?php
//DBに接続
$pdo=new PDO($connect, USER, PASS);
$id=$_SESSION['customer']['id'];

//小計の計算

$sql=$pdo->prepare('select * from Orders where order_id=?');
$sql->execute([$_GET['order_id']]);
foreach ($sql as $row){
$sum=0;
$count=0;
$total=$row["total"];
$date=new DateTime($row["order_date"]);
$address=$row["shipping_address"];
$payment=$row["payment"];
$postage=$row["postage"];
$sql2=$pdo->prepare('select * from Order_details where order_id=?');
$sql2->execute([$_GET['order_id']]);
foreach ($sql2 as $row2){
    $sum+=$row2['payment_price'];
    $count+=$row2['quantity'];
}
}

echo '<div class="block">';
//注文合計
echo '<div class="block mb-4">';
echo '<label class="label">注文の合計：￥',number_format($total),'</label>';
echo '<p>商品合計(',$count,'点)：￥',number_format($sum),'</p>';
echo '<p>配送料・手数料：￥',number_format($postage),'</p>';
echo '</div>';
//注文日
echo '<div class="block mb-4">';
echo '<label class="label">注文日</label>';
echo '<p>',$date->format('Y年m月d日'),'</p>';
echo '</div>';
//お届け先
echo '<div class="block mb-4">';
echo '<label class="label">お届け先</label>';
echo '<p>',$address,'</p>';
echo '</div>';
//支払い方法
echo '<div class="block mb-4">';
echo '<label class="label">支払い方法</label>';
echo '<p>',$payment,'</p>';
echo '</div>';
echo '</div>';
echo '<hr>';

//商品を出力
$sql=$pdo->prepare('select * from Order_details where order_id=?');
$sql->execute([$_GET['order_id']]);
foreach ($sql as $row){
    $sql2=$pdo->prepare('select * from Products where product_id=?');
    $sql2->execute([$row["product_id"]]);
    foreach ($sql2 as $row2){
        echo '<div class="columns is-mobile box mb-4 px-0 py-0">';

        echo '<div class="column is-one-third">'; 
        echo '<figure class="cart_image">';
        echo '<a href="detail.php?id=',$row["product_id"],'">';
        echo '<img alt="images" class="mx-auto" src="images/products/',$row2['image_pass'],'">';
        echo '</a>';
        echo '</fugure>';
        echo '</div>';

        echo '<div class="column is-two-thirds">';
        echo '<div>';
        echo '<p class="txt-limit1">',$row2["product_name"],'</p>';
        echo '</div>';
        echo '<div class="my-1">';
        echo '<label>￥',number_format($row2["price"]),'</label>';
        echo '</div>';
        echo '<div>';
        echo '<label style="margin-right: -1em;font-size: 0.97em;">数量：',$row["quantity"],'</label>';
        echo '</div>';
        echo '</div>';

        echo '</div>';
    }
}
?>

</div>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>