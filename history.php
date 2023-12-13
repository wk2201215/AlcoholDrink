<?php require 'not-access.php'; ?>
<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'judge.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu-back.php'; ?>
<?php include_once 'view_counter.class.php';
$counter = new ViewCounter();
//ページ固有のID
$id = 0009;
$count = $counter->log($id,$_SESSION['customer']['id']);
// echo $count;
?>

<?php
$count=0;
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('select * from Orders where customer_id=?');
    $sql->execute([$_SESSION['customer']['id']]);
    $result=$sql->fetchAll();
    if(empty($result)){
        echo '<div class="displaycenter">';
        echo '<div class="has-text-centered" style="width:100%;">';
        echo '<p class="block title is-5">購入履歴はありません。</p>';
        echo '</div>';
        echo '</div>';
    }else{
        echo '<div class="hero-body py-5">';
        echo '<label class="label">注文履歴</label>';
        for($i=0;$i<count($result);$i++){
            $sql2=$pdo->prepare('select * from Order_details where order_id=?');
            $sql2->execute([$result[$i]['order_id']]);
            $result2=$sql2->fetchAll();
            echo '<a class="box" href="history-detail.php?order_id=',$result[$i]['order_id'],'">';
            echo '<div class="columns is-mobile">';
            echo '<div class="column is-two-fifths is-flex is-justify-content-center is-align-content-center">';
            echo '<figure class="image is-96x96">';
            if(!empty($result2)){
                $sql3=$pdo->prepare('select product_name,image_pass from Products where product_id=?');
                $sql3->execute([$result2[0]['product_id']]);
                $result_img=$sql3->fetchAll();
                echo '<img class="mx-auto" alt="image" src="images/products/',$result_img[0]['image_pass'],'" style="max-width:100%;max-height:100%;width:auto;height:auto;">';
            }else{
                echo '<img class="mx-auto" alt="image" src="" style="max-width:100%;max-height:100%;width:auto;height:auto;">';
            }
            echo '</figure>';
            echo '</div>';

            echo '<div class="column is-three-fifths">';
            if(count($result2)==1){echo '<p class="txt-limit1">',$result_img[0]['product_name'],'</p>';}
            else if(count($result2)>1){echo '<p class="txt-limit1">',$result_img[0]['product_name'],'+etc</p>';}
            else{echo '<p class="txt-limit1">注文キャンセル</p>';}
            echo '<p class="txt-limit2">',$result[$i]['order_date'],'</p>';
            echo '<p>に注文されました。</p>';
            echo '</div>';
            echo '</div>';
            echo '</a>';
        }
        echo '</div>';
    }
?>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>
