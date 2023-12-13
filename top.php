<?php
// リファラーを取得
$referer = @$_SERVER['HTTP_REFERER'];

// リファラーが存在しない場合、直接アクセスとみなしエラーメッセージを表示
if (empty($referer)) {
    die('このページへの直接アクセスは禁止されています。');
}
?>
<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header-top.php'; ?>
<?php require 'header-menu.php'; ?>
<?php require 'top-s.php'; ?>
<?php include_once 'view_counter.class.php';
$counter = new ViewCounter();
//ページ固有のID
$id = 1010;
$count = $counter->log($id,$_SESSION['customer']['id']);
// echo $count;
?>
<?php
$pdo=new PDO($connect,USER,PASS);
if(isset($_POST['keyword'])){
//キーワード検索
    $sql=$pdo->prepare('select * from Products where product_name like ?');
    $sql->execute(['%'.$_POST['keyword'].'%']);
}else if(isset($_GET['category_id'])){
//カテゴリ検索
    $sql=$pdo->prepare('select * from Products where category_id = ?');
    $sql->execute([$_GET['category_id']]);
}else if(isset($_GET['priceA'])){
//値段範囲検索
    if($_GET['priceB']=='max'){
        //上限なし
        $sql=$pdo->prepare('select * from Products where price >= ?');
        $sql->execute([$_GET['priceA']]);
    }else{
        //値段の範囲指定
        $sql=$pdo->prepare('select * from Products where price BETWEEN ? AND ?');
        $sql->execute([$_GET['priceA'],$_GET['priceB']]);
    }
}else{
    $pdor=new PDO($connect,USER,PASS);
    $sqlr=$pdor->query('
    select P.*,num
    from Products as P 
    inner join
    (select product_id,sum(quantity) as num
    from Order_details group by product_id) as O
    on
    P.product_id=O.product_id
    order by num desc
    limit 10;');
    // var_dump($sqlr);
    // $k=$sqlr->fetchAll();
    // var_dump($k);
    // echo '<hr>';
    echo '<ul class="horizontal_scroll">';
        foreach($sqlr as $row){
            $id=$row['product_id'];
            // $rank=1;
            // echo $rank;
            // $rank++;
            // echo '<a href="detail.php?id=',$id,'"><img alt="images" src="images/products/',$row['image_pass'],'">
            //     ',$row['product_name'],'</a>';
            // echo '<p>価格:',$row['price'],'</p>';
            echo '<li>';
                echo '<a href="detail.php?id=',$id,'"><img alt="images" src="images/products/',$row['image_pass'],'">';
                echo '<div>',$row['product_name'],'</div></a>';
                echo '<div>価格:',$row['price'],'</div>';
            echo '</li>';
        }
    echo '</ul>';
    $sql=$pdo->query('select * from Products');
}
// var_dump($sqlr);
// echo '<hr>';
// var_dump($sql);
// echo '<hr>';
echo '<div class="top_products">';
foreach ($sql as $i => $row) {
   $id=$row['product_id'];
   echo '<div style="width:50vw;">'; 
   echo '<div class="box p-0 m-1">';
   echo '<figure class="image is-fullwidth has-background-white-ter full_image py-4 my-0" style="height:35vh">';
   echo '<a class="center_image" href="detail.php?id=',$id,'"><img alt="images" src="images/products/',$row['image_pass'],'"></a>';
   echo '</figure>';
   echo '<div style="height:calc(3rem * 1.5)">';
   echo '<a class="txt-limit3" href="detail.php?id=',$id,'" style="text-decoration:none;">',$row['product_name'],'</a>';
   echo '</div>';
   echo '<div class="py-3">';
   echo '<p class="subtitle txt-limit2 has-text-danger py-0 my-0">￥',number_format($row['price']),'</p>';
   echo '</div>';
   echo '</div>';
   echo '</div>';
}
echo '</div>';
?>
<?php require 'footer-menu.php'; ?>
<?php require 'footer-top.php'; ?>
