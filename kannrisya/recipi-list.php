<?php require '../db-connect.php'; ?>
<?php require 'header.php'; ?>

    <?php
    $pdo=new PDO($connect, USER, PASS);
    ?>
    <h1>レシピ</h1><button class="button is-light" onclick="location.href='recipi-i-form.php'">登録</button>
    <table>
    <?php
    foreach($pdo->query('select recipe_name,recipe_description,recipe_id from Recipes') as $row){
        echo '<tr><td>', $row['recipe_name'],'</td>';
        echo '<td>', $row['recipe_description'],'</td>';
        echo '<td>', '<a href = "recipi-u-form.php?recipe_id=', $row['recipe_id'] ,'">','更新','</td>';
        echo '<td>', '<a href = "recipi_delete.php?recipe_id=', $row['recipe_id'] ,'">','削除','</td></tr>';
    }
    ?>
    </table>
    <?php require 'footer.php'; ?>