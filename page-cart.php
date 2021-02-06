<?php
//ページにアクセスする際に使用されたリクエストのメソッドがPOSTの時
if($_SERVER['REQUEST_METHOD']==='POST'){
    $item=$_POST['item_id'];
    $num=$_POST['num'];
    $price=$_POST['price'];
    $_SESSION['cart'][$item]=['num'=>$num,'price'=>$price];//POSTデータをカート用のセッションに保存
  if($_POST['action']==='delete'){
    // 削除
    unset($_SESSION['cart'][$item]);
  }
}
$cart=array();
if(isset($_SESSION['cart'])){
  $cart=$_SESSION['cart'];
}
?>
<?php get_header(); ?>
<div class="cart">
  <div class="cart_title">
    <h1>現在のカートの中身</h1>
  </div>
  <div class="cart_frame">
    <?php if(empty($cart)):?>
    <div class="none-item"><p>中身はございません</p></div>
    <?php else:?>
    <div class="cart_items">
      <?php foreach($cart as $key=>$val):?>
      <hr>
      <div class="cart_item">
        <div class="image">
          <?php echo get_the_post_thumbnail( $key ); ?>
        </div>
        <div class="cart_info">
          <div>
            <p>商品名：<?php echo get_the_title($key);?></p>
          </div>
          <form action="" method="POST">
            <div>
              <p>単価：<?php echo $val['price'];?>円（税込）</p>
              <input type="hidden" name="price" value="<?php echo $val['price'];?>">
            </div>
            <div class="cart-num">
              <span>数量：</span>
              <input type="hidden" name="action" value="change">
              <input type="hidden" name="item_id" value="<?php echo $key;?>">
              <input type="number" name="num" value="<?php echo $val['num'];?>"  min="1" class="number">
              <input type="submit" value="変更" class="btn btn-square-shadow" onfocus="this.blur();">
            </div>
            <div>
              <p>小計：<?php echo $val['price'] * $val['num'];?>円（税込）</p>
            </div>
          </form>
          <form action="" method="POST">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="item_id" value="<?php echo $key;?>">
            <input type="submit" value="削除" class="btn btn-square-shadow">
          </form>
        </div>
      </div>
      <?php $total_price += $val['price'] * $val['num'];
      endforeach;?>
      <hr>
    </div>
    <div class="detail">
      <div class="detail_container">
        <div>
          <div class="detail_total">
            <span>合計</span>
            <span><?php echo number_format($total_price);?>円</span>
          </div>
          <div class="detail_link">
            <div class="detail_link_buy"><button type="button" class="btn btn-outline-original" onfocus="this.blur();">購入手続きへ</button></div>
          </div>
        </div>
      </div>
      <a href="<?php echo esc_url( home_url( '/#shopping' ) )?>">
        <div class="link_shop"><button type="button" class="btn btn-outline-original" onfocus="this.blur();">お買い物を続ける</button></div>
      </a>
    </div>
    <?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>