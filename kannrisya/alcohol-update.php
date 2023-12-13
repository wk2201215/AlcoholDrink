<?php require '../db-connect.php'; ?>
<?php
    //処理のみ
    $pdo=new PDO($connect, USER, PASS);
    
    // POSTに値が存在する場合、データベースを更新
      if(!empty($_POST)) {

        $sql=$pdo->prepare('update Knowledge set knowledge_name=?, knowledge_text=? where knowledge_id=?');
        $sql->execute([$_POST['knowledge_name'],$_POST['knowledge_text'],$_POST['knowledge_id']]);
        header("Location: alcohol-list.php");
        exit;
      }
?>

