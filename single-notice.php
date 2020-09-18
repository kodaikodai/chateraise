<?php get_header(); ?>
<div class="notice_wrap">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1>
      <?php the_title(); ?>
    </h1>
    <div class="notice_text">
      <p>
        <?php the_content(); ?>
      </p>
    </div>
    
  <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>