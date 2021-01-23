<?php get_header(); ?>
<div class="a">
  <div class="b">
    <h1>商品検索</h1>
  </div>
  <div class="c">
    <form class="task_form">
      <p>キーワード</p>
      <input type="text" name="keyword" placeholder="検索" id="keyword" autocomplete="off">
      <hr>
      <p>カテゴリー</p>
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
            echo '
            <input type="checkbox" name="" value=""><sapn>' . $category->name . '</span>
            ';
          }
        ?>
      </div>
      <button id="search_btn" type="button" >検索</button>
    </form>
  </div>
  <div class="e"></div>
  <div class="d">
  <?php
  // $query = "SELECT id
  // FROM wp_posts
  // WHERE post_type='post'
  // AND post_status='publish'
  // AND (post_content LIKE '%ケーキ%' OR post_title LIKE '%ケーキ%')";
  // global $wpdb;
  // $rows = $wpdb->get_results($query);
  // foreach($rows as $row) {
  //   $result[] = $row->id;
  // }
  // var_dump($result);
  // echo get_post_meta(2243, 'item_price', true);
  ?>
  </div>
</div>
<script>
  // ajaxデータを受け取りビューに表示させる
  function appendPost(item){
    var html = `<div>
                  <hr>
                  <a href="${item['permalink']}" target="_blank">
                    <p>写真：${item['thumbnail']}</p>
                    <p>商品名：${item['title']}</p>
                    <p>値段：${item['price']}</p>
                  </a>
                </div>`
    $(".d").append(html)
    }

    function appendNum(n){
    var html = `<div>
                  <div>${n}件ヒット</div>
                </div>`
    $(".e").append(html)
    }

    function appendErrMsgToHTML(msg){
      var html = `<div>${msg}</div>`
      $(".d").append(html);
    }

// $("#keyword").on("keyup", function(){
//   let ajaxUrl = '<?php echo esc_url( admin_url( 'admin-ajax.php', __FILE__ ) ); ?>';
//   let input = $("#keyword").val();

//   if(input.length === 0){
//     $(".d").empty();
//   } else {
//     $.ajax({
//     type: 'POST',
//     url: ajaxUrl,
//     data: {
//       'action' : 'my_ajax',
//       'keyword': input,
//       'nonce': '<?php echo wp_create_nonce( 'my-ajax-nonce' ); ?>'
//     },
//     dataType: 'json',
//     success: function( response ) {
//       // console.log(response);
//       $(".d").empty();
//         if (response.length !== 0){
//           response.forEach(function(item){
//             appendPost(item);
//           })
//         }
//         else{
//           appendErrMsgToHTML("一致する投稿がありません")
//         }
//     }
//   });
//   }
// });

$('#search_btn').click(function(){
  console.log("hey");
  let ajaxUrl = '<?php echo esc_url( admin_url( 'admin-ajax.php', __FILE__ ) ); ?>';
  let input = $("#keyword").val();

  if(input.length === 0){
    $(".d").empty();
    $(".e").empty();
  } else {
    $.ajax({
    type: 'POST',
    url: ajaxUrl,
    data: {
      'action' : 'my_ajax',
      'keyword': input,
      'nonce': '<?php echo wp_create_nonce( 'my-ajax-nonce' ); ?>'
    },
    dataType: 'json',
    success: function( response ) {
      // console.log(response);
      $(".d").empty();
      $(".e").empty();
        if (response.length !== 0){
          let n=0;
          response.forEach(function(item){
            appendPost(item);
            n+=1;
          })
          appendNum(n);
        }
        else{
          appendErrMsgToHTML("一致する商品がありません")
        }
    }
  });
  }
});

// エンターキーのsubmitを停止
$('#keyword').keypress(function(e){
  if(e.which === 13){
    console.log("oo");
    return false;
  }
});


$('#keyword').keypress(function(e){
  if(e.which === 13){
    $('#search_btn').click();
  }
});

</script>
<?php get_footer(); ?>