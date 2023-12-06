<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('insert into Orders values(null,?,default,?,?)');
    $flag=0;
    $hai=[
        'name'=>[],
        'nostock'=>[]
    ];
    // var_dump($_SESSION['customer']['id']);
    $sql->execute([
        $_SESSION['customer']['id'], 
        $_SESSION['customer']['address'], 
        $_SESSION['customer']['payment']    
    ]); 
    $last_id = $pdo->lastInsertId();
    $sql2=$pdo->prepare('insert into Order_details values(?,?,?)');
    $id=$_SESSION['customer']['id'];
    //cartテーブルの中身を出力
    $sql3=$pdo->prepare('select P.*,c.* from Products as P inner join Carts as c 
                    on P.product_id = c.product_id
                    where customer_id=?');
    $sql3->execute([$id]);
    foreach ($sql3 as $row){
        // $sql2->execute([$last_id, $id, $row['cart_quantity']]);
        // $sql4=$pdo->prepare('select  stock,product_name from Products where product_id=?');
        // $sql4->execute([$row['product_id']]);
        // $stock=$sql4->fetchAll(); 
        if($row['stock']>=$row['cart_quantity']){
            $sql5=$pdo->prepare('update  Products set stock=?  where product_id=?');   
            $not=$row['stock']-$row['cart_quantity'];      
            $sql5->execute([
                $not,          
                $row['product_id']
            ]);    
        }else{
            $hai['name'][$flag]=$stock['product_name'];
            $hai['nostock'][$flag]=$row['stock']-$stock['stock'];
            $flag++;
            
        }
    }
    if($flag=0){
        $sql6=$pdo->prepare('delete from Carts  where customer_id=?');  
        $sql6->execute([
            $id, 
        ]); 
        header('Location:purchase-output.php');
        exit();       
    }else{
        $str='';
        for( $i=0;$i<$flag;$i++){
        $str+=$hai['name'][$i]+'の在庫が'+$hai['nostock'][$i]+'個足りません\n';
        }
        header('Location:cart.php?hogeA='.$str);
        exit();
        
    }

    unset($_SESSION['cart']);
?>
