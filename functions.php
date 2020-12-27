<?php
// This function enqueues the Normalize.css for use. The first parameter is a name for the stylesheet, the second is the URL. Here we
// use an online version of the css file.
function add_normalize_CSS() {
    wp_enqueue_style( 'normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css");
}
// Register a new sidebar simply named 'sidebar'
function add_widget_Support() {
  register_sidebar( array(
                  'name'          => 'Sidebar',
                  'id'            => 'sidebar',
                  'before_widget' => '<div>',
                  'after_widget'  => '</div>',
                  'before_title'  => '<h2>',
                  'after_title'   => '</h2>',
  ) );
}
// Hook the widget initiation and run our function
add_action( 'widgets_init', 'add_Widget_Support' );

// Register a new navigation menu
function add_Main_Nav() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
// Hook to the init action hook, run our navigation menu function
add_action( 'init', 'add_Main_Nav' );


//カスタム投稿タイプ「お知らせ」の作成
function create_post_type() {
  $exampleSupports = [  // supports のパラメータを設定する配列（初期値だと title と editor のみ投稿画面で使える）
    'title',  // 記事タイトル
    'editor',  // 記事本文
    'revisions',  // リビジョン
  ];

  $labels = array(
    'name' => _x( 'お知らせ', 'notice' ),
    'singular_name' => _x( 'お知らせ', 'notice' ),
    'add_new' => _x( '新規追加', 'notice' ),
    'add_new_item' => _x( '新しいお知らせ追加', 'notice' ),
    'edit_item' => _x( 'お知らせを編集', 'notice' ),
    'new_item' => _x( '新しいお知らせ', 'notice' ),
    'view_item' => _x( 'お知らせを見る', 'notice' ),
    'search_items' => _x( 'お知らせ検索', 'notice' ),
    'not_found' => _x( 'お知らせが見つかりません', 'notice' ),
    'not_found_in_trash' => _x( 'ゴミ箱にお知らせはありません', 'notice' ),
    'parent_item_colon' => _x( '親お知らせ:', 'notice' ),
    'menu_name' => _x( 'お知らせ', 'notice' ),
    'all_items' => _x( 'お知らせ一覧', 'notice' ),
);

  $args = array(
    'labels' => $labels,
    'public' => true,  // 投稿タイプをパブリックにするか否か
    'has_archive' => true,  // アーカイブ(一覧表示)を有効にするか否か
    'menu_position' => 5,  // 管理画面上でどこに配置するか今回の場合は「投稿」の下に配置
    'supports' => $exampleSupports  // 投稿画面でどのmoduleを使うか的な設定
  );

  register_post_type('notice', $args);
}
add_action( 'init', 'create_post_type' ); // アクションに上記関数をフックします



// ---------- 管理画面のデフォルトの「投稿」を編集 -------------
function Change_menulabel() {
	global $menu;
	global $submenu;
	$name = '商品';
	$menu[5][0] = $name;
	$submenu['edit.php'][5][0] = $name.'一覧';
	$submenu['edit.php'][10][0] = $name.'の新規追加';
}
function Change_objectlabel() {
	global $wp_post_types;
	$name = '商品';
	$labels = &$wp_post_types['post']->labels;
	$labels->name = $name;
	$labels->singular_name = $name;
	$labels->add_new = _x('新規追加', $name);
	$labels->add_new_item = $name.'の新規追加';
	$labels->edit_item = $name.'の編集';
	$labels->new_item = '新規'.$name;
	$labels->view_item = $name.'を表示';
	$labels->search_items = $name.'を検索';
	$labels->not_found = $name.'が見つかりませんでした';
	$labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
}
add_action( 'init', 'Change_objectlabel' );
add_action( 'admin_menu', 'Change_menulabel' );

// 投稿でサムネイル画像を設定できるようにする
add_theme_support( 'post-thumbnails', array( 'post' ) );
set_post_thumbnail_size( 200, 200, true );

//管理画面のサムネイルカラム追加
function customize_manage_posts_columns($columns) {
  $columns['thumbnail'] = __('Thumbnail');
  return $columns;
}
add_filter( 'manage_posts_columns', 'customize_manage_posts_columns' );

//管理画面のサムネイル画像表示
function customize_manage_posts_custom_column($column_name, $post_id) {
  if ( 'thumbnail' == $column_name) {
      $thum = get_the_post_thumbnail($post_id, 'small', array( 'style'=>'width:100px;height:auto;' ));
  } if ( isset($thum) && $thum ) {
      echo $thum;
  } else {
      echo __('None');
  }
}
add_action( 'manage_posts_custom_column', 'customize_manage_posts_custom_column', 10, 2 );



// ------- カスタムフィールド作成 -------------
function add_item_fields() {
	//add_meta_box(表示される入力ボックスのHTMLのID, ラベル, 表示する内容を作成する関数名, 投稿タイプ, 表示方法)
	//第4引数のpostをpageに変更すれば固定ページにオリジナルカスタムフィールドが表示されます(custom_post_typeのslugを指定することも可能)。
	//第5引数はnormalの他にsideとadvancedがあります。
	add_meta_box( 'item-info', '商品の情報', 'insert_item_fields', 'post', 'normal');
}
add_action('admin_menu', 'add_item_fields');

// カスタムフィールドの入力エリア
function insert_item_fields() {
	global $post;
 
	//下記に管理画面に表示される入力エリアを作ります。「get_post_meta()」は現在入力されている値を表示するための記述です。
	echo '税抜き価格（半角数字）： <input type="text" name="item_price" value="'.get_post_meta($post->ID, 'item_price', true).'" size="10" />円<br>';
  echo 'アレルギー表示： <input type="text" name="item_allergies" value="'.get_post_meta($post->ID, 'item_allergies', true).'" size="50" placeholder="例 : 小麦、卵"/><br>';
  
  echo '画像： <input type="file" name="item_thumbnail" accept="image/*" value="'.get_post_meta($post->ID, 'item_thumbnail', true).'"/><br>';
  $item_thumbnail = get_post_meta($post->ID,'item_thumbnail',true);
  var_dump($item_thumbnail);
    if(isset($item_thumbnail) && strlen($item_thumbnail) > 0){
        //hoge_thumbnailキーのpostmeta情報がある場合は、画像を表示
        //$hoge_thumbnailには、後述するattach_idが格納されているので、wp_get_attachment_url関数にそのattach_idを渡して画像のURLを取得する
        echo '<img style="width: 200px;display: block;margin: 1em;" src="'.wp_get_attachment_url($item_thumbnail).'">';
    }

}
 
 
// カスタムフィールドの値を保存
function save_item_fields( $post_id ) {
	if(!empty($_POST['item_price'])){ //価格が入力されている場合
		update_post_meta($post_id, 'item_price', $_POST['item_price'] ); //値を保存
	}else{ //題名未入力の場合
		delete_post_meta($post_id, 'item_name'); //値を削除
	}
	
	if(!empty($_POST['item_allergies'])){
		update_post_meta($post_id, 'item_allergies', $_POST['item_allergies'] );
	}else{
		delete_post_meta($post_id, 'item_allergies');
  }
  
  if(!empty($_POST['item_allergies'])){
		update_post_meta($post_id, 'item_allergies', $_POST['item_allergies'] );
	}else{
		delete_post_meta($post_id, 'item_allergies');
	}

}
add_action('save_post', 'save_item_fields');

//SESSION 開始
function init_session_start(){
  if(!session_id()) {
    session_start();
  }
}
add_action('init', 'init_session_start');

// カテゴリー一覧ページの新規追加エリアに要素を追加するフック
add_action( 'category_add_form_fields', 'my_category_add_form_fields' );
function my_category_add_form_fields( $taxonomy ) {
  ?>
  <div class="form-field form-required term-image-wrap">
    <label for="category-image">画像(URL)</label>
    <input name="category-image" id="category-image" type="text" value="" size="40" aria-required="true"/>
    <p>サムネイル用の画像を設定します。</p>
    <input type="button" name="image_select" value="選択" />
    <input type="button" name="image_clear" value="クリア" />
    <div id="image_thumbnail" class="uploded-thumbnail">
    </div>
  </div>
  <script type="text/javascript">
  (function ($) {
      var custom_uploader;
      // ①選択ボタンを押した時の処理↓
      $("input:button[name=image_select]").click(function(e) {
          e.preventDefault();
          if (custom_uploader) {
              custom_uploader.open();
              return;
          }
          custom_uploader = wp.media({
              title: "画像を選択してください",
              /* ライブラリの一覧は画像のみにする */
              library: {
                  type: "image"
              },
              button: {
                  text: "画像の選択"
              },
              /* 選択できる画像は 1 つだけにする */
              multiple: false
          });
          custom_uploader.on("select", function() {
              var images = custom_uploader.state().get("selection");
              /* file の中に選択された画像の各種情報が入っている */
              images.each(function(file){
                  /* テキストフォームと表示されたサムネイル画像があればクリア */
                  $("input:text[name=category-image]").val("");
                  $("#image_thumbnail").empty();
                  /* テキストフォームに画像の URL を表示 */
                  $("input:text[name=category-image]").val(file.attributes.sizes.full.url);
                  /* プレビュー用に選択されたサムネイル画像を表示 */
                  $("#image_thumbnail").append('<img src="'+file.attributes.sizes.full.url+'" style="width:50%;height:auto;"/>');
              });
          });
          custom_uploader.open();
      });
      /* ②クリアボタンを押した時の処理 */
      $("input:button[name=image_clear]").click(function() {
          $("input:text[name=category-image]").val("");
          $("#image_thumbnail").empty();
      });
  })(jQuery);
  </script>
  <?php
}


// カテゴリー編集画面に要素を追加するフック
add_action( 'category_edit_form_fields', 'my_category_edit_form_fields', 10, 2 );
function my_category_edit_form_fields( $tag, $taxonomy ) {
  ?>
  <tr class="form-field term-image-wrap">
    <th scope="row"><label for="category-image">画像(URL)</label></th>
    <td>
      <input name="category-image" id="category-image" type="text" value="<?php echo esc_url_raw( get_term_meta( $tag->term_id, 'category-image', true ) ); ?>" size="40" aria-required="true"/>
      <p>サムネイル用の画像を設定します。</p>
      <input type="button" name="image_select" value="選択" />
      <input type="button" name="image_clear" value="クリア" />
      <div id="image_thumbnail" class="uploded-thumbnail">
        <?php if (get_term_meta( $tag->term_id, 'category-image', true )): ?>
          <img src="<?php echo esc_url_raw( get_term_meta( $tag->term_id, 'category-image', true ) ); ?>" alt="選択中の画像" style="width:50%;height:auto;">
        <?php endif ?>
      </div>
    </td>
  </tr>
  <script type="text/javascript">
  (function ($) {
      var custom_uploader;
      // ①選択ボタンを押した時の処理↓
      $("input:button[name=image_select]").click(function(e) {
          e.preventDefault();
          if (custom_uploader) {
              custom_uploader.open();
              return;
          }
          custom_uploader = wp.media({
              title: "画像を選択してください",
              /* ライブラリの一覧は画像のみにする */
              library: {
                  type: "image"
              },
              button: {
                  text: "画像の選択"
              },
              /* 選択できる画像は 1 つだけにする */
              multiple: false
          });
          custom_uploader.on("select", function() {
              var images = custom_uploader.state().get("selection");
              /* file の中に選択された画像の各種情報が入っている */
              images.each(function(file){
                  /* テキストフォームと表示されたサムネイル画像があればクリア */
                  $("input:text[name=category-image]").val("");
                  $("#image_thumbnail").empty();
                  /* テキストフォームに画像の URL を表示 */
                  $("input:text[name=category-image]").val(file.attributes.sizes.full.url);
                  /* プレビュー用に選択されたサムネイル画像を表示 */
                  $("#image_thumbnail").append('<img src="'+file.attributes.sizes.full.url+'" style="width:50%;height:auto;"/>');
              });
          });
          custom_uploader.open();
      });
      /* ②クリアボタンを押した時の処理 */
      $("input:button[name=image_clear]").click(function() {
          $("input:text[name=category-image]").val("");
          $("#image_thumbnail").empty();
      });
  })(jQuery);
  </script>
  <?php
}

function my_edit_category( $term_id ) {
  $key = 'category-image';
  /**
   * 入力された値の検証をして、更新 or 削除
   */
  if ( isset( $_POST[ $key ] ) && esc_url_raw( $_POST[ $key ] ) ) {
    update_term_meta( $term_id, $key, $_POST[ $key ] );
  } else {
    delete_term_meta( $term_id, $key );
  }
}
add_action( 'create_category', 'my_edit_category' );
add_action( 'edit_category', 'my_edit_category' );

$term = get_queried_object();
if ( $term ) {
    /**
     *  get_term_metaで取得
     */
    $meta = get_term_meta( $term->term_id, 'category-image', true );
}

function my_admin_scripts() {
  //メディアアップローダの javascript API
  wp_enqueue_media();
}
add_action( 'admin_print_scripts', 'my_admin_scripts' );

// 【管理画面】新規カテゴリー追加画面に画像カラム追加
function custom_column_header( $columns ){
  $columns['image'] = '画像';
  return $columns;
}
add_filter( "manage_edit-category_columns", 'custom_column_header', 10);

function custom_column_content( $value, $column_name, $term_id){
  if ($column_name === 'image') {
  $term_icon = get_term_meta( $term_id, 'category-image', true );
  if( $term_icon )
      echo '<img src="' . $term_icon . '" style="width:100px;height:auto;">';
  }
}
add_action( "manage_category_custom_column", 'custom_column_content', 10, 3);