<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('SELECT * FROM Recipes where recipe_id = ?');
    $sql->execute([$recipe_id]);
    $item=$sql->fetchAll();
    $ingredient_sql=$pdo->prepare('SELECT * FROM Recipe_ingredients where recipe_id = ?');
    $ingredient_sql->execute([$recipe_id]);
    $cooking_sql=$pdo->prepare('SELECT * FROM Recipe_cooking where recipe_id = ?');
    $cooking_sql->execute([$recipe_id]);

echo '<div class="box">';

//画像
echo '<div class="field">';
echo '<div class="image is-fullwidth has-background-info-light">';
echo '<img src="../images/cooking/',$item[0]['recipe_image_pass'],'" class="mx-auto" style="max-height:50vh;width:auto;">';
echo '</div>';
echo '</div>';
//レシピ名
echo '<div class="field">';
echo '<label class="label">',$item[0]['recipe_name'],'</label>';
echo '</div>';
//説明
echo '<div class="field">';
echo '<label>',$item[0]['recipe_description'],'</label>';
echo '</div>';
//材料
echo '<div class="field ingredient">';
echo '<label class="label">材料</label>';
echo '<div class="control">';
echo '<table id="ingredient_table" class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">';
echo '<tbody id="ingredient_tbody">';
foreach($ingredient_sql as $row){
    echo '<tr class="ingredient_item">';
    echo '<td class="width5">',$row['ingredient_number'],'</td>';
    echo '<td class="width55">',$row['ingredient_name'],'</td>';
    echo '<td class="width35">',$row['ingredient_quantity'],'</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
echo '</div>';
echo '</div>';
//作り方
echo '<div class="field cooking">';
echo '<label class="label">作り方</label>';
echo '<div class="control">';
echo '<table id="cooking_table" class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">';
echo '<tbody id="cooking_tbody">';
foreach($cooking_sql as $row){
    echo '<tr class="cooking_item">';
    echo '<td class="width5">',$row['cooking_number'],'</td>';
    echo '<td class="width95">',$row['cooking_procedure'],'</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
echo '</div>';
echo '</div>';

echo '</div>';

?>