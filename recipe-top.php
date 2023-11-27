<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>

<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->query('SELECT * FROM Recipes');

foreach($sql as $row){
    echo '<a class="media media_recipe" href="recipe-detail.php?recipe_id=',$row['recipe_id'],'">';
    echo '<figure class="media-left">';
    echo '<div class="media_recipe_image image is-96x96">';
    echo '<img src="images/cooking/',$row['recipe_image_pass'],'">';
    echo '</div>';
    echo '</figure>';
    echo '<div class="media-content">';
    echo '<div class="content">';
    echo '<label class="label">',$row['recipe_name'],'</label>';
    echo '<p class="txt-limit">',$row['recipe_description'],'</p>';
    echo '</div>';
    echo '</div>';
    echo '</a>';
}
?>

<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>