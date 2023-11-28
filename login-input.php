<?php session_start(); ?>
<?php require 'header.php'; ?>

<form action="login-output.php" method="post">
    アカウントID<input type="text" name="login_id"><br>
    パスワード<input type="password" name="password"><br>
    <input type="submit" value="ログイン">
    アカウント新規作成は<a href="customer-input.php">こちら</a>
</form>

<?php require 'footer.php'; ?>