<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('insert into Orders values(null,?,null,?,?)');
    $flag=0;
    $hai=[
        'name'=>'',
        'nostock'=>''
    ]
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
        $sql4=$pdo->prepare('select  stock,product_name from Products where product_id');   
        $stock=$sql4->fetchAll(); 
        if($stock['stock']>=$product['count']){
            $sql3=$pdo->prepare('update  products set stock=?  where product_id=?');   
            $not=$stock['stock']-$product['count'];      
            $sql3->execute([
                $not,          
                $product['id']
            ]);    
        }else{
            $hai['name']=$stock['product_name'];
            $hai['nostock']=$product['count']-$stock['stock'];
            $flag++;
            
        }
    }
    if($flag=0){
        $sql=$pdo->prepare('delete from Carts  where customer_id=?');  
        $sql->execute([
            $_SESSION['cart']['id'], 
        ]); 
        header('Location:purchase-output.php');
        exit();       
    }else{
        $str='';
        foreach($hai as $row){
            $str+=$row['name']+'の在庫が'+$row['nostock']+'個足りません\n';
        }
        header('Location:cart.php?hogeA='.$str);
        exit();
        
    }

    unset($_SESSION['cart']);
?>
