<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<?php
    echo '<p>現在の支払い方法</p>';
    echo $_SESSION['customer']['payment'];
    echo '<p>支払い方法</p>';
    echo'<form method="post" action="customer-payment-output.php">';
        echo '<input type="radio" name="p" value="ギフトカード支払い" required>ギフトカード支払い';
        echo '<input type="radio" name="p" value="コンビニ支払い" required>コンビニ支払い';
        echo '<input type="radio" name="p" value="クレジット支払い" required>クレジット支払い';
        echo '<input type="submit" value="支払い方法変更">';
    echo '</form>';
?>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>