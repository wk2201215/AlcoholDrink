<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<?php
$pdo=new PDO($connect, USER, PASS);
$sql=$pdo->query('select * from Products');
echo '<div class="top_products">';
foreach ($sql as $i => $row) {
   $id=$row['product_id'];
   echo '<div style="width:50vw;">'; 
   echo '<div class="box p-0 m-1">';
   echo '<figure class="image is-fullwidth has-background-white-ter full_image py-5" style="height:35vh">';
   echo '<a class="center_image" href="detail.php?id=',$id,'"><img alt="images" src="images/products/',$row['image_pass'],'"></a>';
   echo '</figure>';
   echo '<div style="height:calc(3rem * 1.5)">';
   echo '<a class="txt-limit3" style="text-decoration:none;">',$row['product_name'],'</a>';
   echo '</div>';
   echo '<div class="py-3">';
   echo '<p class="subtitle txt-limit2 has-text-danger py-0">￥',number_format($row['price']),'</p>';
   echo '</div>';
   echo '</div>';
   echo '</div>';
}
echo '</div>';
?>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>