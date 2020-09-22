<?php get_header(); ?>
<?php
$category = get_the_category();
$cat_id   = $category[0]->cat_ID;
$cat_name = $category[0]->cat_name;

$args = array(
	'posts_per_page' => -1, // 表示件数の指定
  'category' => $cat_id
);
$posts = get_posts( $args ); ?>

<div class="items_wrap">
  <h1><?php echo $cat_name; ?></h1>
  <div class="item_frame">
    <?php foreach ( $posts as $post ): setup_postdata( $post ); ?>
      <div class="item">
        <a href="<?php the_permalink(); ?>">
          <div class="item_img"><?php the_post_thumbnail('thumbnail'); ?></div>
          <div class="item_name">
            <p><?php the_title(); ?></p>
            <p>
              <?php if(get_post_meta($post->ID, 'item_price', true)): ?>
                <?php echo get_post_meta($post->ID, 'item_price', true);?>円（税込 <?php echo get_post_meta($post->ID, 'item_price', true) * 1.1;?>円）
              <?php endif;?>
            </p>
          </div>
          <span class="arrow"></span>
        </a>
      </div>
    <?php endforeach; wp_reset_postdata(); ?>
  </div>

</div>

<?php get_footer(); ?>

