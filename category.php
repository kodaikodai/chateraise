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


<h1><?php echo $cat_name; ?></h1>

<?php foreach ( $posts as $post ): // ループの開始
setup_postdata( $post ); // 記事データの取得
?>

<div>
  <p class="textP"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br><span class="postDate"><?php echo get_the_date( $format, $post ); ?></span><span class="writeName"><?php the_author(); ?></span></p>
  <p class="imgP"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></p>
</div>



<?php endforeach; // ループの終了
wp_reset_postdata(); // 直前のクエリを復元する
?>
<?php get_footer(); ?>
