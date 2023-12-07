<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu-back.php'; ?>
<?php
$count=0;
if(isset($_SESSION['customer'])){
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('select * from Orders where customer_id=?');
    $sql->execute([$_SESSION['customer']['id']]);
    $result=$sql->fetchAll();
    $sql2=$pdo->prepare('select * from Order_details, Products where order_id=? and product_id=product_id');
    // var_dump($result);
    if(!empty($result)){
        foreach($result as $id=>$roro){
            // var_dump($roro);
            $sql2->execute([$roro['order_id']]);
                echo '<table>';
                echo '<tr><th>商品番号</th><th>商品名</th>';
                echo '<th>価格</th><th>個数</th><th>小計</th></tr>';
                $total=0;
                // var_dump($_SESSION);
                foreach($sql2 as $row){
                    echo '<tr>';
                    echo '<td>',$row['product_id'],'</td>';
                    echo '<td><a href="detail.php?id=',$row['product_id'],'">',$row['product_name'],'</a></td>';
                    echo '<td>',$row['price'],'</td>';
                    echo '<td>',$row['quantity'],'</td>';
                    $subtotal=$row['price']*$row['quantity'];
                    $total+=$subtotal;
                    echo '<td>',$subtotal,'</td>';
                    echo '</tr>';
                }
                echo '<tr><td>合計</td><td></td><td></td><td></td><td>',$total,'</td><td></td></tr>';
                echo '</table>';
                $count++;
                echo '購入',$count;
                echo '購入日',$roro['order_date'];
                echo '配達先',$roro['shipping_address'];
                echo '支払い方法',$roro['payment'];
                echo '<hr>';
        }
    }else{
        echo '購入履歴はありません';
    }
}else{
    echo 'ログインしてください。';
}
?>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>