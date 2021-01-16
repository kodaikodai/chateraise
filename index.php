    <?php get_header();?>
    <!-- トップページ画像 -->
    <div class='container top_slide'>
      <div id="foo" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#foo" data-slide-to="0" class="active"></li>
          <li data-target="#foo" data-slide-to="1"></li>
          <li data-target="#foo" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/test_image1.jpg" class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/test_image2.jpg" class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/test_image3.jpg" class="d-block w-100">
          </div>
          <a class="carousel-control-prev" href="#foo"  data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a href="#foo" class="carousel-control-next" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>
      </div>
    </div>

    <!-- お知らせ -->
    <div class="notice">
      <h2>お知らせ</h2>
      <div class="notice-contents">
        <ul>
          <?php
            $notice_query = new WP_Query(
              array(
                'post_type' => 'notice', // 投稿タイプ
                'posts_per_page' => -1, // 表示件数
                'orderby' => 'date', // 表示順の基準
                'order' => 'DESC' // 昇順・降順
              ));
          ?>
          <?php if ( $notice_query->have_posts() ) : ?>
            <?php while ( $notice_query->have_posts() ) : ?>
              <?php $notice_query->the_post(); ?>
              <li class="list">
                <a href="<?php the_permalink(); ?>" class="notice-link">
                  <article class="article-loop">
                    <div class="notice-content">
                      <p class='date'><?php the_time('Y年m月d日'); ?></p>
                      <p class="notice-title"><?php the_title(); ?></p>
                    </div>
                  </article>
                </a>
              </li>
            <?php endwhile; ?>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
        </ul>
      </div>
      <div class="notice-btn">
        <button type="button" class="btn btn-outline-original more" onfocus="this.blur();">もっと見る</button>
      </div>
    </div>

    <!-- 商品カテゴリー -->
    <div class="category">
      <h2>オンライン注文</h2>
      <div class="category-frame">
        <?php
          $args = array(
            'type'                     => 'post',
            'child_of'                 => 0,
            'parent'                   => '0',
            'orderby'                  => 'name',
            'order'                    => 'ASC',
            'hide_empty'               => 1,
            'hierarchical'             => 1,
            'exclude'                  => '150',
            'include'                  => '',
            'number'                   => '',
            'taxonomy'                 => 'category',
            'pad_counts'               => false
          );
          $categories = get_categories( $args );
          foreach( $categories as $category ){
            $category_image = get_term_meta( $category->term_id, 'category-image', true );
            echo '
              <div class="category-card">
                <a href="' . get_category_link( $category->term_id ) . '">
                  <img src="' .$category_image. '" alt="">
                  <div class="category-name">
                    <p>' . $category->name . '</p>
                  </div>
                </a>
              </div>';
          }
        ?>
      </div>
    </div>
    <div class="info">
      <h2>店舗情報</h2>
      <div class="a">
        <div class="b"></div>
        <div class="c"></div>
      </div>
    </div>
    <?php get_footer(); ?>
  </body>
</html>