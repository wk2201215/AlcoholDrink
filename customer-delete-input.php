<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<p>よくお読みください</p>
<p>退会すると、アカウントに関連付けられた
    データはすべて削除されます。なお、削除
    されたデータの復元はできません。そのため、
    退会されたアカウントに関するお問い合わせは
    お受けできなくなります。また、
    投稿されたレシピ情報など一部のデータは
    退会後も削除されません。</p>
<form method="post" action="customer-delete-output.php">
    <input type="checkbox" name="k" value="1" required>今後このアカウントを使用しません。
    <input type="submit" value="アカウントを削除する">
</form>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>