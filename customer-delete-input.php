<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'header-menu-back.php'; ?>
<div class="displaycenter">
<?php
if(isset($_SESSION['customer'])){
    echo '<div style="width:85%;">';
    echo '<div class="field mb-5">';
    echo '<label class="label has-text-danger">よくお読みください</label>';
    echo '<p>退会すると、アカウントに関連付けられた
            データはすべて削除されます。なお、削除
            されたデータの復元はできません。そのため、
            退会されたアカウントに関するお問い合わせは
            お受けできなくなります。また、
            投稿されたレシピ情報など一部のデータは
            退会後も削除されません。</p>';
    echo '</div>';
    echo '<form class="field" method="post" action="customer-delete-output.php" name="customer_delete" id="form">';
    echo '<label class="field checkbox mb-5">';
    echo '<input type="checkbox" name="k" id="check" value="1" required>';
    echo '今後このアカウントを使用しません。';
    echo '</label>';
    echo '<button class="button" onclick="delete_customer()" style="width:100%;" type="submit">アカウントを削除</button>';
    echo '</form>';
    echo '</div>';
}else{
    echo '<div class="has-text-centered" style="width:100%;">';
    echo '<p class="block title is-5">ログインしてください。</p>';
    echo '</div>';
}
?>
</div>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>