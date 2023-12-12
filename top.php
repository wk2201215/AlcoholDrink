<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'judge.php'; ?>
<?php require 'header-top.php'; ?>
<?php require 'header-menu.php'; ?>
<?php require 'top-s.php'; ?>
<?php
$pdo=new PDO($connect,USER,PASS);
if(isset($_POST['keyword'])){
    $sql=$pdo->prepare('select * from Products where product_name like ?');
    $sql->execute(['%'.$_POST['keyword'].'%']);
}else if($_GET['category_id']){
    $sql=$pdo->prepare('select * from Products where category_id = ?');
    $sql->execute([$_GET['category_id']]);
}else if($_GET['priceA']){
    if($_GET['priceB']=='max'){
        $sql=$pdo->prepare('select * from Products where price >= ?');
        $sql->execute([$_GET['priceA']]);
    }else{
        $sql=$pdo->prepare('select * from Products where price BETWEEN ? AND ?');
        $sql->execute([$_GET['priceA'],$_GET['priceB']]);
    }
}else{
    $pdor=new PDO($connect,USER,PASS);
    $sqlr=$pdor->query('
    select P.*,num
    from Products as P 
    inner join
    (select product_id,sum(quantity) as num
    from Order_details group by product_id) as O
    on
    P.product_id=O.product_id
    order by num desc
    limit 10;');
    // var_dump($sqlr);
    // $k=$sqlr->fetchAll();
    // var_dump($k);
    // echo '<hr>';
    echo '<ul class="horizontal_scroll">';
        foreach($sqlr as $row){
            $id=$row['product_id'];
            // $rank=1;
            // echo $rank;
            // $rank++;
            // echo '<a href="detail.php?id=',$id,'"><img alt="images" src="images/products/',$row['image_pass'],'">
            //     ',$row['product_name'],'</a>';
            // echo '<p>価格:',$row['price'],'</p>';
            echo '<li>';
                echo '<a href="detail.php?id=',$id,'"><img alt="images" src="images/products/',$row['image_pass'],'">';
                echo '<div>',$row['product_name'],'</div></a>';
                echo '<div>価格:',$row['price'],'</div>';
            echo '</li>';
        }
    echo '</ul>';
    $sql=$pdo->query('select * from Products');
}
// var_dump($sqlr);
// echo '<hr>';
// var_dump($sql);
// echo '<hr>';
foreach ($sql as $row) {
    $id=$row['product_id'];
    echo '<a href="detail.php?id=',$id,'"><img alt="images" src="images/products/',$row['image_pass'],'">
         ',$row['product_name'],'</a>';
    echo '<p>価格:',$row['price'],'</p>';
}
?>
<?php require 'footer-menu.php'; ?>
<?php require 'footer-top.php'; ?>
