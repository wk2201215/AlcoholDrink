<div class="slide-wrapper">
  <!-- スライド（コンテンツ） -->
  <div id="slide" class="slide">
    <?php
    $pdo2=new PDO($connect,USER,PASS);
    $count=0;
    foreach($pdo2->query('select * from Slide') as $row){
      echo '<div>';
      echo '<img src="'.$row['img_pas'].'">';
      echo '<div>';
      $count++;
    }
    ?>
  </div>
  <!-- 左右のボタン -->
  <span id="prev" class="prev"></span>
  <span id="next" class="next"></span>
  <!-- インジケーター -->
  <ul class="indicator" id="indicator">
    <?php
    for($i=0;$i<$count;$i++){
      echo '<li class="list"></li>';
    }
    ?>
  </ul>
</div>