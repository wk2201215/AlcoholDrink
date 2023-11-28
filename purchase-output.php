<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('insert into Orders values(null,?,null,?,?)');
    // var_dump($_SESSION['customer']['id']);
    $sql->execute([
        $_SESSION['customer']['id'], 
        $_SESSION['customer']['address'], 
        $_SESSION['customer']['payment']    
    ]); 
    $last_id = $pdo->lastInsertId();
    $sql2=$pdo->prepare('insert into Order_details values(?,?,?)');
    foreach($_SESSION['cart']['puroduct'] as $id=>$product){
        // $sql2=$pdo->prepare('insert into Purchase_detail values(?,?,?)');
        $sql2->execute([$last_id, $id, $product['count']]);
        $sql3=$pdo->prepare('update  products set stock=?  where product_id=?');    
        $sql3->execute([
            $SESSION['cart']['puroduct']['']            
            $SESSION['cart']['puroduct']['id']
        ]);
    }
    
    $sql=$pdo->prepare('delete from Orders  where order_id=?');  
    $sql->execute([
        $_SESSION['cart']['id'], 
    ]); 

    
    $sql=$pdo->prepare('delete from Order_details where order_id=?');    
    $sql->execute([
        $_SESSION['cart']['id'], 
    ]); 

    unset($_SESSION['cart']);
?>
