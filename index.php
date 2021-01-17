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
    <div class="category" id="shopping">
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
      <div class="info_container">
        <div class="info_map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3253.84717306742!2d139.5331860513068!3d35.35943888017386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018455b8315c7f5%3A0xcbdd8242e75aeff7!2z44CSMjQ3LTAwMDYg56We5aWI5bed55yM5qiq5rWc5biC5qCE5Yy656yg6ZaT77yT5LiB55uu77yS4oiS77yY!5e0!3m2!1sja!2sjp!4v1610771848950!5m2!1sja!2sjp"  frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <div class="info_text">
          <div class="info_text_innner">
            <table>
              <tbody>
                <tr>
                  <th>店舗名</th>
                  <td>シャトレーゼ大船店</td>
                </tr>
                <tr>
                  <th>住所</th>
                  <td>〒247-0006<br>神奈川県横浜市栄区笠間3-2-8</td>
                </tr>
                <tr>
                  <th>TEL</th>
                  <td>045-892-0320</td>
                </tr>
                <tr>
                  <th>営業時間</th>
                  <td>9:00～20:00</td>
                </tr>
              </tbody>
            </table>
            <div class="map-btn">
              <a href="https://goo.gl/maps/t7exV3MiaNDxhmjv8" target="_blank">
                <button type="button" class="btn btn-outline-original" onfocus="this.blur();"><span> >> </span>Google Map</button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php get_footer(); ?>
  </body>
</html>