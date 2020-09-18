<?php get_header(); ?>
<main class="wrap">
  <section class="content-area content-full-width">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article class="article-full">
        <header>
          <h2><?php the_title(); ?></h2>
          <h2><?php echo get_post_meta($post->ID, 'item_price', true); ?></h2>
          <h2><?php echo get_post_meta($post->ID, 'item_allergies', true); ?></h2>
          <h2><?php echo get_post_meta($post->ID, 'item_thumbnail', true); ?></h2>
        </header>
        <?php the_content(); ?>
        <?php the_post_thumbnail('medium' ); ?>
ご注文フォーム

      </article>
<?php endwhile; else : ?>
      <article>
        <p>Sorry, no post was found!</p>
      </article>
<?php endif; ?>
  </section>
</main>
<?php get_footer(); ?>