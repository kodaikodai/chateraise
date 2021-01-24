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
            <?php echo get_post_meta($post->ID, 'item_price', true);?>円（税込 <?php echo get_post_meta($post->ID, 'item_price', true) * 1.08;?>円）
          <?php endif;?>
        </p>
        <p class='sentence'><?php the_content(); ?></p>
        <p>アレルギー：<?php echo get_post_meta($post->ID, 'item_allergies', true); ?></p>
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
            </div>
          </div>
        </form>
      </div>
    </div>
  <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>