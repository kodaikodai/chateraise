<?php get_header(); ?>
<div class="search_wrap">
  <div class="items_wrap">
    <h1>商品検索</h1>
  </div>
  <div class="search_detail">
    <form>
      <hr>
      <p><b>キーワード</b></p>
      <div class="input">
        <input type="text" name="keyword" placeholder="キーワードを入力してください" id="keyword" autocomplete="off">
      </div>
      <hr>
      <p><b>カテゴリー</b></p>
      <div class="category-search">
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
            echo '<div class="cat_name"><label><input class="option-input05" type="checkbox" name="checkbox" id="checkbox" value="' . $category->name . '"><sapn>' . $category->name . '</span></label></div>';
          }
        ?>
      </div>
      <div class="btn-area">
        <button id="search_btn" type="button" class="btn btn-square-shadow" onfocus="this.blur();">検索</button>
      </div>
    </form>
  </div>
  <div class="e"></div>
  <div class="item_frame"></div>
</div>
<?php get_footer(); ?>