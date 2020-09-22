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
