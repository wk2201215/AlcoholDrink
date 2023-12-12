<?php session_start(); ?>
<?php require 'header.php'; ?>
<div class="loginheight100">
    <form action="login-output.php" method="post" class="box mx-auto my-auto width85">
<?php
    unset($_SESSION['customer']);
    echo '<div class="field">';
    echo '<label class="label">アカウントID</label>';
    echo '<input type="text" class="input" name="login_id">';
    echo '</div>';

    echo '<div class="field">';
    echo '<label class="label">パスワード</label>';
    echo '<input type="password" class="input" name="password">';
    echo '</div>';

    echo '<div class="field">';    
    echo '<input type="submit" class="button mx-auto is-link" value="ログイン" style="width:100%;">';
    echo '</div>';

    if(isset($_GET['hogeA'])){
        echo '<p class="has-text-danger">',$_GET['hogeA'],'</p>';
    }else{
        echo '<p class="has-text-danger"><br></p>';
    }
        
    echo '<div class="field">';
    echo '<label>アカウント新規作成は<a href="customer-input.php">こちら</a></label>';
    echo '</div>';
?>
    </form>
</div>
<?php require 'footer.php'; ?>
