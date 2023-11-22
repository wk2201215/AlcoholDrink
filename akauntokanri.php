<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css"/>
<!-- blumaCSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css"/>
<!-- アイコン -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <title>購入完了</title>
    <link rel="stylesheet" href="../css/akauntokanri.css"/>
</head>
<body>
<?php require 'header-menu.php'; ?>
    <?php
    echo '<div class="mar">';

    echo '<div class="mt-6">';
    echo '<input type="submit" class="button is-primary is-large is-fullwidth "  value="会員情報の変更">';
echo '</div>';

echo '<div class="mt-6">';
    echo '<input  type="submit" class="button is-primary is-large is-fullwidth"  value="支払い方法の変更">';
echo '</div>';

echo '<div class="mt-6">';
    echo '<input  type="submit" class="button is-primary is-large is-fullwidth"  value="注文履歴">';
echo '</div>';

echo '<div class="mt-6">';
   echo ' <input  type="submit" class="button is-primary is-large is-fullwidth"  value="ログアウト">';
echo '</div>';

echo '<div class="mt-6">';
    echo '<input  type="submit" class="button is-primary is-large is-fullwidth"  value="退会">';
echo '</div>';

echo '</div>';
?>
<?php require 'footer-menu.php'; ?>

<!-- Vue.js -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<!-- Common.Script -->
<script src="../script/common.js"></script>

</body>
</html>