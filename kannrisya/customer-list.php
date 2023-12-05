<?php require '../db-connect.php'; ?>
<?php require 'header.php'; ?>

    <?php
    $pdo=new PDO($connect, USER, PASS);
    ?>
    <h1 class="title">顧客情報管理</h1>
    <div class="table-container">
        <table class="table is-striped">
        <thead>
            <tr><th>顧客ID</th><th>氏名</th><th>生年月日</th><th>郵便番号</th><th>住所</th><th>電話番号</th><th>メールアドレス</th><th>パスワード</th></tr>    
        <!-- <tr><th style="width:200px;">顧客ID</th><th style="width:200px;">氏名</th><th style="width:300px;">生年月日</th><th style="width:200px;">郵便番号</th><th style="width:250px;">住所</th><th style="width:200px;">電話番号</th><th>メールアドレス</th><th>パスワード</th></tr> -->
        </thead>
        <tbody>
        <?php
        //falseが削除されていない顧客 
        //foreach($pdo->query('select * from Customers where flg = false') as $row){
            foreach($pdo->query('select * from Customers where delete_flag = 0') as $row){
            echo '<tr><td>', $row['customer_id'],'</td>';
            echo '<td>', $row['customer_name'],'</td>';
            echo '<td>', $row['birth'],'</td>';
            echo '<td>', $row['postcode'],'</td>';
            echo '<td>', $row['address'],'</td>';
            echo '<td>', $row['telephone'],'</td>';
            echo '<td>', $row['mail'],'</td>';
            echo '<td>', $row['customer_password'],'</td>';
            echo '<td>', '<a href = "customer-delete.php?customer_id=', $row['customer_id'] ,'">','削除','</td></tr>';
        }
        ?>
        </tbody>
        </table>
    </div>
    <?php require 'footer.php'; ?>