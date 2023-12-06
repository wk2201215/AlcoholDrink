<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<?php require 'db-connect.php'; ?>

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
echo '<button class="button is-large is-warning mx-auto Obutton" type="button" onclick="cart_button()">レジに進む</button>';
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
        echo '<figure style="width:100%;height:10rem;">';
        echo '<a href="detail.php?id=',$row["product_id"],'">';
        echo '<img alt="images" class="product_image mx-auto" src="images/products/',$row2['image_pass'],'">';
        echo '</a>';
        echo '</fugure>';
        echo '</div>';

        echo '<div class="column is-two-thirds">';
        echo '<div>';
        echo '<p class="txt-limit1">',$row2["product_name"],'</p>';
        echo '</div>';

        echo '<div>';
        echo '<label>￥',number_format($row2["price"]),'</label>';
        echo '</div>';
        
        echo '<div>';
        echo '<div class="columns is-mobile m-0">';
        echo '<div class="column is-two-thirds p-0">';
        if($row2['stock']==0){
            echo '<label class="has-text-danger">現在在庫切れです。</label>';
            echo '<input type="hidden" name="count[]" value=0>';
        }else if($row["cart_quantity"]>$row2['stock']){
            echo '<label class="selectbox-001">';
            echo '<select name="count[]" class="pl-5">';
            for($i=0;$i<=$row2['stock'];$i++){
                if($i==$row2['stock']){
                    echo '<option value="',$i,'" selected>数量：',$i,'</option>';
                }else{
                    echo '<option value="',$i,'">数量：',$i,'</option>';
                }
            }
            echo '</select>';
            echo '</label>';
        }else{
            echo '<label class="selectbox-001">';
            echo '<select name="count[]" class="pl-5">';
            for($i=0;$i<=$row2['stock'];$i++){
                if($i==$row["cart_quantity"]){
                    echo '<option value="',$i,'" selected>数量：',$i,'</option>';
                }else{
                    echo '<option value="',$i,'">数量：',$i,'</option>';
                }
            }
            echo '</select>';
            echo '</label>';
        }
        echo '</div>';
        echo '<div class="column is-one-third p-0">';
        echo '<button class="button mx-auto" type="button">削除</button>';
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