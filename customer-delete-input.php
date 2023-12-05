<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<div class="displaycenter">
    <div style="width:85%;">
        <div class="field mb-5">
            <label class="label has-text-danger">よくお読みください</label>
            <p>退会すると、アカウントに関連付けられた
            データはすべて削除されます。なお、削除
            されたデータの復元はできません。そのため、
            退会されたアカウントに関するお問い合わせは
            お受けできなくなります。また、
            投稿されたレシピ情報など一部のデータは
            退会後も削除されません。</p>
        </div>
        <form class="field" method="post" action="customer-delete-output.php" name="customer_delete" id="form">
        <label class="field checkbox mb-5">
            <input type="checkbox" name="k" id="check" value="1" required>
            今後このアカウントを使用しません。
        </label>
            <button class="button" onclick="delete_customer()" style="width:100%;" type="submit">アカウントを削除</button>
        </form>
    </div>
</div>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>