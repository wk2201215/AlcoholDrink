<?php session_start(); ?>
<?php require 'db-connect.php';?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>

<?php
    $pdo1=new PDO($connect, USER, PASS);
    $pdo2=new PDO($connect, USER, PASS);
    echo '<h1>お酒の知識</h1>';
    foreach($pdo1->query('select * from Knowledge') as $row1){
        echo '<div class="box is-clipped">';
        echo '<label class="label">', $row1['knowledge_name'],'</label>';
        echo '<div>', $row1['knowledge_text'],'</div>';
        echo '<p>関連商品</p>';
        echo '<figure class="mt-3">';
        $sql=$pdo2->prepare('
        select A.product_id,image_pass from Knowledge_products as A 
        inner join Products as B 
        On A.product_id=B.product_id 
        where Knowledge_id=?') ;
        $sql->execute([$row1['knowledge_id']]) ;
        foreach($sql as $row2){
            echo '<a class="image box is-inline-block mb-0 mr-1" style="vertical-align: top;width:96px;" href="detail.php?id=',$row2['product_id'],'">
            <img alt="images" class="mx-auto" style="height:96px;width:auto;"
            src="images/',$row2['image_pass'],'">','</a>';
        }
        echo '</figure>';
        echo '</div>';
    }
    ?>
    </table>



<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>