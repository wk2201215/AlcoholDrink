<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<?php require 'db-connect.php'; ?>
<?php
$sum=0;
//DBに接続
$pdo=new PDO($connect, USER, PASS);
//
$id=$_SESSION['customer']['id'];
//cartテーブルの中身を出力
$sql=$pdo->prepare('select * from Carts where customer_id=?');
$sql->execute([$id]);
foreach ($sql as $row){
    echo '<p>';
    echo $row["customer_id"];
    echo $row["product_id"];
    echo $row["cart_quantity"];
    echo '</p>';
    $sql2=$pdo->prepare('select * from Products where product_id=?');
    $sql2->execute([$row["product_id"]]);
    foreach ($sql2 as $row2){
        echo $row2["product_name"];
        echo '<a href="detail.php?id=',$row["product_id"],'"><img alt="images" src="images/products/',$row2['image_pass'],'">
            ','</a>';
            $sum+=$row["cart_quantity"]*$row2["price"];
    }
}
echo $sum;
?>

    <!-- 表示成形 -->
    小計<br>
    \<br>
    <button type="button" onclick="location.href='purchase-input.php'">レジに進む</button>



<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>
<?php
// if (!empty($_SESSION['product'])) {
//     echo '<table>';
//     echo '<tr><th>商品番号</th><th>商品名</th>';
//     echo '<th>価格</th><th>個数</th><th>小計</th><th></th></tr>';
//     $total=0;
//     foreach ($_SESSION['product'] as $id=>$product) {
//         echo '<tr>';
//         echo '<td>', $id, '</td>';
//         echo '<td><a href="detail.php?id=', $id, '">',
//              $product['name'], '</a></td>';
//         echo '<td>', $product['price'], '</td>';
//         echo '<td>', $product['count'], '</td>';
//         $subtotal=$product['price']*$product['count'];
//         $total+=$subtotal;
//         echo '<td>', $subtotal, '</td>';
//         echo '<td><a href="cart-delete.php?id=', $id, '">削除</a></td>';
//         echo '</tr>';
//     }
//     echo '<tr><td>合計</td><td></td><td></td><td></td><td>', $total,
//          '</td><td></td></tr>';
//     echo '</table>';
// } else {
//     echo 'カートに商品がありません。';
// }
?>