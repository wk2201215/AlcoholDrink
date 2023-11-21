<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<?php
$pdo=new PDO($connect,USER,PASS);
if(isset($_POST['keyword'])){
    $sql=$pdo->prepare('select * from Products where product_name like ?');
    $sql->execute(['%'.$_POST['keyword'].'%']);
}else{
    // $sqlr=$pdo->query('select O.puroduct_id, P.product_name, 
    //                   P.category_id, P.price, P.stock, 
    //                   sum(O.quantity) as num, P.image_pass, 
    //                   P.product_description, 
    //                   row_number() over(order by num desc) rank
    //                   from Order_details as O inner join Products as P
    //                   on O.puroduct_id = P.puroduct_id
    //                   group by product_id
    //                   order by num desc
    //                   limit 10');

    // $sqlr=$pdo->query('select OS.puroduct_id, P.product_name, 
    //                   P.category_id, P.price, P.stock, 
    //                   OS.num, P.image_pass, 
    //                   P.product_description, 
    //                   row_number() over(order by num desc) rank
    //                   from 
    //                   (select O.product_id, sum(O.quantity) as num
    //                    from Order_details as O
    //                    group by product_id) as OS inner join Products as P
    //                    on O.puroduct_id = P.puroduct_id 
    //                   order by num desc
    //                   limit 10');
    // foreach($sqlr as $row){
    //     $id=$row['id'];
    //     echo $row['rank'];
    //     echo '<a href="productpage.php?id=',$id,'"><img alt="images" src="images/',$row['image_pass'],'">
    //          ',$row['product_name'],'</a>';
    //     echo '<p>価格:',$row['price'],'</p>';
    // }
    $sql=$pdo->query('select * from Products ');
}
foreach ($sql as $row) {
    $id=$row['product_id'];
    // echo $row['rank'];
    echo '<a href="detail.php?id=',$id,'"><img alt="images" src="images/',$row['image_pass'],'">
         ',$row['product_name'],'</a>';
    echo '<p>価格:',$row['price'],'</p>';
}
?>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>
