<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
    $pdo=new PDO($connect, USER, PASS);
    //カート内の数量の総和
    $sql=$pdo->prepare('select * from Carts where customer_id=?');
    $sql->execute([$_SESSION['customer']['id']]);
    $sum=0;
    foreach($sql as $row){$sum+=$row['cart_quantity'];}
    //カート内の総和がゼロ
    if($sum==0){
        header('Location:purchase-input.php?hogeA=カートに購入できる商品がありません。');
        exit();
    }else if(empty($_SESSION['customer']['payment'])){
        header('Location:purchase-input.php?hogeA=お支払い方法が登録されていません。');
        exit();
    }else{
        $sql=$pdo->prepare('insert into Orders values(null,?,default,?,?,?,?)');
        $flag=true;
        $str='';
        $not=0;
        $sql->execute([
        $_SESSION['customer']['id'], 
        $_SESSION['customer']['address'], 
        $_SESSION['customer']['payment'],
        $_SESSION['order']['total'], 
        $_SESSION['order']['fee']
        ]); 
        $last_id = $pdo->lastInsertId();
        $sql2=$pdo->prepare('insert into Order_details values(?,?,?,?)');
        $id=$_SESSION['customer']['id'];
    //cartテーブルの中身を出力
        $sql3=$pdo->prepare('select P.*,c.* from Products as P inner join Carts as c 
                    on P.product_id = c.product_id
                    where customer_id=?');
        $sql3->execute([$id]);
        foreach ($sql3 as $row){
            $s=$row['cart_quantity']*$row['price']*((100-$row['discount'])/100);
            $sql5=$pdo->prepare('update Products set stock=? where product_id=?');   
            $not=$row['stock']-$row['cart_quantity'];      
            $sql5->execute([
                $not,
                $row['product_id']
            ]);
            if($row['cart_quantity']==0){}
            else if($row['stock']>=$row['cart_quantity']){
            $sql2->execute([$last_id, $row['product_id'], $row['cart_quantity'],$s]);
            }else{
            $flag=false;
            $str.=$row['product_name'].'の在庫が'.$row['cart_quantity']-$row['stock'].'個足りません<br>';
            }
    }
    if($flag){
        $sql6=$pdo->prepare('delete from Carts where customer_id=? and NOT cart_quantity=0');  
        $sql6->execute([$id]);
        unset($_SESSION['order']);
        header('Location:purchase-output.php');
        exit();       
    }else{
        $sql8=$pdo->prepare('delete from Order_details Where order_id=?');
        $sql8->execute([$last_id]); 
        $sql8=$pdo->prepare('delete from Orders Where order_id=?');
        $sql8->execute([$last_id]);
        foreach ($sql3 as $row){
            $sql5=$pdo->prepare('update Products set stock=? where product_id=?');   
            $pre=$row['stock']+$row['cart_quantity'];      
            $sql5->execute([$pre,$row['product_id']]);
        }
        header('Location:purchase-input.php?hogeA='.$str);
        exit();
    }
    }
?>
