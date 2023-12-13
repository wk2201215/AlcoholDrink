<?php require 'header.php'; ?>

<form action = "alcohol-insert.php" method="post">
    <p><label class="has-text-weight-semibold">タイトル</label></p>
    <p class="mb-4 mx-4"><input type = "text" style="width: 200px" name = "knowledge_name"></p>
    <p class="mb-4 mx-4"><label class="has-text-weight-semibold">説明</label>
        <textarea name="knowledge_text" class="textarea is-normal is-black"></textarea>
    </p>
    <p class="has-text-centered">
		<input class="button is-link is-medium"  type="submit" value="投稿">
	</p>
</form>
<button class="button is-light tabs is-right" onclick="location.href='alcohol-list.php'">戻る</button>

<?php require 'footer.php'; ?>