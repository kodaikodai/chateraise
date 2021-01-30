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
<script>
  // ajaxデータを受け取りビューに表示させる
  function appendPost(item){
    var html = `
                  <div class="item">
                    <a href="${item['permalink']}" target="_blank">
                      <div class="item_img">${item['thumbnail']}</div>
                      <div class="item_name">
                        <p>${item['title']}</p>
                        <p>
                          ${item['price']}円（税込${item['price'] * 1.08}円）
                        </p>
                      </div>
                      <span class="arrow"></span>
                    </a>
                  </div>
                `
    $(".item_frame").append(html);
    }

    function appendNum(n){
    var html = `<div>
                  <div>${n}件ヒット</div>
                </div>`
    $(".e").append(html)
    }

    function appendErrMsgToHTML(msg){
      var html = `<div>${msg}</div>`
      $(".item_frame").append(html);
    }

$('#search_btn').click(function(){
  console.log("hey");
  let ajaxUrl = '<?php echo esc_url( admin_url( 'admin-ajax.php', __FILE__ ) ); ?>';
  let input = $("#keyword").val();
  const cat_val = [];
  $('input:checkbox[name="checkbox"]:checked').each(function() {
			cat_val.push($(this).val());
	});
console.log(cat_val);
console.log(input);
  if(input.length === 0 && cat_val.length === 0){
    $(".item_frame").empty();
    $(".e").empty();
  } else {
    $.ajax({
    type: 'POST',
    url: ajaxUrl,
    data: {
      'action' : 'my_ajax',
      'keyword': input,
      'category': cat_val,
      'nonce': '<?php echo wp_create_nonce( 'my-ajax-nonce' ); ?>'
    },
    dataType: 'json',
    success: function( response ) {
      console.log(response);
      $(".item_frame").empty();
      $(".e").empty();
        if (response.length !== 0){
          let n=0;
          response.forEach(function(item){
            appendPost(item);
            n+=1;
          })
          appendNum(n);
          // カテゴリー商品表示
          $(function(){
            let $item_frame = $('.item_frame'),
            emptyCells = [],
            i;
          for (i = 0; i < $item_frame.find('.item').length; i++) {
            emptyCells.push($('<div>', { class: 'item is-empty' }));
          }
          $item_frame.append(emptyCells);
          });
        }
        else{
          appendErrMsgToHTML("一致する商品がありません")
        }
    }
  });
  $("#keyword").val('');
  $('input:checkbox[name="checkbox"]').each(function(){
    this.checked = false;
  })
  }
});

// エンターキーのsubmitを停止
$('#keyword').keypress(function(e){
  if(e.which === 13){
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