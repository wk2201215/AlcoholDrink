<div class="slide-wrapper mb-4">
  <!-- スライド（コンテンツ） -->
  <div id="slide" class="slide">
    <?php
    $pdo2=new PDO($connect,USER,PASS);
    foreach($pdo2->query('select * from Slide') as $row){
      echo '<div>';
      echo '<img src="'.$row['img_pas'].'">';
      echo '</div>';
    }
    ?>
    <!-- <div>
      <img src="images/oni.jpg"> 
    </div>
    <div>
    <img src="images/oni.jpg"> 
    </div>
    <div>
    <img src="images/oni.jpg"> 
    </div>
    <div>
    <img src="images/oni.jpg"> 
    </div> -->
  </div>
  <!-- 左右のボタン -->
  <span id="prev" class="prev"></span>
  <span id="next" class="next"></span>
  <!-- インジケーター -->
  <ul class="indicator" id="indicator">
    <li class="list"></li>
    <li class="list"></li>
    <li class="list"></li>
    <li class="list"></li>
  </ul>
</div>