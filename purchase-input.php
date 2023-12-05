<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>

<?php
    $pdo=new PDO($connect, USER, PASS);
    $id=$_SESSION['customer']['id'];
    $sql=$pdo->prepare('select P.*,c.* from Products as P inner join Carts as c 
                        on P.product_id = c.product_id
                        where customer_id=?');
    $sql->execute([$id]);
    $sum=$discount=0;

    $wari=[
        'name'=>[],
        'd'=>[],
        'dp'=>[]
    ];
    $i=1;
    foreach ($sql as $row){
        $sum+=$row["cart_quantity"]*$row["price"];
        if($row["discount"] != 0){
        $discount+=$row['price']*($row["discount"]/100)*$row['cart_quantity'];
        $wari['name'][$i] = $row['product_name'];
        $wari['d'][$i] = $row['discount'];
        $wari['dp'][$i] = $row['price']*($row["discount"]/100)*$row['cart_quantity'];
        $i++;
        }
    }

    $fee=100;
    $total=$sum-$discount+$fee;
    echo '<p>ご請求金額',$total,'</p>';
    echo '<p>小計',$sum,'</p>';
    foreach($wari as $row){
    echo '<p>割引',$row['name'],$row['dp'],'円(',$row['d'],'%)</p>';
    }
    echo '<p>配送料・手数料',$fee,'円','</p>';

    echo 'お届け先';
    
    echo $SESIION['cusotmer']['address'];
    ?>
    <button type="button" onclick="location.href='customer-input.php'">住所変更</button><br>
<?php
    echo '支払い方法';
    
    echo $SESIION['cusotmer']['payment'];
    ?>
    <button type="button" onclick="location.href='customer-payment-input.php'">支払い方法を変更</button><br>
    <button type="button" onclick="location.href='purchase-process.php'">購入を確定する</button>

<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>