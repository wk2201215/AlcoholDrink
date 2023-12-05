<?php require '../db-connect.php'; ?>
<?php require 'header.php'; ?>

<!-- <label class="label">Myレシピ</label>

<div class="is-flex">
<div id="Myrecipes" class="dropdown mx-auto">
    <div class="dropdown-trigger">
        <button class="button is-large" aria-haspopup="true" aria-controls="dropdown-menu" @click="Myrecipes_dropdown">
            <span>your recipe name</span>
            <span class="icon is-small">
            <i class="fas fa-angle-down" aria-hidden="true"></i>
            </span>
        </button>
    </div>
    <div class="dropdown-menu Mydropdown" id="dropdown-menu" role="menu">
        <div class="dropdown-content">
<?php
    // $pdo=new PDO($connect, USER, PASS);
    // //$id=$_SESSION['customer']['id'];
    // $id=1;
    // $sql=$pdo->prepare('SELECT recipe_id,recipe_name FROM Recipes where customer_id = ?');
    // $sql->execute([$id]);
    // foreach($sql as $row){
    //     echo '<div class="dropdown-item columns is-mobile mx-0 my-0 Myrecipe" style="max-width: 90vw;">';
    //     echo '<a href="recipe-detail.php?recipe_id=',$row['recipe_id'],'" class="column is-three-fifths">';
    //     echo '<p class="txt-limit2">',$row['recipe_name'],'</p>';
    //     echo '</a>';
    //     echo '<a href="recipi-u-form.php?recipe_id=',$row['recipe_id'],'" class="column has-text-centered is-one-fifth">';
    //     echo '<p class="txt-limit2">','編集','</p>';
    //     echo '</a>';
    //     echo '<a href="recipi_delete.php?recipe_id=',$row['recipe_id'],'" class="column has-text-centered is-one-fifth">';
    //     echo '<p class="txt-limit2">','削除','</p>';
    //     echo '</a>';
    //     echo '</div>';
    // }    
?>
    </div>
  </div>
</div>
</div> -->
<h1 class="title">レシピ</h1>

<div class="is-flex">
    <a class="button is-link is-medium mx-auto my-3" href="recipe-i-form.php">新規投稿</a>
</div>

<!-- <label class="label">みんなのレシピ</label> -->

<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->query('SELECT * FROM Recipes');

foreach($sql as $row){
    echo '<div class="box media">';
    echo '<a style="width: 1000px;" href="recipe-detail.php?recipe_id=',$row['recipe_id'],'">';
    echo '<figure class="media-left">';
        echo '<div class="media_recipe_image image is-96x96">';
            echo '<img src="../images/cooking/',$row['recipe_image_pass'],'" alt="image">';
        echo '</div>';
    echo '</figure>';
        echo '<div class="media-content">';
            echo '<div class="content1">';
            //echo '<label class="label">',$row['recipe_name'],'</label>';
                echo 'レシピ名：',$row['recipe_name'];
            echo '</div>';
            echo '<div class="content2">';
    // echo '<p class="txt-limit1">',$row['recipe_description'],'</p>';
    // echo '<div class="txt-limit1">',$row['recipe_description'],'</div>';
                echo '作り方：',$row['recipe_description'];
            echo '</div>';
        echo '</div>';
    echo '</a>';
    echo '<nav class="level">';
        echo '<div class="level-right">';
            echo '<div class="level-item">';
    //echo '<div class="content">';
    echo '<a class="button  is-light" href="recipe-u-form.php?recipe_id=', $row['recipe_id'] ,'">','更新</a>';
    echo '<a class="button  is-light" href="recipi_delete.php?recipe_id=', $row['recipe_id'] ,'">','削除</a>';
            echo '</div>';
        echo '</div>';
    echo '</nav>';
    echo '</div>';
}
?>

<?php require 'footer.php'; ?>