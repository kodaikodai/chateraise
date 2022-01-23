<p align="center">
  <img src="https://user-images.githubusercontent.com/57389471/150487592-8887e25c-6a22-47e9-ba02-e78aed63e591.png" width=50%>
</p>
<p align="center">
  <a href="#"><img src="https://user-images.githubusercontent.com/57389471/150488800-c0bc6161-2bc7-4a83-b9f0-cd2d1a729f1e.png" height="125px;" /></a>
  <a href="#"><img src="https://user-images.githubusercontent.com/57389471/77995441-c0662700-7366-11ea-87aa-19152a8ffb22.jpg" height="125px;" /></a>
  <a href="#"><img src="https://user-images.githubusercontent.com/57389471/77995418-b8a68280-7366-11ea-9c68-15faa7874990.jpg" height="125px;" /></a>
  <a href="#"><img src="https://user-images.githubusercontent.com/57389471/150488480-f0a399bc-7d7b-432a-b845-7ec86403d434.png" height="125px;" /></a>
  <a href="#"><img src="https://user-images.githubusercontent.com/57389471/73754740-38213680-47a8-11ea-8dc7-9a7dfa30c992.png" height="80px;" /></a> 
</p>


## このサイトについて
お菓子の製造・販売を行う店舗にて、ネット注文を行うECサイトを作成いたしました。

## URL
http://testmywsite.wp.xdomain.jp/wp-login.php<br>
テスト用アカウント
- ユーザー名 : test
- パスワード : &xn8@$sozLtNkAW10(WE*J1!

## 実装内容/機能説明
### ✅カスタム投稿タイプ「お知らせ」を追加
- 管理画面からトップページに表示する「お知らせ」を投稿できるように実装いたしました。
<p align="center">
  <img src="https://user-images.githubusercontent.com/57389471/150620445-b768fe25-92b2-4cef-ac3c-9c27aff85e43.png" width=70%>
</p>

### ✅商品の新規投稿画面にカスタムフィールドを作成
- 商品情報に共通する項目を商品追加ページで登録できるように実装いたしました。
<p align="center" style="display:flex;">
  <img src="https://user-images.githubusercontent.com/57389471/150620866-7adb0e44-4c5e-42f1-b0d3-95389890dfcd.png" width=49%>
  <img src="https://user-images.githubusercontent.com/57389471/150620865-aec70c57-33ec-485c-b4cd-8aab7b720e40.png" width=49%>
</p>

### ✅設定した日時に商品が自動的に非公開になる機能をカスタムフィールドとして実装いたしました。
<p align="center">
  <img src="https://user-images.githubusercontent.com/57389471/150621299-d7e7c9e0-99d6-4652-b03d-3cf8ea896534.png" width=70%>
</p>

### ✅商品カテゴリーに画像を設定できるように実装いたしました。
<p align="center" style="display:flex;">
  <img src="https://user-images.githubusercontent.com/57389471/150621815-d31fa7e0-1b2d-415d-ad7e-e07518652e1a.png" width=30%>
  <img src="https://user-images.githubusercontent.com/57389471/150621819-1dd624ca-5d62-48b9-b26d-2efbb7fe3c0e.png" width=69%>
</p>

### ✅カート機能
- POSTデータをカート用のセッションに保存しカート画面でカートの中身一覧を表示しています。
- カートの商品個数を計算しに右上にカートの商品個数を表示しています。
<p align="center">
  <img src="https://user-images.githubusercontent.com/57389471/150659615-4ad644b8-2ed1-4cb6-a2c3-faca033b0ee6.png">
</p>

### ✅商品検索機能
- Ajax通信を用いて非同期で商品検索できるように実装しています。
- カテゴリーやキーワードなどの検索条件からSQLを用いて商品データを取得しています。
[![Image from Gyazo](https://i.gyazo.com/0b9dec9eb6721d1368cec98cddf0f400.gif)](https://gyazo.com/0b9dec9eb6721d1368cec98cddf0f400)
