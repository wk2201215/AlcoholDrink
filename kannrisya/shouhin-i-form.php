<?php require 'header.php'; ?>

        <form action = "shouhin-insert.php" method="post">
            <table style="border-spacing: 20px 10px;">
                <div class="field">
                    <p class="control1">
                        <tr>
                            <th><label class="has-text-weight-semibold">商品名</label></th>
                            <th><label class="has-text-weight-semibold">商品種別</label></th>
                        </tr>
           
                        <tr>
                            <td style="padding: 10px 20px;"><input style="width:300px; height: 30px;" type = "text" name = "product_name"></td>
                            <td style="padding: 10px 20px;"><input style="width:300px; height: 30px;" type = "text" name = "categori_name"></td>
                        </tr>
                    </p>
                </div>

                <div class="field">
                    <p class="control2">
                        <tr>
                            <th><label class="has-text-weight-semibold">販売価格</label></th>
                            <th><label class="has-text-weight-semibold">商品画像パス</label></th>
                        </tr>
                        <tr>
                            <td style="padding: 10px 20px;"><input style="width:300px; height: 30px;" type = "text" name = "price"></td>
                            <td style="padding: 10px 20px;"><input style="width:300px; height: 30px;" type = "text" name = "image_pass"></td>
                        </tr>
                    </p>
                </div>
            </table>    

            <div class="field">
                <p class="control3">
                    <div class="mb-2">
                        <label class="has-text-weight-semibold">商品説明</label>
                    </div>
            
                    <div class="mx-4">
                        <textarea name="description" class="textarea is-normal is-black"></textarea>
                    </div>
                </p>
            </div>

                <div class="has-text-centered">
                    <input class=" button is-link is-medium" type = "submit" value = "登録">
                </div>
        </form>
<button class="button is-light tabs is-right" onclick="location.href='shouhin-list.php'">戻る</button>

<?php require 'footer.php'; ?>

<!-- 

<<div class="level-item">
    <div class="field has-addons">
        <form action = "shouhin-insert.php" method="post">
            <table style="border-spacing: 20px 10px;">
                <tr>
                    <th><label class="has-text-weight-semibold">商品名</label></th>
                    <th><label class="has-text-weight-semibold">商品種別</label></th>
                </tr>

                <tr>
                    <td style="padding: 10px 20px;"><input type = "text" name = "product_name"></td>
                    <td style="padding: 10px 20px;"><input type = "text" name = "categori_name"></td>
                </tr>

                <tr>
                    <th><label class="has-text-weight-semibold">販売価格</label></th>
                    <th><label class="has-text-weight-semibold">商品画像パス</label></th>
                </tr>
                <tr>
                    <td style="padding: 10px 20px;"><input type = "text" name = "price"></td>
                    <td style="padding: 10px 20px;"><input type = "text" name = "image_pass"></td>
                </tr>
            </table>    
                <p><label class="has-text-weight-semibold">商品説明</label></p>
            
                <p class="mb-4 mx-4">
                    <textarea name="description" class="textarea is-normal"></textarea>
                </p>
            
                <p class="has-text-centered">
                    <input class=" button is-link is-medium" type = "submit" value = "登録">
                </p>
            
        </form>
    </div>
</div>
<button class="button is-light tabs is-right" onclick="location.href='shouhin-list.php'">戻る</button>
 -->