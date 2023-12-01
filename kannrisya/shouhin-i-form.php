<?php require 'header.php'; ?>

<div class="level-item">
    <div class="field has-addons">
        <form action = "shouhin-insert.php" method="post">
        <p>商品名<input type = "text" name = "product_name">
        商品種別<input type = "text" name = "categori_name"></p><br>
        <p>販売価格<input type = "text" name = "price">
        商品画像パス<input type = "text" name = "image_pass"></p><br>
        <p>商品説明<textarea name="description" class="textarea is-normal"></textarea></p><br>
        <p><input type = "submit" value = "登録"></p>
        </form>
    </div>
</div>

<?php require 'footer.php'; ?>