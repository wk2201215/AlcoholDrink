<nav class="navbar is-block is-fixed-top has-shadow" role="navigation">
    <div class="navbar-brand" style="height:100%;width:100%;">
        <a class="navbar-item is-expanded" onclick="history.back()" style="width: 15vw">
            <span>
                <i class="fas fa-angle-left fa-2x"></i>
            </span>
        </a>
        <form action="top.php" method="post" class="navbar-item is-expanded pr-0 pl-0" style="width: 70vw">
            <div class="field has-addons" style="width: 100%">
                <div class="control" style="width: 70%">
                    <input class="input" type="text" name="keyword" placeholder="キーワード検索">
                </div>
                <div class="control" style="width: 30%">
                    <button type="submit" class="button is-info" style="width: 100%"><i class="fa fa-search" aria-hidden="true"></i>検索</button>
                </div>
            </div>
        </form>
        <a class="navbar-item is-expanded" style="width: 15vw">
            <span class="is-size-4">
                <i class="fa fa-filter" aria-hidden="true"></i>
            </span>
        </a>
    </div>
</nav>
<div id="app">
<section class="hero main">