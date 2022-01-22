<p align="center">
  <img src="https://user-images.githubusercontent.com/57389471/150487592-8887e25c-6a22-47e9-ba02-e78aed63e591.png" width=50%>
</p>
<p align="center">
  <a href="#"><img src="https://user-images.githubusercontent.com/57389471/150488800-c0bc6161-2bc7-4a83-b9f0-cd2d1a729f1e.png" height="125px;" /></a>
  <a href="#"><img src="https://user-images.githubusercontent.com/57389471/77995441-c0662700-7366-11ea-87aa-19152a8ffb22.jpg" height="125px;" /></a>
  <a href="#"><img src="https://user-images.githubusercontent.com/57389471/77995418-b8a68280-7366-11ea-9c68-15faa7874990.jpg" height="125px;" /></a>
  <a href="#"><img src="https://user-images.githubusercontent.com/57389471/150488480-f0a399bc-7d7b-432a-b845-7ec86403d434.png" height="125px;" /></a>
  <a href="#"><img src="https://user-images.githubusercontent.com/57389471/73754740-38213680-47a8-11ea-8dc7-9a7dfa30c992.png" height="125px;" /></a> 
</p>


## このサイトについて
お菓子の製造・販売を行う店舗にてネット注文を行うECサイトを作成いたしました。

## URL
http://testmywsite.wp.xdomain.jp/wp-login.php<br>
テスト用アカウント
- ユーザー名 : test
- パスワード : &xn8@$sozLtNkAW10(WE*J1!

## 実装内容/機能説明
### カスタム投稿タイプ「お知らせ」を追加
- 管理画面からトップページに表示する「お知らせ」を投稿できるように実装いたしました。
<p align="center">
  <img src="https://user-images.githubusercontent.com/57389471/150620445-b768fe25-92b2-4cef-ac3c-9c27aff85e43.png" width=70%>
</p>

### 商品の新規投稿画面にカスタムフィールドを作成
- 商品情報に共通する項目を商品追加ページで登録できるように実装いたしました。
<p align="center" style="display:flex;">
  <img src="https://user-images.githubusercontent.com/57389471/150620866-7adb0e44-4c5e-42f1-b0d3-95389890dfcd.png" width=49%>
  <img src="https://user-images.githubusercontent.com/57389471/150620865-aec70c57-33ec-485c-b4cd-8aab7b720e40.png" width=49%>
</p>

### 指定した日時に商品が自動的に非公開になる機能をカスタムフィールドとして実装いたしました。
<p align="center" style="display:flex;">
  <img src="https://user-images.githubusercontent.com/57389471/150621299-d7e7c9e0-99d6-4652-b03d-3cf8ea896534.png" width=70%>
</p>

### 商品カテゴリーに画像を設定できるように実装いたしました。
<p align="center" style="display:flex;">
  <img src="https://user-images.githubusercontent.com/57389471/150621815-d31fa7e0-1b2d-415d-ad7e-e07518652e1a.png" width=30%>
  <img src="https://user-images.githubusercontent.com/57389471/150621819-1dd624ca-5d62-48b9-b26d-2efbb7fe3c0e.png" width=69%>
</p>

### コメント投稿機能
- 投稿の詳細画面からコメントが投稿できます。
- ユーザー同士がコミュニケーションが取れるようにコメント機能を実装しています。
- ログインしているユーザーのみコメントできるように制限しています。
- コメントは非同期で投稿できるよう実装しています。（Ajax）
[![Image from Gyazo](https://i.gyazo.com/473de173e235133fb9a3cc36c2c67ec7.jpg)](https://gyazo.com/473de173e235133fb9a3cc36c2c67ec7)
### いいね機能
- 投稿に対してAjaxを用いた「いいね」ボタンを設置しています。
[![Image from Gyazo](https://i.gyazo.com/f866214ccdc7d40940633fe3df15989f.gif)](https://gyazo.com/f866214ccdc7d40940633fe3df15989f)
### マイページ機能
- 投稿者の名前をクリックする事でマイページに飛び、ユーザーの投稿一覧が確認できます。
[![Image from Gyazo](https://i.gyazo.com/868b738d857aba1d1fb496989be98a86.jpg)](https://gyazo.com/868b738d857aba1d1fb496989be98a86)
### 編集・削除機能
- 投稿詳細画面から編集・削除ができます。
- 投稿者のみが編集・削除できるように制限しています。
[![Image from Gyazo](https://i.gyazo.com/2f8926aac90026ec82127108238c0f20.png)](https://gyazo.com/2f8926aac90026ec82127108238c0f20)
### 投稿検索機能
- 入力したワードをタイトルから検索します。
- 検索した際にヒットした件数が表示されるように実装しています。
- インクリメンタルサーチを実装して、投稿の検索を非同期で行えるようにしています。
[![Image from Gyazo](https://i.gyazo.com/e62fe4b7115528cf7d0220f0bbc95f49.jpg)](https://gyazo.com/e62fe4b7115528cf7d0220f0bbc95f49)

## 今後実装したい機能
### レコメンド機能
投稿内容やいいねの履歴からユーザーにオススメの投稿を表示させ利便性を向上させたい。
### 投稿から商品を実際に購入できるような機能
気に入ったモノは直接購入できるような機能を実装する事でユーザーの利便性と満足度が高まるような仕掛けにしたい。

## データベース設計
<p align="center">
  <img src="https://i.gyazo.com/ab0f09db52d5ffd9a0a52bcee309038b.png" width=60%>
</p>
