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


$(function(){
  let $frame = $('.category-frame'),
  emptyCells = [],
  i;
// 子パネル (li.cell) の数だけ空の子パネル (li.cell.is-empty) を追加する。
for (i = 0; i < $frame.find('.category-card').length; i++) {
  emptyCells.push($('<div>', { class: 'category-card is-empty' }));
}
$frame.append(emptyCells);
});


