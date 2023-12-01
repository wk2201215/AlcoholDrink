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
		echo 'タイトル<input type="text" name="knowledge_name" value="' . $result['knowledge_name'] . '"><br>';
    	echo '説明<textarea name="knowledge_text" class="textarea is-normal">' . $result['knowledge_text'] . '</textarea><br>';
		echo '<input type="submit" value="更新">';
		echo '</form>';
?>

<?php require 'footer.php'; ?>