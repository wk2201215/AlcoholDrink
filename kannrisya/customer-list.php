<?php require '../db-connect.php'; ?>
<?php require 'header.php'; ?>

    <?php
    $pdo=new PDO($connect, USER, PASS);
    ?>
    <h1 class="title">顧客情報管理</h1>
    <div class="table-container">
        <table class="table is-striped">
        <thead>
            <!-- <tr><th>顧客ID</th><th>氏名</th><th>生年月日</th><th>郵便番号</th><th>住所</th><th>電話番号</th><th>メールアドレス</th><th>パスワード</th></tr>     -->
        <tr><th style="width:100px;">顧客ID</th><th style="width:100px;">氏名</th><th style="width:150px;">生年月日</th><th style="width:150px;">郵便番号</th><th style="width:150px;">住所</th><th style="width:150px;">電話番号</th><th>メールアドレス</th><th>パスワード</th><th style="width:80px;"></th></tr>
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
            echo '<td style="word-break: break-word">', $row['customer_password'],'</td>';
            echo '<td>', '<a href = "customer-delete.php?customer_id=', $row['customer_id'] ,'">','削除','</td></tr>';
        }
        ?>
        </tbody>
        </table>
    </div>
    
        <input class="button is-dark is-outlined is-medium" value="戻る" onclick="history.back();" type="button">
    
    <?php require 'footer.php'; ?>