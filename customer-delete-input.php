<?php require 'not-access.php'; ?>
<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'judge.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu-back.php'; ?>
<?php include_once 'view_counter.class.php';
$counter = new ViewCounter();
//ページ固有のID
$id = 0002;
$count = $counter->log($id,$_SESSION['customer']['id']);
// echo $count;
?>
<div class="displaycenter">
<?php
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
?>
</div>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>