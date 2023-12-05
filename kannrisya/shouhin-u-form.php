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
	echo '<form action="shouhin-update.php" method="post">';
		echo '<div class="field">';
			echo '<input type="hidden" name="product_id" value="' . $product_id . '">';
			
				echo '<p class="control1">';
					
					echo '<label class="has-text-weight-semibold">商品名</label>       
						<input style="width:200px;" type = "text" name = "product_name" value ="'.$result['product_name'].'">';
    				echo '<label class="has-text-weight-semibold">商品種別</label>     
						<input style="width:200px;" type = "text" name = "category_name" value ="'.$result['category_name'].'">';
					
				echo '</p>';
			
		echo '</div>';

		echo '<div class="field">';
			
				echo '<p class="control2">';
					
						echo '<label class="has-text-weight-semibold"">販売価格</label>     
							<input style="width:200px;" type = "text" name = "price" value ="'.$result['price'].'">';
    					echo '<label class="has-text-weight-semibold">商品画像パス</label> 
							<input style="width:200px;" type = "text" name = "image_pass" value ="'.$result['image_pass'].'">';
					
				echo '</p>';
			
		echo '</div>';

		echo '<div class="field">';
			echo '<p class="control3">';
				echo '<label class="has-text-weight-semibold">商品説明</label>
					<textarea name="product_description" class="textarea is-normal"> '.$result['product_description'].'</textarea>';
			echo '</p>';
		echo '</div>';
		
		echo '<div class="has-text-centered">';
    		echo '<p><input class="button is-link is-medium" type = "submit" value = "更新"></p>';
		echo '</div>';
	echo '</form>';
?>

<button class="button is-light tabs is-right" onclick="location.href='shouhin-list.php'">戻る</button>
<!-- <form action = "shouhin-update.php" method="post">
    商品名<input type = "text" name = "product_name">
    商品種別<input type = "text" name = "categori_name"><br>
    販売価格<input type = "text" name = "price">
    商品画像パス<input type = "text" name = "image_pass"><br>
    商品説明<textarea name="description" rows="4" cols="40"></textarea><br><p>
    <input type = "submit" value = "更新">
</form> -->

<?php require 'footer.php'; ?>

