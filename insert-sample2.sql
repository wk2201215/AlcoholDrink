-- 商品
INSERT INTO Products(product_name,category_id,price,image_pass,product_description)
VALUES 
(
'ジャック ダニエル バーボン ウイスキー [アメリカ 700ml ]',9,2525,
'https://m.media-amazon.com/images/I/61sjXyYB68L._AC_SX679_.jpg',
'商品紹介
ジャックダニエルブラックは、「テネシーウイスキー」としてバーボンとは別格にランクされる、アメリカを代表するプレミアムウイスキーです。
溜したウイスキーを木桶に詰めた楓の木炭で、一滴、一滴チャコール・メローイングするのが、創業以来の100年以上続くテネシー製法。
熟成樽由来のバニラ、キャラメル等の良い香りと、まろやかでバランスのとれた味わいが特長です。
<味>
・まろやかでバランスの取れた味わい
・オーク樽のほのかな風味
・スムースでドライな後味
<色・香り>
・充分に熟成された琥珀色
・バニラ、キャラメル、アーモンドのバランスの良い香り
原材料・成分
グレーン、モルト
アルコール度数	40 容量パーセント
ブランド	ジャックダニエル
梱包サイズ	27.1 x 13.4 x 9.5 cm; 1.15 kg
メーカーにより製造中止になりました	いいえ
容器の種類	瓶
原産国名	アメリカ
成分	グレーン、モルト
内容量	1
液体容量	700 ミリリットル
メーカー	アサヒビール
商品数	1
容器の種類	瓶
産地（地方）	ケンタッキー
商品タイプ	液体'
),
(
'ブラックニッカ クリア [ ウイスキー 日本 4000ml ]',9,3981,
'https://m.media-amazon.com/images/I/61XYfDucqeL._AC_SX522_.jpg',
'商品紹介
ノンピートモルト(ピートを使用せず乾燥させた、ピート由来のスモーキーフレイバーのない大麦麦芽)を使用する事で、
やわらかな香りとまろやかな味わいを実現したクセのないクリアな飲み心地のウイスキーです。
原材料・成分
モルト、グレーン
サイズ	4000ml
内容量  4000ml
アルコール度数  37%
容器  ペットボトル
メーカー	アサヒビール
梱包サイズ	39.7 x 13.55 x 13.34 cm; 3.94 kg
梱包重量	3.94 キログラム
製造国/地域	日本
'
);
-- 知識商品連携
INSERT INTO Knowledge_products(knowledge_id,product_id)
VALUES (1,1),(1,2),(2,1);
-- カート
INSERT INTO Carts(customer_id,product_id,cart_quantity)
VALUES (1,1,3);
-- オーダー
INSERT INTO Orders(customer_id,shipping_address,payment)
VALUES (1,'福岡市博多区博多駅南2-12-32','クレジットカード');
-- オーダー詳細
INSERT INTO Order_details(order_id,product_id,quantity)
VALUES (1,1,100),(1,2,50);
