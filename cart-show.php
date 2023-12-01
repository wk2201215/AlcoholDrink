<?php session_start(); ?>
<?php
//DBに接続
require 'db-connect.php'
$pdo=new PDO($connect, USER, PASS);
//cartテーブルの中身を出力
foreach ($sql=$pdo->query('select * from Carts') as $row){
    echo '<table>';
    echo '<tr>';
    echo '<td>',$row["customer_id"],'</td>';
    echo '<td>',$row["product_id"],'</td>';
    echo '<td>',$row["cart_quantity"],'</td>';
    echo '</tr>';
    echo '</table>';
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 表示成形 -->
    小計<br>
    \1980<br>
    <button type="button" onclick="location.href='purchase-input.php'">レジに進む</button>


</body>
</html>



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