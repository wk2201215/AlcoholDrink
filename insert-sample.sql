--顧客テーブル--

INSERT INTO customers(login_id,customer_name,customer_password,postcode,address,telephone,mail,birth,identification_image_pass)
VALUES ('admin', '管理者', 'Pass1036', '8120016', '福岡市博多区博多駅南2－12－32', '0120－371－007', 'asojuku@asojuku.co.jp','2023－11－08','https://asojuku.ac.jp/abcc/images/mv_pc.jpg');

--半角の－は使えない--


--身分証テーブル--
INSERT INTO identifications(identification_name)
VALUES ('運転免許証'),('保険証'),('マイナンバーカード'),('パスポート'),('身体障害者手帳'),('在留カード'),('写真付き住民基本台帳カード');

--カテゴリ--
INSERT INTO categories(category_name)
VALUES ('ビール'),('発泡酒'),('その他の発泡性酒類'),('清酒'),('果実酒'),('その他の醸造酒'),('連続式蒸留焼酎'),('単式蒸留焼酎'),('ウイスキー'),('ブランデー'),('原料用アルコール'),('スピリッツ'),('合成清酒'),('みりん'),('甘味果実酒'),('リキュール'),('粉末酒'),('雑酒');

---レシピ--
INSERT INTO recipes(recipe_name,customer_id,recipe_image_pass,recipe_description)
VALUES 
('オリジナルカクテル「逆さ富士」',1,
'https://img.cpcdn.com/recipes/7458128/894x1461s/201eeb389b9a557a83626ae185bab4fe?u=7003538&p=1677196506',
'カクテルグラスの形状を活かして、湖面に映る逆さ富士をグラスに表現してみました。
コツ・ポイント
ヨーグルトリキュールを沈めることで、富士山に積もった雪を表現しています。
ヨーグルトリキュールが手に入らない方は、ヨーグルトドリンクで代用することもできます。
このレシピの生い立ち
カクテルグラスを眺めていたら思いつきました。'),
('とりせせりのおつまみ',1,
'https://img.cpcdn.com/recipes/7663771/894x1461s/fb024f08553eb573d3210aa4d7722e62?u=7699455&p=1699230226',
'家にねぎがなかったので、玉ねぎで代用しました。
コツ・ポイント
今回は塩こしょうを少し多めに入れて作りました。（5振りくらい）
このレシピの生い立ち
スーパーにせせりが売っていたので、今夜のビールのおともに作りました。');

--レシピ材料--
INSERT INTO recipe_ingredients(recipe_id,ingredient_number,ingredient_name,ingredient_quantity)
VALUES 
(1,1,'日本酒','30ｍｌ（大さじ２）'),
(1,2,'ブルーキュラソー','15ｍｌ（大さじ１）'),
(1,3,'レモンジュース','15ｍｌ（大さじ１）'),
(1,4,'ヨーグルトリキュール','１ｔｓｐ（ティースプーン１杯）'),
(2,1,'油','大さじ1'),
(2,2,'とりのせせり','1パック'),
(2,3,'玉ねぎ','1/4個'),
(2,4,'おろしニンニク','3cm位'),
(2,5,'塩こしょう','5振り位'),
(2,6,'ラー油','3適宜'),
(2,7,'ごま油','適宜'),
(2,8,'黒こしょう','少々');

--レシピ手順--
INSERT INTO recipe_cooking(recipe_id,cooking_number,cooking_procedure)
VALUES 
(1,1,'ヨーグルトリキュール以外の材料をシェーカーに入れます。氷を加えてシェークします。グラスに注ぎます。'),
(1,2,'ヨーグルトリキュールをグラスの底に沈めて完成です。'),
(2,1,'フライパンに油を熱し、おろしニンニクを入れ、せせりを中火で炒め、塩こしょうする。'),
(2,2,'玉ねぎはスライスし、水に5分さらし、よく水を切る。ラー油とごま油を混ぜ合わせておく。'),
(2,3,'しっかり火を通し、黒こしょうをふり、器に取り分け、②の玉ねぎを盛り付け完成！');


--知識--

INSERT INTO knowledge(knowledge_name,knowledge_text)
VALUES ('ウイスキーとは？','ウイスキーの定義は国や地域で異なりますが、一般的には「穀物を原料に蒸留をして樽で熟成させたもの」がウイスキーと呼ばれています。')
('ウイスキーの原料は？','ウイスキーの原料にはさまざまな穀物が使用されています。ジャパニーズウイスキー・スコッチウイスキー・アイリッシュウイスキーなどでは、発芽した大麦の麦芽を使用することが多いです。アメリカンウイスキーの場合はトウモロコシやライ麦・小麦や大麦など幅広く使用されています。ほかの原料にはオーツ麦・キビなどもあり、生産国それぞれの文化や伝統に基づいたルールに基づいて使用されています。'),
('モルトウイスキーとグレーンウイスキーの違いは？','スコッチウイスキーには大きく分けてモルトウイスキーとグレーンウイスキーの2種類があり、原料や蒸留器、味わいに違いがあります。モルトウイスキーの原料は大麦を発芽させた麦芽。砕いて水と混ぜることで酵素が働き、デンプンを糖化します。これを濾過した麦汁を発酵させたアルコール度数約7％の液体を「単式蒸留器」という蒸留器で2回、もしくは3回蒸留。蒸留直後の原液は、「ニューポット(ニューメイク)」と呼ばれ、無色透明、アルコール度数60～70％です。そしてその原液を樽熟成します。
グレーンウイスキーの製造工程もモルトウイスキーと同じですが、トウモロコシやライ麦・小麦などの穀類が主原料で、「連続式蒸留機」という蒸留器で蒸留することが特徴です。モルトウイスキーが個性的な風味から「ラウドスピリッツ」と呼ばれるのに対し、グレーンウイスキーはおだやかな風味から「サイレントスピリッツ」と呼ばれています。グレーンウイスキーは単体で飲まれることは少なく、モルトウイスキーとブレンドすることで味や香りのバランスがとれて口当たりの良いブレンデッドウイスキーとなります。'),
('ウイスキーと焼酎の違いは？','穀物から造られる蒸留酒という点では焼酎とウイスキーは似ていますが、焼酎は麹によってアルコールを発生させ、ウイスキーは穀物の糖化酵素を用い、さらに酵母を添加することによってアルコールを発生させるという違いがあります。また焼酎も樽熟成されることがありますが、着色度はウイスキーの5分の1程度まででなければならないと規制されています。'),
('ウイスキーを熟成するのはなぜ？','無色透明の「ニューポット(ニューメイク)」は、樽での熟成を経て琥珀色に変化していきます。熟成することで樽からアルコールが蒸散し、非常にマイルドな味わいになり、複雑で豊かな香りの成分が出てきます。
たとえばスコッチウイスキーの場合、スコットランド内でオークの樽を用いて最低3年間以上熟成させる必要があると定められています。オーク樽のほかにもミズナラ樽・バーボン樽・シェリー樽などもあり、樽材によって味わいも大きく変化します。長期のものでは70年熟成のウイスキーが発売されたこともあります。ちなみにウイスキーはボトルで購入し保存しても、瓶内で熟成が進むことはありません。'),
('ウイスキーのアルコール度数は？','「ニューポット(ニューメイク)」のアルコール度数は60～70％程度ですが、一般的には加水することで40～43％程度で販売されることが多いです。アルコールの刺激を抑えることで鼻が香りを感じ取りやすく、ストレート・ロック・ハイボールと、さまざまな飲み方でバランス良く楽しめるといわれています。
アルコール度数は蒸留所の考え方でも異なり、たとえば日本最小の蒸留所として有名な滋賀県の長濱蒸溜所のウイスキーはモルトの風味が強いので、その力強さを表現するためには高めのアルコール度数が適していると考えて47％以上にこだわっています。'),
('ウイスキーは低カロリー？','ウイスキーにもカロリーはありますが、ワインやビール・日本酒などの醸造酒と比べると低いといえるでしょう。糖質やプリン体を気にして、晩酌をビールからハイボールに変えたという方も多いようです。'),
('ウイスキーのブレンドって？','単一の樽で熟成されたウイスキーをボトリングした「シングルカスク」「シングルバレル」を除き、ウイスキーはブレンドにより造られます。ブレンドが必要なウイスキーとして主に、モルト原酒とグレーン原酒をブレンドした「ブレンデッドウイスキー」、複数の蒸留所のモルト原酒をブレンドした「ブレンデッドモルト」、単一蒸留所のモルト原酒をブレンドした「シングルモルト」の3種類。ブレンドをすることで、ロットに関わらず品質を均一に保つことと、一方で新しい味わいを生み出すことが可能になります。
ウイスキーのブレンディングは、蒸留所の最高責任者である「マスターブレンダー」が、オーケストラの実力を引き出す指揮者さながらにブレンドに用いる樽をききわけていきます。マスターブレンダーが移籍することで、その蒸留所自体の評価が変わることも少なくありません。'),
('世界5大ウイスキーとは？','現在では世界中でウイスキーが造られていますが、世界的に高い評価を受ける生産国として世界5大ウイスキーが知られています。ちなみにウイスキーの綴(スペル)は、アイルランドとアメリカではwhiskeyと表記されることが多く、そのほかの生産国ではwhiskyと表記されることが一般的です。
【スコッチウイスキー】
世界で最も生産量が多いスコットランド産のウイスキー。麦芽を乾燥させる際に使用するピート(泥炭)由来のスモーキーな香りが特徴です。(ノンピートのものもあります)
【アイリッシュウイスキー】
ウイスキー発祥の地とされるアイルランド産のウイスキー。年間の気温差が小さく、冷涼で程よい湿度があるアイルランドの気候はウイスキーの製造に適しています｡
【アメリカンウイスキー】
アメリカ東海岸に植民したスコットランド人やアイルランド人がウイスキーの蒸留を開始。ケンタッキー州を中心に造られているバーボンウイスキーが有名です。近年では、温暖な気候のワシントン州・オレゴン州などのアメリカンシングルモルトが注目を集めています。
【カナディアンウイスキー】
カナダ産ウイスキーは、アメリカの禁酒法の時代に生産量を拡大しました。フレーバリングウイスキーとベースウイスキーの2タイプの原酒をブレンドしたブレンデッドウイスキーが主流。比較的ライトな酒質が特徴です。
【ジャパニーズウイスキー】
日本ウイスキーの父と呼ばれる竹鶴 政孝が1918年にスコットランドへ留学してウイスキー製造を学んだため、スコッチウイスキーの製造スタイルが踏襲されています。'),
('ジャパニーズウイスキーはなぜ人気？','大手メーカーだけでなくクラフトウイスキーのメーカーも急増し、国際的にも評価が高まり続けるのがジャパニーズウイスキーです。蒸留所の規模によって、それぞれ強みがあります。大手メーカーの場合、一社で何種類もの酒質を造り分けることができ、そのバラエティー豊かな酒質をブレンドした多様なウイスキーが造れます。一方、小規模なクラフトウイスキーのメーカーは、風土を活かした酒造りと、フットワーク軽くさまざまな挑戦がしやすいことがメリットです。
そしてワイン造りなどと異なり、ウイスキーの原料となる麦芽は基本的に輸入となるため、原料の質でなく造り手の技術力ができあがりの品質に大きく反映されます。既存の技術を洗練させることが得意で、丁寧な仕事と繊細な味覚を備えた日本人の気質に、ウイスキー造りは合っているのかもしれません。また日本在住であれば、日本各地の蒸留所を訪れるウイスキーツーリズムが気軽に楽しめることも醍醐味だといえるでしょう。'),
('ウイスキーの飲み方・楽しみ方','ストレート
造り手が構成した味わいをダイレクトに堪能できる飲み方です。初めて飲むウイスキーは、ぜひストレートで味わってみてください。時間の経過とともに変化していく香りをゆっくりと楽しめます。グラスは繊細な風味を感じやすいテイスティンググラスがおすすめです。
トワイスアップ
ウイスキーと水を1：1で割る飲み方です。一般的に香りを感じやすいアルコール度数は20％程度だとされており、トワイスアップにすると香りが取りやすくなるといわれています。ただしアルコール度数やその感じ方はウイスキーによって異なるため、ストレートに水を少しずつ足しながら飲み進めるのもおすすめです。テイスティンググラス、または小ぶりなワイングラスでお楽しみください。
オン・ザ・ロック
ロックグラスに大きめの氷を入れ、ウイスキーを注いでステア(軽くかき混ぜること)します。ストレートに比べて爽やかで飲みやすく、徐々に氷が溶けていくことで味わいの変化を楽しめます。あとは見た目がかっこいい、氷を指で回すことや氷の触れ合う音が好きだという方も多いです。
ハイボール
タンブラーに氷を入れ、ウイスキーをソーダで割ってステアする飲み方です。一般的な割合は、ウイスキー1に対してソーダ3。日本では1940～50年代に流行し、2009年前後から「角ハイボール」をきっかけに再流行しました。食事とも合わせやすく、ビールに代わる最初の1杯にもおすすめです。
水割り
タンブラーに氷を入れ、ウイスキーを水で割ってステアする昔ながらの飲み方です。ウイスキー1に対してミネラルウオーター2の割合が一般的です。炭酸のきいたハイボールよりもすいすい飲みやすく、食事と一緒に楽しむ方にもおすすめです。'),
('ウイスキーと食事のマリアージュは？','ウイスキーのおつまみといえばチョコレート・ドライフルーツ・ナッツと合わせることが一般的ですが、「BAR 新宿ウイスキーサロン」では、たとえば焼きマシュマロや、ピクルス・柚子ジャム・ミントを乗せたクラッカーなど、ウイスキーと合わせることで相乗効果が楽しめるフードの提案に力を入れています。
また近年はハイボールブームもあり、食中にウイスキーを楽しむ方も増えてきました。国際的にはハイボール以外にもウイスキーベースのカクテルが流行していることもあり、ウイスキーベースのカクテルが日本で定着することでフードとのペアリングの可能性もさらに広がっていくように感じています。')
;