<?php require 'header.php'; ?>

<div class="level-item">
    <div class="field has-addons">
        <form action = "shouhin-insert.php" method="post">
        <p><label class="has-text-weight-semibold">商品名</label><input type = "text" name = "product_name">
        <label class="has-text-weight-semibold">商品種別</label><input type = "text" name = "categori_name"></p><br>
        <p><label class="has-text-weight-semibold">販売価格</label><input type = "text" name = "price">
        <label class="has-text-weight-semibold">商品画像パス</label><input type = "text" name = "image_pass"></p><br>
        <p><label class="has-text-weight-semibold">商品説明</label><textarea name="description" class="textarea is-normal"></textarea></p><br>
        <p class="has-text-centered"><input class=" button is-link is-medium" type = "submit" value = "登録"></p>
        </form>
    </div>
</div>
<button class="button is-light tabs is-right" onclick="location.href='shouhin-list.php'">戻る</button>

<?php require 'footer.php'; ?>