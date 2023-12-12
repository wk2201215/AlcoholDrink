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
                            <!-- ドロップダウンに変更↓ -->
                            <td>
                                
                                <select name = "category_id">
									<option value="1">ビール</option>
									<option value="2">発泡酒</option>
									<option value="3">その他の発泡性酒類</option>
									<option value="4">清酒</option>
									<option value="5">果実酒</option>
									<option value="6">その他の醸造酒</option>
									<option value="7">連続式蒸留焼酎</option>
									<option value="8">単式蒸留焼酎</option>
									<option value="9">ウイスキー</option>
									<option value="10">ブランデー</option>
									<option value="11">原料用アルコール</option>
									<option value="12">スピリッツ</option>
									<option value="13">合成清酒</option>
									<option value="14">みりん</option>
									<option value="15">甘味果実酒</option>
									<option value="16">リキュール</option>
									<option value="17">粉末酒</option>
									<option value="18">雑酒</option>
									<option value="19">その他</option>
								</select> 
                                
                            </td> 
                        </tr>
                    </p>
                </div>

                <div class="field">
                    <p class="control2">
                        <tr>
                            <th><label class="has-text-weight-semibold">販売価格</label></th>
                            <th><label class="has-text-weight-semibold">商品画像パス</label></th>
                            <th><label class="has-text-weight-semibold">割引</label></th>
                        </tr>
                        <tr>
                            <td style="padding: 10px 20px;"><input style="width:300px; height: 30px;" type = "text" name = "price"></td>
                            <td style="padding: 10px 20px;"><input style="width:300px; height: 30px;" type = "text" name = "image_pass"></td>
                            <td style="padding: 10px 20px;"><input style="width:300px; height: 30px;" type = "text" name = "discount"></td>
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