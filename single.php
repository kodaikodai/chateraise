<?php get_header(); ?>
<div class="item_wrap">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class='item_wrap_img'>
      <?php the_post_thumbnail('large'); ?>
    </div>
    <div class='item_wrap_innner'>
      <h1>
        <?php the_title(); ?>
      </h1>
      <div>
        <p>
          <?php if(get_post_meta($post->ID, 'item_price', true)): ?>
            <?php echo get_post_meta($post->ID, 'item_price', true);?>円（税込）
          <?php endif;?>
        </p>
        <div class="sentence">
          <p><?php the_content(); ?></p>
        </div>
        <?php if(!empty(get_post_meta($post->ID, 'item_expire', true))): ?>
        <ul class="item_detail">
          <p><b>日持ち</b></p>
          <li><?php echo get_post_meta($post->ID, 'item_expire', true); ?></li>
        </ul>
        <?php endif; ?>
        <ul class="nutrition-facts">
          <p><b>栄養成分</b></p>
          <li>
            <div>エネルギー</div>
            <div><?php echo get_post_meta($post->ID, 'item_cal', true); ?>kcal</div>
          </li>
          <li>
            <div>たんぱく質</div>
            <div><?php echo get_post_meta($post->ID, 'item_cal', true); ?>g</div>
          </li>
          <li>
            <div>脂質</div>
            <div><?php echo get_post_meta($post->ID, 'item_protein', true); ?>g</div>
          </li>
          <li>
            <div>炭水化物</div>
            <div><?php echo get_post_meta($post->ID, 'item_carb', true); ?>g</div>
          </li>
          <li>
            <div>食塩相当量</div>
            <div><?php echo get_post_meta($post->ID, 'item_salt', true); ?>g</div>
          </li>
        </ul>
        <ul class="annotation">
          <li>この栄養成分値は文部科学省で公表している日本食品標準成分表2015年版（七訂）に準拠したデータベースにより、計算されています。</li>
          <li>栄養成分値は平均的な数値であり、品質改良のための製品規格や使用原料の変更などにより多少変わる場合がございます。</li>
        </ul>
        <ul class="item_detail">
          <p><b>アレルギー表示（含まれているもの）</b></p>
          <li class="allergies"><?php echo get_post_meta($post->ID, 'item_allergies', true); ?></li>
        </ul>
        <form action="<?php echo get_page_link(2215)?>" method="post">
          <div class="buy-num">
            <span>数量</span>
            <input type="number" value="1"  min="1" name="num">
          </div>
          <div>
            <input type="hidden" name="item_id" value="<?php echo get_the_ID()?>">
            <input type="hidden" name="price" value="<?php echo get_post_meta($post->ID, 'item_price', true);?>">
            <div class="add_cart">
              <input type="submit" value="カートに入れる" class="btn btn-square-shadow" onfocus="this.blur();">
              <p>1件のご注文につき、お買い上げ金額が1,080円（税込）以上から承ります。<br>
              全ての商品にプラスチックスプーンは付属しておりません。ご希望のお客様は「その他お問い合わせ」欄にご記入下さい。</p>
            </div>
          </div>
        </form>
      </div>
    </div>
  <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>