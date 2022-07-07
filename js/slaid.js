$(document).ready(function(){
	$('.slider').slick({
		arrows:true,
		dots:true,
		slidesToShow:5,
		autoplay:true,
		speed:1000,
		autoplaySpeed:800,
		responsive:[
			{
				breakpoint: 815,
				settings: {
					slidesToShow:3
				}
			},
			{
				breakpoint: 550,
				settings: {
					slidesToShow:1
				}
			}
		]
	});
});
$(document).ready(function(){
$('.slider2').slick({
                      centerMode: true,
                      centerPadding: '60px',
                      slidesToShow: 3,
                      responsive: [
                        {
                          breakpoint: 815,
                          settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '95px',
                            slidesToShow: 2
                          }
                        },
                        {
                          breakpoint: 550,
                          settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '70px',
                            slidesToShow: 1
                          }
                        }
                      ]
                    });
});









$(document).ready(function(){

          $('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: true,
  centerMode: true,
  focusOnSelect: true
});


});



$(document).ready(function(){
$('.slide a').on('click', function(e) {
  e.preventDefault();
  //узнаём индекс слайда без учёта клонов
  var totalSlides = +$(this).parents('.slider').slick("getSlick").slideCount,
      dataIndex = +$(this).parents('.slide').data('slick-index'),
      trueIndex;
  switch(true){
    case (dataIndex<0):
      trueIndex = totalSlides+dataIndex; break;
    case (dataIndex>=totalSlides):
      trueIndex = dataIndex%totalSlides; break;
    default: 
      trueIndex = dataIndex;
  }  
  //вызывается элемент галереи, соответствующий индексу слайда
  $.fancybox.open(gallery,{}, trueIndex);
  return false;
});

$('.slider').slick({
  slidesToShow: 5,
  arrows: true,
  dots: true,
  customPaging: function() {
    return ''
  }
});
});