<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php 
$pdo=new PDO($connect, USER, PASS);
$sql=$pdo->prepare('select * from Products where product_id=?');
$sql->execute([$_GET['id']]);
foreach($sql as $row){
    $id=$row['product_id'];
    echo '<p><img alt="images" src="images/',$row['image_pass'],'"></p>';
    echo '<form action="cart-insert.php" method="post">';
    // echo '<p>商品番号:',$row['id'],'</p>';
    echo '<p>商品名:',$row['product_name'],'</p>';
    echo '<p>価格:￥',$row['price'],'</p>';
    echo '<p>個数:<select name="count"';
    for($i=0;$i<=10;$i++){
        echo '<option value="',$i,'">',$i,'</option>';
    }
    echo '</select></p>';
    echo '<input type="hidden" name="id" value="',$row['product_id'],'">';
    echo '<input type="hidden" name="name" value="',$row['product_name'],'">';
    // echo '<input type="hidden" name="category" value="',$row['category_id'],'">';
    echo '<input type="hidden" name="price" value="',$row['price'],'">';
    echo '<p><input type="submit" value="カートに入れる"></p>';
    echo '<p>商品説明:',$row['product_description'],'</p>';
    echo '</form>';
    echo '<p><a href="favorite-insert.php?id=',$row['product_id'],'">お気に入りに追加</a></p>';
}
echo '</table>';
?>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>