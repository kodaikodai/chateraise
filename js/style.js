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
  $(function(){
    // ajaxデータを受け取りビューに表示させる
    function appendPost(post){
    var html = `<div class="contents__content">
                  <a class="contents__content__link" href="/posts/${post.id}">
                    <img alt="写真" class="contents__content__link__image" src=${post.image}>
                    <div class="contents__content__link__info">
                      <apan class="contents__content__link__info__title">
                      ${post.title}
                      </apan>
                      <apan class="contents__content__link__info__name">
                        <i class="fas fa-user "></i>
                        ${post.nickname}
                      </apan>
                    </div>
                  </a>
                </div>`
    $(".contents").append(html)
    }

    function appendErrMsgToHTML(msg){
      var html = `<div>${msg}</div>`
      $(".contents").append(html);
    }

    $(".upper__form__input").on("keyup", function(){
      var input = $(".upper__form__input").val();
      $.ajax({
        type: "GET",
        url: '/posts/search',
        data: { keyword: input },
        dataType: 'json',
      })
      .done(function(posts){
        $(".contents").empty();
        if (posts.length!== 0){
          posts.forEach(function(post){
            appendPost(post);
          })
        }
        else{
          appendErrMsgToHTML("一致する投稿がありません")
        }
      })
      .fail(function(){
        alert('error');
      });
    });
  });
});