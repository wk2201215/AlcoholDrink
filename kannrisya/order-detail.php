<?php require '../db-connect.php'; ?>
<?php require 'header.php'; ?>

    <?php
    $pdo=new PDO($connect, USER, PASS);
    ?>
    <h1>注文詳細画面</h1>
    <?php
    $order_id=$_GET['order_id'];

    //Orders,customers
    $sql='select * from Customers inner join Orders on Customers.customer_id = Orders.customer_id where Orders.order_id=?';
    $customers=$pdo->prepare($sql);
    $customers->execute([$order_id]);
    foreach($customers as $row){
        echo '注文番号 No.',$row['order_id'],' 購入日：',$row['order_date'],'<br>';
        echo '顧客ID：',$row['customer_id'],' 氏名：',$row['customer_name'],'<br>';
        echo '住所：',$row['address'],'<br>';
        echo '電話番号：',$row['telephone'],'<br>';
        echo 'メールアドレス：',$row['mail'],'<br>';
    }
    
    echo '<div class="table-container">';
    echo '<table class="table is-striped">';
    
    //order_detail(個数,商品ID),Products(商品名),categories(category_name)
    echo '<tr><th>商品ID</th><th>商品名</th><th>商品種別</th><th>個数</th></tr>';
    //order_detail(1)とProducts(1,2)とCategories(2)で商品種別をだす?
    $sql = $pdo->prepare('SELECT Categories.category_name FROM Order_details
    INNER JOIN Products ON Order_details.product_id  = Products.product_id
    INNER JOIN Categories ON Products.category_id = Categories.category_id
    WHERE Order_details.order_id = ?');

// SELECT Categories.category_name FROM Orders
// INNER JOIN Order_details ON Orders.order_id = Order_details.order_id
// INNER JOIN Products ON Order_details.product_id = Products.product_id
// INNER JOIN Categories ON Products.category_id = Categories.category_id
// WHERE Orders.order_id = ?
    
        $sql->execute([$order_id]);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $category_name = $row['category_name'];

    //order_detail(個数),Products(商品ID,商品名)をだす
    $orders=$pdo->prepare('select Products.product_id,Products.product_name,Order_details.quantity from Products 
    inner join Order_details on Products.product_id = Order_details.product_id 
    where Order_details.order_id=?');
    $orders->execute([$order_id]);
    foreach($orders as $row){
        echo '<tr><td>',$row['product_id'],'</td>';
        echo '<td>',$row['product_name'] ,'</td>';
        echo '<td>',$category_name ,'</td>';
        echo '<td>',$row['quantity'],'</td></tr>';
    }
    ?>
    </table>
</div>
    <button class="button is-light tabs is-right" onclick="location.href='order-list.php'">戻る</button>
    <?php require 'footer.php'; ?>