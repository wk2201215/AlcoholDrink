<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>


<label class="label">注文</label>

<ul class="field box setting_ul">
<li class="control has-icons-right">
<a class="input" href="history.php">注文履歴</a>
<span class="icon is-right is-medium">
<i class="fa fa-angle-right"></i>
</span>
</li>
</ul>

<label class="label">アカウントサービス</label>

<ul class="field box setting_ul">
<li class="control has-icons-right">
<a class="input" href="customer-input.php">会員情報の変更</a>
<span class="icon is-right is-medium">
<i class="fa fa-angle-right"></i>
</span>
</li>
<li class="control has-icons-right">
<a class="input" href="customer-payment-input.php">支払い方法の変更</a>
<span class="icon is-right is-medium">
<i class="fa fa-angle-right"></i>
</span>
</li>
<li class="control has-icons-right">
<a class="input" href="logout.php">ログアウト</a>
<span class="icon is-right is-medium">
<i class="fa fa-angle-right"></i>
</span>
</li>
<li class="control has-icons-right">
<a class="input" href="customer-delete-input.php">退会</a>
<span class="icon is-right is-medium">
<i class="fa fa-angle-right"></i>
</span>
</li>
</ul>

<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>

