<?php require 'header.php'; ?>

<form action="login-output.php" method="post">
<?php
    unset($_SESSION['control']);
    echo '<div class="field">';
    echo '<label class="label">管理者名</label>';
    echo '<input type="text" class="input" name="name">';
    echo '</div>';

    echo '<div class="field">';
    echo '<label class="label">パスワード</label>';
    echo '<input type="password" class="input" name="password">';
    echo '</div>';

    echo '<div class="field">';
    echo '<p class="has-text-centered">';    
    echo '<input type="submit" class="button mx-auto is-link" value="ログイン">';
    echo '</p>';
    echo '</div>';

    if(isset($_GET['hogeA'])){
        echo '<p class="has-text-danger">',$_GET['hogeA'],'</p>';
    }else{
        echo '<p class="has-text-danger"><br></p>';
    }
?>

</form>

<?php require 'footer.php'; ?>