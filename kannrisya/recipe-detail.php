<?php require '../db-connect.php'; ?>
<?php require 'header.php'; ?>

<?php $recipe_id=$_GET['recipe_id']; ?>
<?php require 'recipe-show.php'; ?>
<a class="button is-link is-medium mx-auto my-3" href="recipe-top.php">戻る</a>

<?php require 'footer.php'; ?>