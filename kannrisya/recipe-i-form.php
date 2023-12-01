<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>alcohol</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css"/>
</head>
<body>
<h1>レシピ投稿画面</h1>

<form action = "recipe-insert.php" class="box" method="post" enctype="multipart/form-data">
<div class="field" id="cookingimage">
    <div class="file is-boxed image has-name is-fullwidth">
        <label class="file-label">
            <input class="file-input" type="file" name="cooking_image" accept="image/*" @change="onImageUploaded">
            <span class="file-cta">
                <span class="file-icon"><i class="fas fa-upload"></i></span>
                <span class="file-label has-text-centered">
                    料理の写真をのせる
                </span>
            </span>
            <span class="file-name has-text-centered">
                {{ image_name }}
            </span>
        </label>
    </div>
</div>
<div class="field">
    <label class="label">レシピ名</label>
    <div class="control">
        <input type = "text" class="input" name = "recipe_name" required>
    </div>
</div>
<div class="field ingredient">
    <label class="label">材料</label>
    <div class="control">
        <table id="ingredient_table">
            <tbody id="ingredient_tbody">
                <tr class="ingredient_item">
                    <td class="width55"><input type = "text" class="input mb-2" name = "ingredient_name[]" placeholder="材料" required></td>
                    <td class="width35"><input type = "text" class="input mb-2" name = "ingredient_quantity[]" placeholder="分量" required></td>
                    <td class="width5 clear-column pb-2"><span class="ingredient_close-icon" onclick="deleteIngredient(this)">✖</span></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td ><button id="ingredient_add" type="button" onclick="addIngredientRow()">＋材料を追加</button></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="field cooking">
    <label class="label">作り方</label>
    <div class="control">
        <table id="cooking_table">
            <tbody id="cooking_tbody">
                <tr class="cooking_item">
                    <td class="width95 pr-2"><textarea class="textarea mb-2" name = "cooking_procedure[]" placeholder="作り方" rows="2" cols="40" required></textarea></td>
                    <td class="width5 clear-column pb-2"><span class="cooking_close-icon" onclick="deleteCooking(this)">✖</span></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td><button id="cooking_add" type="button" onclick="addCookingRow()">＋作り方を追加</button></td>
                    <!-- <td><button id="cooking_add" type="button" onclick="addCookingRow()">＋作り方を追加</button></td> -->
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="field">
    <label class="label">説明</label>
    <div class="control">
        <textarea class="textarea" name="recipe_description" rows="4" cols="40"></textarea>
    </div>
</div>
<div class="field has-text-right">
<input class="button is-link" type = "submit" value = "投稿">
</div>
</form>
<!-- Vue.js -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<!-- Common.Script -->
<script src="js/common.js"></script>

<!-- <form action = "recipe-insert.php" method="post">
    レシピ名<input type = "text" name = "recipe_name"><br>
    <div id="ingredient">
        材料<input type = "text" name = "ingredient_name[]">
        数量<input type = "text" name = "ingredient_quantity[]">
        <button id="add" type="button">+</button><br>
    </div>
    レシピ画像<input type = "text" name = "recipe_image_pass"><br>
    作り方<textarea name="recipe_description" rows="4" cols="40"></textarea>
    <input type = "submit" value = "投稿">
</form> -->
</body>
</html>