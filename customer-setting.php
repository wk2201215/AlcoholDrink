<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'judge.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<?php include_once 'view_counter.class.php';
$counter = new ViewCounter();
//ページ固有のID
$id = 0006;
$count = $counter->log($id,$_SESSION['customer']['id']);
// echo $count;
?>

<div class="hero-body py-5">
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
<button class="input" @click="logout">ログアウト</button>
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

</div>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>

