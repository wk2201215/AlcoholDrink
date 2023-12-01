<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<form action="login-output.php" method="post">
    <?php
        echo '<div class="field">';
        echo '<label class="label">アカウントID</label>';
        echo '<input type="text" class="input" name="login_id"><br>';
        echo  '</div>';

        echo '<div class="field">';
        echo '<label class="label">パスワード</label>';
        echo  '<input type="password" class="input" name="password"><br>';
        echo '</div>';

        echo '<div class="field">';    
        echo  '<input type="submit" class=" button mx-auto " value="ログイン">';
        echo '</div>';
        
        echo '<div class="field">';
        echo  '<label>アカウント新規作成は<a href="customer-input.php">こちら</a></label>';
        echo '<div class="field">';
    ?>
</form>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>