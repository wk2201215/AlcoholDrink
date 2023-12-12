<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<div class="header"></div>
  <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
  <label for="openSidebarMenu" class="sidebarIconToggle">
    <div class="spinner diagonal part-1"></div>
    <div class="spinner horizontal"></div>
    <div class="spinner diagonal part-2"></div>
  </label>
  <div id="sidebarMenu">
    <ul class="sidebarMenuInner">
      <li>Jelena Jovanovic <span>Web Developer</span></li>
      <li><a href="https://vanila.io" target="_blank">Company</a></li>
      <li><a href="https://instagram.com/plavookac" target="_blank">Instagram</a></li>
      <li><a href="https://twitter.com/plavookac" target="_blank">Twitter</a></li>
      <li><a href="https://www.youtube.com/channel/UCDfZM0IK6RBgud8HYGFXAJg" target="_blank">YouTube</a></li>
      <li><a href="https://www.linkedin.com/in/plavookac/" target="_blank">Linkedin</a></li>
    </ul>
  </div>
  <div id='center' class="main center">
    <div class="mainInner">
      <div>PURE CSS SIDEBAR TOGGLE MENU</div>
    </div>
    <div class="mainInner">
      <div>PURE CSS SIDEBAR TOGGLE MENU</div>
    </div>
    <div class="mainInner">
      <div>PURE CSS SIDEBAR TOGGLE MENU</div>
    </div>
  </div>
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