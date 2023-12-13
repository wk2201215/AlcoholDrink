<?php require '../db-connect.php'; ?>
<?php require 'header.php'; ?>

    <?php
    $pdo=new PDO($connect, USER, PASS);
    ?>
    <h3 class="title">注文詳細画面</h3>

    <table class="mb-4 mx-4">
    <?php
    $order_id=$_GET['order_id'];

    //Orders,customers
    $sql='select * from Customers inner join Orders on Customers.customer_id = Orders.customer_id where Orders.order_id=?';
    $customers=$pdo->prepare($sql);
    $customers->execute([$order_id]);
    foreach($customers as $row){
        echo '<tr><td><label class="has-text-weight-semibold">注文番号：</label> No.',$row['order_id'],'</td> <td><label class="has-text-weight-semibold">購入日：</label>',$row['order_date'],'</td></tr>';
        echo '<tr><td><label class="has-text-weight-semibold">顧客ID：</label>',$row['customer_id'],'</td> <td><label class="has-text-weight-semibold"> 氏名：</label>',$row['customer_name'],'</td></tr>';
        echo '<tr><td><label class="has-text-weight-semibold">住所：</label>',$row['address'],'</td></tr>';
        echo '<tr><td><label class="has-text-weight-semibold">電話番号：</label>',$row['telephone'],'</td></tr>';
        echo '<tr><td><label class="has-text-weight-semibold">メールアドレス：</label>',$row['mail'],'</td></tr>';
    }
    echo '</table>';
    
    echo '<div class="table-container">';
    echo '<table class="table is-striped">';

    //order_detailとProductsでproduct_idがあるか?
    $sql = $pdo->prepare('SELECT Products.product_id FROM Order_details
    INNER JOIN Products ON Order_details.product_id  = Products.product_id
    WHERE Order_details.order_id = ?');
    $sql->execute([$order_id]);
    $count = $sql->rowCount();

        //product_idあれば
        if($count != 0){
            //order_detail(個数,商品ID),Products(商品名),categories(category_name)
            echo '<tr><th>商品ID</th><th>商品名</th><th>商品種別</th><th>個数</th><th></th></tr>';
            //order_detail(1)とProducts(1,2)とCategories(2)で商品種別をだす?
            $sql = $pdo->prepare('SELECT Categories.category_name FROM Order_details
            INNER JOIN Products ON Order_details.product_id  = Products.product_id
            INNER JOIN Categories ON Products.category_id = Categories.category_id
            WHERE Order_details.order_id = ?');
            $sql->execute([$order_id]);

            $i=0;
            foreach ($sql as $row) {
                $category_name[$i] =  $row['category_name'];
                $i++;
              }

            //order_detail(個数),Products(商品ID,商品名)をだす
            $orders=$pdo->prepare('SELECT Products.product_id,Products.product_name,Order_details.quantity from Products 
            inner join Order_details on Products.product_id = Order_details.product_id 
            where Order_details.order_id=?');
            $orders->execute([$order_id]);

            $i=0;
            foreach($orders as $order){
             echo '<tr><td>',$order['product_id'],'</td>';
                echo '<td>',$order['product_name'] ,'</td>';
                echo '<td>',$category_name[$i] ,'</td>';
                echo '<td>',$order['quantity'],'</td></tr>';
                $i++;
            }
        }else{
            echo 'データが1件もありません';
        }
    ?>
    </table>
</div>
    <button class="button is-light tabs is-right" onclick="location.href='order-list.php'">戻る</button>
    <?php require 'footer.php'; ?>