<?php require '../db-connect.php'; ?>
<?php require 'header.php'; ?>

    <?php
    $pdo=new PDO($connect, USER, PASS);
    ?>
    <h1>注文画面</h1>
    <!-- <div class="columns is-mobile is-centered"> -->
        <table class="table is-striped">
            <tr><td>注文番号</td><td>顧客ID</td><td>購入日</td></tr>
        <?php
        foreach($pdo->query('select * from Orders') as $row){
            echo '<tr><td>', $row['order_id'],'</td>';
            echo '<td>', $row['customer_id'],'</td>';
            echo '<td>', $row['order_date'],'</td>';
            echo '<td>', '<a href = "order-detail.php?order_id=', $row['order_id'] ,'">','注文詳細','</td></tr>';
        }
        ?>
        </table>
    <!-- </div> -->
    <?php require 'footer.php'; ?>