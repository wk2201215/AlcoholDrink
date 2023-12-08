<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'judge.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu-back.php'; ?>

<div class="hero-body py-5">

<?php
//DBに接続
$pdo=new PDO($connect, USER, PASS);
$id=$_SESSION['customer']['id'];

//小計の計算
$sum=0;
$sql=$pdo->prepare('select * from Order_details where order_id=?');
$sql->execute([$_GET['order_id']]);
foreach ($sql as $row){
    $sql2=$pdo->prepare('select * from Products where product_id=?');
    $sql2->execute([$row["product_id"]]);
    foreach ($sql2 as $row2){
            $sum+=$row["quantity"]*$row2["price"];
    }
}
$sql=$pdo->prepare('select * from Orders where order_id=?');
$sql->execute([$_GET['order_id']]);
foreach ($sql as $row){
$date=$row["order_date"];
$address=$row["shipping_address"];
$payment_id=$row["payment"];
}
$sql=$pdo->prepare('select * from Payments where payment_id=?');
$sql->execute([$payment_id]);
$result=$sql->fetchAll();
$payment=$result[0]['payment_name'];
echo '<div class="block">';
//注文合計
echo '<div class="block price mb-4">';
echo '<label class="heading" style="font-size: 1.8rem;">注文の合計：</label>';
echo '<p>￥',number_format($sum),'</p>';
echo '</div>';
//注文日
echo '<div class="block price mb-4">';
echo '<label class="heading" style="font-size: 1.8rem;">注文日：</label>';
echo '<p>',$date,'</p>';
echo '</div>';
//お届け先
echo '<div class="block price mb-4">';
echo '<label class="heading" style="font-size: 1.8rem;">お届け先：</label>';
echo '<p>',$address,'</p>';
echo '</div>';
//支払い方法
echo '<div class="block price mb-4">';
echo '<label class="heading" style="font-size: 1.8rem;">支払い方法：</label>';
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