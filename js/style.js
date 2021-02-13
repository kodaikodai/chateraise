// var moreNum = 3;
// $('.list li:nth-child(n + ' + (moreNum + 1) + ')').addClass('is-hidden');
// $('.more').on('click', function() {
//   $('.list li.is-hidden').slice(0, moreNum).removeClass('is-hidden');
//   if ($('.list li.is-hidden').length == 0) {
//     $('.more').fadeOut();
//   }
// });

$(function(){
  if($(".list").length < 6){
    $(".notice-btn button").css("display","none");
  }
  $(".list:nth-child(n + 6)").hide();
  $(".more").click(function(){
      $(".list:nth-child(n + 6)").slideToggle();
      if($(this).text() === "もっと見る"){
        $(this).text("閉じる");
      }else{
        $(this).text("もっと見る");
      }
  });
});


// カテゴリー表示
$(function(){
  let $frame = $('.category-frame'),
  emptyCells = [],
  i;
for (i = 0; i < $frame.find('.category-card').length; i++) {
  emptyCells.push($('<div>', { class: 'category-card is-empty' }));
}
$frame.append(emptyCells);
});


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


// 商品検索
$(function(){
// ajaxデータを受け取りビューに表示させる
function appendPost(item){
  var html = `
                <div class="item">
                  <a href="${item['permalink']}" target="_blank">
                    <div class="item_img">${item['thumbnail']}</div>
                    <div class="item_name">
                      <p>${item['title']}</p>
                      <p>
                        ${item['price']}円（税込）
                      </p>
                    </div>
                    <span class="arrow"></span>
                  </a>
                </div>
              `
  $(".item_frame").append(html);
  }

  function appendNum(n){
  var html = `<div class="search_results">
                <p>${n}件の検索結果がございます。</p>
              </div>`
  $(".e").append(html)
  }

  function appendErrMsgToHTML(msg){
    var html = `<div class="search_results">
                  <p>${msg}</p>
                </div>`
    $(".item_frame").append(html);
  }

$('#search_btn').click(function(){
console.log("hey");
let ajaxUrl = ajaxurl;
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
    'nonce': nonce
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
});
