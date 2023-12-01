<?php require 'header.php'; ?>

<form action = "alcohol-insert.php" method="post">
    タイトル<input type = "text" name = "knowledge_name"><br>
    説明<textarea name="knowledge_text" class="textarea is-normal"></textarea><br>
    <button class="button is-medium">投稿</button>
    <!-- <input type = "submit" class="is-medium" value = "投稿"> -->
</form>

<?php require 'footer.php'; ?>