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
            <form id="keys" action="login-output.php" method="post">
                <span class="is-size-1">
                <input id="sbox1" id="s" name="key" type="text" placeholder="フリーワードを入力">
                <button type="submit" id="sbtn1"><i class="fa fa-search"></i></button>
                </span>
            </form>
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
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
    <p>a</p>
</div>