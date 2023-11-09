<?php require 'header/header-b.php'; ?>
<?php require 'menu-top.php'; ?>
<?php
$pdo=new PDO($connect,USER,PASS);
$sql=$pdo->prepare('select * from products where id=?');
$sql->execute([$_GET['id']]);
foreach ($sql as $row) {
    $id=$row['id'];
    echo '<p><img alt="image" src="image/',$row['id'],'.jpg"></p>';
    echo '<form action="cart-insert.php" method="post">';
    echo '<p>商品名:',$row['name'],'</p>';
    echo '<p>価格:',$row['price'],'</p>';
    echo '<p>個数:<select name="count">';
    for ($i=1; $i<=100;$i++){
        echo '<option value="', $i,'">', $i,'</option>';
    }
    echo '</select></p>';
    echo '<input type="hidden" name="id" value="',$row['id'],'">';
    echo '<input type="hidden" name="name" value="',$row['name'],'">';
    echo '<input type="hidden" name="price" value="',$row['price'],'">';
    echo '<p><input type="submit" value="カートに入れる"></p>';
    echo '</form>';
    
}
?>

<?php require 'footer/footer-v.php'; ?>
