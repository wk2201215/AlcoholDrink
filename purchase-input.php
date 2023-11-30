<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>

<?php
    
    $w=0.1;
    $discount=$_SESSION['cart']['product']['id']['price']*$w;
    $fee=100;
    $total=$_SESSION['cart']['total']-$discount+$fee;
    echo '<p>ご請求金額',$total,'</p>';
    echo '<p>小計',$_SESSION['cart']['total'],'</p>';
    echo '<p>割引',$discount,'円(',$w*100,'%)</p>';
    echo '<p>配送料・手数料',$fee,'円','</p>';

    echo 'お届け先';
    
    echo $SESIION['cusotmer']['address'];
    ?>
    <button type="button" onclick="location.href='customer-input.php'">住所変更</button><br>
<?php
    echo '支払い方法';
    
    echo $SESIION['cusotmer']['payment'];
    ?>
    <button type="button" onclick="location.href='customer-payment-input.php'">支払い方法を変更</button><br>
    <button type="button" onclick="location.href='purchase-output.php'">購入を確定する</button>

<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>