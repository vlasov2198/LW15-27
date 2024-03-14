// слайдер
$(document).ready(function(){
  $('.slider').slick({
    arrows:true,
    slidesToShow: 4,
    // листание на ПК
    dragible:false,
    // листание на тачскрине
    //swipe:false,
    spaceBetween: 15,
    touchThreshold: 5,
    responsive:[
      {
        breakpoint: 900,
        settings: {
          slidesToShow: 3,
        }
      },{
        breakpoint: 700,
        settings: {
          slidesToShow: 2,
        }
      },{
        breakpoint: 550,
        settings: {
          slidesToShow: 1
        }
      }
    ],
  });
});


// Кнопка наверх
$(document).ready(function(){
  $(window).scroll(function(){
  if ($(this).scrollTop() > 100) {
  $('.scrollup').fadeIn();
  } else {
  $('.scrollup').fadeOut();
  }
  }); 
  $('.scrollup').click(function(){
  $("html, body").animate({ scrollTop: 0 }, 600);
  return false;
  });
  });


// бургер
document.addEventListener("DOMContentLoaded",  function(){
  document.getElementById("burger").addEventListener("click", function(){
    document.querySelector(".header__list").classList.toggle("open")
  })
})

// плавное появление картинки в бредах по нажатию
$(document).ready(function() {
  $(".brand_grid_box_item img").click(function() {
    var imgSrc = $(this).attr("src");
    $(".brand_overlay").fadeIn();
    $(".enlarged_img").html("<img src='" + imgSrc + "'>").fadeIn();
  });

  $(".brand_overlay, .enlarged_img").click(function() {
    $(".brand_overlay, .enlarged_img").fadeOut();
  });
});

// плавное появление первого блока 
$("#hiden_box").hide().fadeIn(2000);

// плавное появление блока с брендами
$("#hiden_brands").hide().slideDown(2000);

// плавное появление блока с медикаментами
$("#hiden_med_eq").hide().slideDown(2000);

