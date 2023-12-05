<?php require '../db-connect.php'; ?>
<?php require 'header.php'; ?>

    <?php
    $pdo=new PDO($connect, USER, PASS);
    ?>
    <h1 class="title">商品画面</h1>
    <button class="button is-link is-medium" onclick="location.href='shouhin-i-form.php'">登録</button>
    <div class="columns">
    <div class="table-container column is-11">
        <table class="table is-striped">
        <tr><th style="width:100px;">画像</th><th>ID</th><th style="width:200px;">商品名</th><th style="width:150px;">カテゴリ名</th><th style="width:100px;">金額</th><th>説明</th><th style="width:80px;"></th><th style="width:80px;"></th></tr>
        <?php
        foreach($pdo->query('select Products.image_pass,Products.product_id,Products.product_name,Categories.category_name,Products.price,Products.product_description from Categories inner join Products on Products.category_id = Categories.category_id ') as $row){
            echo '<tr><td><img src="../images/products/' , $row['image_pass'] , '" alt = "images" ></td>';
            echo '<td>', $row['product_id'],'</td>';
            echo '<td>', $row['product_name'],'</td>';
            echo '<td>', $row['category_name'],'</td>';
            echo '<td>', $row['price'],'円</td>';
            echo '<td>', $row['product_description'],'</td>';
            echo '<td>', '<a href = "shouhin-u-form.php?product_id=', $row['product_id'] ,'">','更新','</td>';
            echo '<td>', '<a href = "shouhin-delete.php?product_id=', $row['product_id'] ,'">','削除','</td></tr>';
        }
        ?>
    </table>
</div>
</div>
    <?php require 'footer.php'; ?>