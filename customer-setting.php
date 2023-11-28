<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<button type="button" onclick="location.href='customer-input.php'">会員情報の変更</button>
<br>
<button type="button" onclick="location.href='customer-payment-input.php'">支払い方法の変更</button>
<br>
<button type="button" onclick="location.href='history.php'">注文履歴</button>
<br>
<button type="button" onclick="location.href='logout.php'">ログアウト</button>
<br>
<button type="button" onclick="location.href='customer-delete-input.php'">退会</button>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>