<?php get_header(); ?>
<?php
//POSTデータをカート用のセッションに保存
var_dump($_POST['kind']);
if($_SERVER['REQUEST_METHOD']==='POST'){
    $item=$_POST['item_id'];
    $num=$_POST['num'];
    $kind=$_POST['kind'];
    $_SESSION['cart'][$item]=$num; //セッションにデータを格納
  if($kind==='delete'){
    unset($_SESSION['cart'][$item]);
  }
}
$cart=array();
if(isset($_SESSION['cart'])){
  $cart=$_SESSION['cart'];
}
var_dump($cart);
var_dump($_SESSION);
?>
<h1>カートの中身</h1>
<?php if(empty($cart)):?>
中身はありません。
<?php else: ?>
<?php foreach($cart as $key=>$val): ?>
  <form action="" method="post">
    <div>
      <?php echo get_the_title($key);?>
    </div>
    <div>
      <span>数量</span>
      <input type="hidden" name="kind" value="change">
      <input type="hidden" name="item_id" value="<?php echo $key;?>">
      <input type="number" name="num" value="<?php echo $val;?>"  min="1" >
      <input type="submit" value="変更">
    </div>
  </form>
  <form action="" method="POST">
    <input type="hidden" name="kind" value="delete">
    <input type="hidden" name="item_id" value="<?php echo $key;?>">
    <input type="submit" value="削除">
  </form>
<?php endforeach; ?>
<?php endif; ?>
<?php get_footer(); ?>