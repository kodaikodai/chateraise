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

## このアプリについて
買って良かったもの、生活を豊かにしたもの、仕事の生産性が高まったものなどを投稿し共有する写真投稿アプリです。
ユーザー同士がモノを通じて交流したり、人生が豊かになるヒントを得られたり、
ユーザー同士のQOL（Quality of Life）を向上させることができるようなアプリケーションを目指しています。

## 制作に至った経緯
最近はミニマリストという言葉が流行ったり、昔に比べモノを所有しなくなったと言われています。
幸せの価値観も、お金を稼ぎ多くのモノを消費する時代から、
充実した体験や経験を味わう事により幸せの価値を感じる時代に移り変わっていると感じています。
私もなるべく少ないものでより生活が豊かになりたいと考えているので、
時代のニーズがあり、私自身もあったらいいなという思いから、
モノから人生が豊かになるヒントを得られるようなこのアプリを制作いたしました。

## URL
https://change-life.herokuapp.com<br>
テスト用アカウント↓↓
- Email&nbsp;:&nbsp;test1@test.<span>com</span>
- Password&nbsp;:&nbsp;testtest

## 機能の説明と工夫したところ
### トップページ
- サイト全体でレスポンシブ対応しています。
- 写真をクリックする事で投稿の詳細を表示できます。
- 最新の投稿が左上になるようにしています。
- ページネーション機能を実装しています。
[![Image from Gyazo](https://i.gyazo.com/f5d95147d77805230ac2fae2f784f889.jpg)](https://gyazo.com/f5d95147d77805230ac2fae2f784f889)
### ログイン機能
- deviseを用いて実装しました
[![Image from Gyazo](https://i.gyazo.com/7e7f690d8310f7a9b9679443f2bb0786.png)](https://gyazo.com/7e7f690d8310f7a9b9679443f2bb0786)
### 投稿機能
- ヘッダーの投稿ボタンから新規投稿ができます。
- ログインしているユーザーのみが投稿できるように制限しています。
- 直感的に操作できるようにjQueryを用いて写真をファイルから直接選択しプレビュー表示するようにしています。
- 写真投稿アプリのため、写真を選択しないと投稿できないようにバリデーションを設定しています。
[![Image from Gyazo](https://i.gyazo.com/790589ea76ccf6981ccd377c2d9a5d71.jpg)](https://gyazo.com/790589ea76ccf6981ccd377c2d9a5d71)
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
