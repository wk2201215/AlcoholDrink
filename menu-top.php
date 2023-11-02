<!-- 上のナビゲーションバー -->
<div id="appb">
<nav class="navbar is-fixed-top" role="navigation">
  <!-- 略 -->
  <div class="navbar-brand">
        <a class="navbar-item is-expanded is-block has-text-centered">
           <span class="is-size-1">
           <i :class="keys[0].icon"></i>
           </span>
        </a>
        <a class="navbar-item is-expanded is-block has-text-centered">
           <span class="is-size-1">
           <input type="text" name="key">
           </span>
        </a>
        <a class="navbar-item is-expanded is-block has-text-centered">
           <span class="is-size-1">
           <i :class="keys[1].icon"></i>
           </span>
        </a>
    </div>
</nav>
<!-- /上のナビゲーションバー -->

<!-- ボトムナビゲーションバー -->
<nav class="navbar is-fixed-bottom" role="navigation">
    <div class="navbar-brand">
        <a class="navbar-item is-expanded is-block has-text-centered"
           v-for="(item, i) in menus"
           :key="i"
           class="menu-item">
           <span class="is-size-1">
           <i :class="item.icon"></i>
           </span>
        </a>
    </div>
</nav>
</div>
<!-- /ボトムナビゲーションバー -->

<!-- 以下にコンテンツを書く -->
<div class="contents">
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
</div>