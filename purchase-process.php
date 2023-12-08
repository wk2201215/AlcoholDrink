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
        if($row['stock']>=$row['cart_quantity']){
            $sql2->execute([$last_id, $row['product_id'], $row['cart_quantity']]);
            $sql5=$pdo->prepare('update  Products set stock=?  where product_id=?');   
            $not=$row['stock']-$row['cart_quantity'];      
            $sql5->execute([
                $not,          
                $row['product_id']
            ]);    
        }else{
            $hai['name'][$flag]=$row['product_name'];
           $hai['nostock'][$flag]=$row['cart_quantity']-$row['stock'];
            $flag++;
        }
    }
    if($flag==0){
        $sql6=$pdo->prepare('delete from Carts  where customer_id=?');  
        $sql6->execute([$id]); 
        header('Location:purchase-output.php');
        exit();       
    }else{
        $sql8=$pdo->prepare('delete from Orders Where order_id=?');
        $sql8->execute([$last_id]); 
   
       $str='';
       for( $i=0;$i<$flag;$i++){
       $str.=$hai['name'][$i].'の在庫が'.$hai['nostock'][$i].'個足りません\n';
       }
       header('Location:purchase-input.php?hogeA='.$str);
       exit();
    }
?>
