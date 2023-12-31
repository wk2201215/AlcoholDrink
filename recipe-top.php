<?php require 'not-access.php'; ?>
<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'judge.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<?php include_once 'view_counter.class.php';
$counter = new ViewCounter();
//ページ固有のID
$id = 0017;
$count = $counter->log($id,$_SESSION['customer']['id']);
// echo $count;
?>

<div class="hero-body py-5">
<label class="label">Myレシピ</label>

<div class="is-flex">
<div id="Myrecipes" class="dropdown mx-auto">
    <div class="dropdown-trigger">
        <button class="button is-large" aria-haspopup="true" aria-controls="dropdown-menu" @click="Myrecipes_dropdown">
            <span>my recipe name</span>
            <span class="icon is-small">
            <i class="fas fa-angle-down" aria-hidden="true"></i>
            </span>
        </button>
    </div>
    <div class="dropdown-menu Mydropdown" id="dropdown-menu" role="menu">
        <div class="dropdown-content">
<?php
    $pdo=new PDO($connect, USER, PASS);
    $id=$_SESSION['customer']['id'];
    //$id=1;
    $sql=$pdo->prepare('SELECT recipe_id,recipe_name FROM Recipes where customer_id = ?');
    $sql->execute([$id]);
    foreach($sql as $row){
        echo '<div class="dropdown-item columns is-mobile mx-0 my-0 Myrecipe">';
        echo '<a href="recipe-detail.php?recipe_id=',$row['recipe_id'],'" class="column is-three-fifths">';
        echo '<p class="txt-limit2">',$row['recipe_name'],'</p>';
        echo '</a>';
        echo '<a href="recipe-form.php?recipe_id=',$row['recipe_id'],'" class="column has-text-centered is-one-fifth">';
        echo '編集';
        echo '</a>';
        echo '<a onclick="delete_recipe(event)" class="column has-text-centered is-one-fifth">';
        echo '<input type="hidden" value="',$row['recipe_id'],'">';
        echo '<input type="hidden" value="',$row['recipe_name'],'">';
        echo '削除';
        echo '</a>';
        echo '</div>';
    }    
?>
    </div>
  </div>
</div>
</div>

<div class="is-flex">
    <a class="button is-link is-medium mx-auto my-3" href="recipe-form.php">新規投稿</a>
</div>

<label class="label">みんなのレシピ</label>

<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->query('SELECT * FROM Recipes');

foreach($sql as $row){
    echo '<a class="box media" href="recipe-detail.php?recipe_id=',$row['recipe_id'],'" style="overflow: hidden;">';
    echo '<figure class="media-left">';
    echo '<div class="media_recipe_image image is-96x96">';
    echo '<img src="images/cooking/',$row['recipe_image_pass'],'" alt="image">';
    echo '</div>';
    echo '</figure>';
    echo '<div class="media-content">';
    echo '<div class="content">';
    echo '<label class="label">',$row['recipe_name'],'</label>';
    echo '<p class="txt-limit1">',$row['recipe_description'],'</p>';
    echo '</div>';
    echo '</div>';
    echo '</a>';
}
?>

</div>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>