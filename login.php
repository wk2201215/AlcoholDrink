<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php
    if(isset($_GET['hogeA'])){
        echo $_GET['hogeA'];
    }
?>
<form action="login-output2.php" method="post">
    アカウントID<input type="text" name="login_id"><br>
    パスワード<input type="password" name="password"><br>
    <input type="submit" value="ログイン">
    アカウント新規作成は<a href="customer-input.php">こちら</a>
</form>

<?php require 'footer.php'; ?>