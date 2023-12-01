<?php require '../db-connect.php'; ?>
<?php require 'header.php'; ?>

<?php
    
    $pdo=new PDO($connect, USER, PASS);

	// idの取得
    $product_id = $_GET['product_id'];

	$sql=$pdo->prepare('select Products.product_name,Categories.category_name,Products.price,Products.image_pass,Products.product_description from Products inner join Categories on Products.category_id = Categories.category_id where Products.product_id=?');
	$sql->execute([$product_id]);

	$result = $sql->fetch(PDO::FETCH_ASSOC);

	//情報を保持して表示したい
	echo '<div class="level-item">
    		<div class="field has-addons">';
			echo '<form action="shouhin-update.php" method="post">';
			echo '<input type="hidden" name="product_id" value="' . $product_id . '">';
			echo '<p>商品名<input type = "text" name = "product_name" value ="'.$result['product_name'].'">';
    		echo '商品種別<input type = "text" name = "category_name" value ="'.$result['category_name'].'"></p>';
    		echo '<p>販売価格<input type = "text" name = "price" value ="'.$result['price'].'">';
    		echo '商品画像パス<input type = "text" name = "image_pass" value ="'.$result['image_pass'].'"></p>';
    		echo '<p>商品説明<textarea name="product_description" class="textarea is-normal"> '.$result['product_description'].'</textarea></p>';
		echo '</div>';
	echo '</div>';
			echo '<div class="has-text-centered">';
    		echo '<p><input type = "submit" value = "更新"></p>';
			echo '</div>';
			echo '</form>';
?>


<!-- <form action = "shouhin-update.php" method="post">
    商品名<input type = "text" name = "product_name">
    商品種別<input type = "text" name = "categori_name"><br>
    販売価格<input type = "text" name = "price">
    商品画像パス<input type = "text" name = "image_pass"><br>
    商品説明<textarea name="description" rows="4" cols="40"></textarea><br><p>
    <input type = "submit" value = "更新">
</form> -->

<?php require 'footer.php'; ?>

