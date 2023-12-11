<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'judge.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>

<div class="hero-body py-5">

<?php
//DBに接続
$pdo=new PDO($connect, USER, PASS);
$id=$_SESSION['customer']['id'];

//小計の計算
$sum=0;
$sql=$pdo->prepare('select * from Carts where customer_id=?');
$sql->execute([$id]);
foreach ($sql as $row){
    $sql2=$pdo->prepare('select * from Products where product_id=?');
    $sql2->execute([$row["product_id"]]);
    foreach ($sql2 as $row2){
            $sum+=$row["cart_quantity"]*$row2["price"];
    }
}
echo '<div class="block">';
echo '<div class="block price mb-4">';
echo '<label class="heading" style="font-size: 1.8rem;">小計</label>';
echo '<label class="heading" style="font-size: 18px;font-weight: 600;">￥</label>';
echo '<p class="title">',number_format($sum),'</p>';
echo '</div>';
echo '<a class="button is-large is-warning mx-auto Obutton" type="button" href="purchase-input.php">レジに進む</a>';
echo '</div>';
echo '<hr>';

//cartテーブルの商品を出力
$sql=$pdo->prepare('select * from Carts where customer_id=?');
$sql->execute([$id]);
foreach ($sql as $row){
    $sql2=$pdo->prepare('select * from Products where product_id=?');
    $sql2->execute([$row["product_id"]]);
    echo '<input type="hidden" name="product_name[]" value=',$row["product_id"],'>';
    foreach ($sql2 as $row2){
        echo '<div class="columns is-mobile box mb-4 px-0 py-0">';

        echo '<div class="column is-one-third">'; 
        echo '<figure class="cart_image">';
        echo '<a href="detail.php?id=',$row["product_id"],'">';
        echo '<img alt="images" class="mx-auto" src="images/products/',$row2['image_pass'],'">';
        echo '</a>';
        echo '</figure>';
        echo '</div>';

        echo '<div class="column is-two-thirds">';
        echo '<div>';
        echo '<p class="txt-limit1">',$row2["product_name"],'</p>';
        echo '</div>';

        echo '<div class="my-1">';
        echo '<label>￥',number_format($row2["price"]),'</label>';
        echo '</div>';
        
        echo '<div>';
        echo '<div class="columns is-mobile m-0">';
        echo '<div class="column is-two-thirds p-0 pr-2 is-flex is-align-items-center">';
        if($row2['stock']==0){
            echo '<label class="has-text-danger" style="margin-right: -1em;font-size: 0.97em;">現在在庫切れです。</label>';
            if($row["cart_quantity"]!=0){
                $nostock_sql=$pdo->prepare('update Carts set cart_quantity=? where customer_id=? and product_id=?');
                $nostock_sql->execute([0,$_SESSION['customer']['id'],$row["product_id"]]);
                echo '<script type="text/JavaScript"> location.reload(); </script>';
            }
        }else if($row["cart_quantity"]>$row2['stock']){
                $overstock_sql=$pdo->prepare('update Carts set cart_quantity=? where customer_id=? and product_id=?');
                $overstock_sql->execute([$row2['stock'],$_SESSION['customer']['id'],$row["product_id"]]);
                echo '<script type="text/JavaScript"> location.reload() ; </script>';
        }else{
            echo '<label class="selectbox-002">';
            echo '<select name="count[]" onchange="cart_change(event)">';
            for($i=0;$i<=$row2['stock'];$i++){
                if($i==$row["cart_quantity"]){
                    echo '<option value="',$i,'" selected>数量：',$i,'</option>';
                }else{
                    echo '<option value="',$i,'">数量：',$i,'</option>';
                }
            }
            echo '</select>';
            echo '<input type="hidden" value="',$row["product_id"],'">';
            echo '</label>';
        }
        echo '</div>';
        echo '<div class="column is-one-third p-0 has-text-centered">';
        echo '<button class="button mx-auto" onclick="delete_cart_product(event)">';
        echo '<input type="hidden" value="',$row["product_id"],'">';
        echo '削除';
        echo '</button>';
        echo '</div>';
        echo '</div>';

        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
     
}
?>

</div>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>