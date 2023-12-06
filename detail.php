<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<div class="hero-body py-5">
<?php 
$pdo=new PDO($connect, USER, PASS);
$sql=$pdo->prepare('select * from Products where product_id=?');
$sql->execute([$_GET['id']]);
foreach($sql as $row){
    $id=$row['product_id'];
    echo '<figure class="box product_image_slide">';
    echo '<img class="mx-auto" alt="images" src="images/products/',$row['image_pass'],'" style="width:auto;height:100%;">';
    echo '</figure>';
    echo '<form action="cart-insert.php" method="post" class="block">';
    // echo '<p>商品番号:',$row['id'],'</p>';
    echo '<div class="block">';
    echo '<label class="heading" style="font-size: 16px;font-weight: bolder;">商品名</label>';
    echo '<p class="txt-limit1 ml-4">',$row['product_name'],'</p>';
    echo '</div>';
    echo '<div class="block price mb-0">';
    echo '<label class="heading" style="font-size: 18px;">￥</label>';
    echo '<p class="title">',number_format($row['price']),'</p>';
    echo '<label class="heading" style="font-size: 17px;">税込</label>';
    echo '</div>';
    echo '<div class="block">';
    echo '<label class="selectbox-001">';
    echo '<select name="count" class="pl-5">';
    for($i=0;$i<=$row['stock'];$i++){
        echo '<option value="',$i,'">数量：',$i,'</option>';
    }
    echo '</select>';
    echo '</label>';
    echo '</div>';
    echo '<input type="hidden" name="id" value="',$row['product_id'],'">';
    echo '<input type="hidden" name="name" value="',$row['product_name'],'">';
    // echo '<input type="hidden" name="category" value="',$row['category_id'],'">';
    echo '<input type="hidden" name="price" value="',$row['price'],'">';
    echo '<div class="is-flex block">';
    echo '<input class="button is-large is-warning mx-auto Obutton" type="submit" value="カートに入れる">';
    echo '</div>';
    echo '<hr>';
    echo '<div class="block">';
    echo '<label class="label">商品説明</label>';
    echo '<hr>';
    echo '<p style="white-space: pre-wrap;">',$row['product_description'],'</p>';
    echo '</div>';
    echo '</form>';
    echo '<div class="block">';
    echo '<a href="favorite-insert.php?id=',$row['product_id'],'">お気に入りに追加</a>';
    echo '</div>';
}
echo '</table>';
?>
</div>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>