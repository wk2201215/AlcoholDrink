<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>

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

<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>