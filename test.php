<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<?php
$pdo=new PDO($connect, USER, PASS);
    $flag=0;
    $hai=[
       'name'=>[],
       'nostock'=>[]
    ];
    $id=$_SESSION['customer']['id'];
    //cartテーブルの中身を出力
    $sql3=$pdo->prepare('select P.*,c.* from Products as P inner join Carts as c on P.product_id = c.product_id where customer_id=?');
    $sql3->execute([$id]);
    foreach ($sql3 as $row){
            $hai['name'][$flag]=$row['product_name'];
           $hai['nostock'][$flag]=$row['cart_quantity']-$row['stock'];
            $flag++;
    }
       $str='';
       for( $i=0;$i<$flag;$i++){
       $str+=$hai['name'][$i].'の在庫が'.$hai['nostock'][$i].'個足りません\n';
       }
       echo $str;
?>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>