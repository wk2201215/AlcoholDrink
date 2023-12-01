<?php require '../db-connect.php'; ?>
<?php
    //処理のみ
    $pdo=new PDO($connect, USER, PASS);

    $sql=$pdo->prepare('delete from Knowledge where knowledge_id=?');
    if($sql->execute([$_GET['knowledge_id']])){
        header("Location: alcohol-list.php");
        exit;
    }else{
        echo '削除に失敗しました。';
        header("Location: alcohol-list.php");
        exit;
    }
?>