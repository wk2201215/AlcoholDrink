<?php require '../db-connect.php'; ?>
<?php require 'header.php'; ?>

    <?php
    $pdo=new PDO($connect, USER, PASS);
    ?>
    <h1 class="title">お酒の知識管理</h1><button class="button is-link is-medium" onclick="location.href='alcohol-i-form.php'">登録</button>
    <div class="table-container">
        <table class="table is-striped">
            <tr><th>お酒</th><th>詳細</th><th></th><th></th></tr>
            <?php
            foreach($pdo->query('select * from Knowledge') as $row){
                echo '<tr><td style="width: 200px">', $row['knowledge_name'],'</td>';
                echo '<td>', $row['knowledge_text'],'</td>';
                echo '<td style="width: 80px">', '<a href = "alcohol-u-form.php?knowledge_id=', $row['knowledge_id'] ,'">','更新','</td>';
                echo '<td style="width:80px">', '<a href = "alcohol-delete.php?knowledge_id=', $row['knowledge_id'] ,'">','削除','</td></tr>';
            }
            ?>
        </table>
    </div>
<?php require 'footer.php'; ?>