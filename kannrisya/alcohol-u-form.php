<?php require '../db-connect.php'; ?> 
<?php require 'header.php'; ?>

<?php
    
    $pdo=new PDO($connect, USER, PASS);

	// データの取得
    $knowledge_id = $_GET['knowledge_id'];

	$sql=$pdo->prepare('select * from Knowledge where knowledge_id=?');
	$sql->execute([$knowledge_id]);
	$result = $sql->fetch(PDO::FETCH_ASSOC);

	//情報を保持して表示したい
		echo '<form action="alcohol-update.php" method="post">';
		echo '<input type="hidden" name="knowledge_id" value="' . $knowledge_id . '">';
		echo '<p><label class="has-text-weight-semibold">タイトル</label></p>';
		echo '<p class="mb-3 mx-4"><input type="text" name="knowledge_name" value="' . $result['knowledge_name'] . '"></p>';
    	echo '<p><label class="has-text-weight-semibold">説明</label></p>';
		echo '<p class="mb-4 mx-4"><textarea name="knowledge_text" class="textarea is-normal">' . $result['knowledge_text'] . '</textarea></p>';
		echo '<p class="has-text-centered">
				<input class="button is-link is-medium"  type="submit" value="更新">
			</p>';
		echo '</form>';
?>
<button class="button is-light tabs is-right" onclick="location.href='alcohol-list.php'">戻る</button>

<?php require 'footer.php'; ?>