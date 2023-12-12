<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'judge.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<?php include_once 'view_counter.class.php';
$counter = new ViewCounter();
//ページ固有のID
$id = 0010;
$count = $counter->log($id,$_SESSION['customer']['id']);
// echo $count;
?>
<div class="hero-body py-5">
<?php
    $pdo=new PDO($connect, USER, PASS);
    echo '<h1>お酒の知識</h1>';
    foreach($pdo->query('select * from Knowledge') as $row1){
        echo '<div class="box is-clipped">';
        echo '<label class="label txt-show">', $row1['knowledge_name'],'</label>';
        echo '<div class="contents-hide">';
        echo '<p>', $row1['knowledge_text'],'</p>';
        echo '<p>関連商品</p>';
        echo '<figure class="mt-3">';
        $sql=$pdo->prepare('
        select A.product_id,image_pass from Knowledge_products as A 
        inner join Products as B 
        On A.product_id=B.product_id 
        where Knowledge_id=?') ;
        $sql->execute([$row1['knowledge_id']]) ;
        foreach($sql as $row2){
            echo '<a class="image box is-inline-block mb-0 mr-1" style="vertical-align: top;width:96px;" href="detail.php?id=',$row2['product_id'],'">
            <img alt="images" class="mx-auto" style="height:96px;width:auto;"
            src="images/products/',$row2['image_pass'],'">','</a>';
        }
        echo '</figure>';
        echo '</div>';
        echo '<button class="more" onclick="change(event)"></button>';
        echo '</div>';
    }
    ?>
</div>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>