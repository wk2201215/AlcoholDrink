<?php require '../db-connect.php'; ?>
<?php
    //処理のみ
     $pdo=new PDO($connect, USER, PASS);
    
    // POSTに値が存在する場合、データベースに登録
      if(!empty($_POST)) {

        $sql=$pdo->prepare('insert into Knowledge(knowledge_name,knowledge_text) values(?,?)');
        $sql->execute([$_POST['knowledge_name'],$_POST['knowledge_text']]);
        header("Location: alcohol-list.php");
        exit;
    
      }else{
        header("Location: alcohol-list.php");
        exit;
      }
?>

