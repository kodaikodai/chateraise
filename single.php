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
            <?php echo get_post_meta($post->ID, 'item_price', true);?>円（税込 <?php echo get_post_meta($post->ID, 'item_price', true) * 1.1;?>円）
          <?php endif;?>
        </p>
        <p class='sentence'><?php the_content(); ?></p>
        <p>アレルギー：<?php echo get_post_meta($post->ID, 'item_allergies', true); ?></p>
      ご注文フォーム
      </div>
    </div>
  <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>