var slideWidth;
var sliderTimer;
var intervals = 5000;
var n=10;
var currentSlide = 0;
var o = false;
$(function(){
	width();
$('.slidewrapper').width($('.slidewrapper').children().size()*slideWidth);
    $('.slidewrapper').hover(function(){
        clearInterval(sliderTimer);
    },function(){
		if(n>0)
        sliderTimer=setInterval(nextSlide,intervals);
    });
    $('#next_slide').click(function(){
        nextSlide();
    });
    $('#prev_slide').click(function(){
        prevSlide();
    });
	$(window).resize(function(e) {
       width();
    });
	$(window).blur(function() {
 		clearInterval(sliderTimer);
	});

	$(window).focus(function() {
		//sliderTimer=setInterval(nextSlide,intervals);
	});
});
$(document).ready(function() {
	if (document.hidden == false) {
		sliderTimer=setInterval(nextSlide,intervals);
	}
	width();
});
$(document).keydown(function(eventObject){
  var code = eventObject.which;
  if(code==37){
	  prevSlide();
  }else if(code==39){
	  nextSlide();
  }
});

function width(){
	slideWidth = $('.slider').width();
	$('.slide').each( function(i){
		$(this).width(slideWidth);
	});	
	$(".slidewrapper").width(slideWidth*$('.slidewrapper').children().size());
	goslide(0);
}
function ofls(){
		$("#status span.act").removeClass('act');
		$("#status span:eq("+currentSlide+")").addClass('act');
		setTimeout(function(){o = false;},500);
		if(n>0)
			sliderTimer=setInterval(nextSlide,intervals);
		n--;
	}
function nextSlide(){
	if(!o){
	o = true;
	clearInterval(sliderTimer);
    currentSlide=parseInt($('.slidewrapper').data('current'));
    currentSlide++;
    if(currentSlide>=$('.slidewrapper').children().size())
    {
        currentSlide=0;   
    }
	$('.slidewrapper').animate({left: -currentSlide*slideWidth},500,ofls()).data('current',currentSlide);

	}
}
function prevSlide(){
	if(!o){
	o = true;
	clearInterval(sliderTimer);
    currentSlide=parseInt($('.slidewrapper').data('current'));
    currentSlide--;
    if(currentSlide<0)
    {
        currentSlide=$('.slidewrapper').children().size()-1;   
    }
	$('.slidewrapper').animate({left: -currentSlide*slideWidth},500,ofls()).data('current',currentSlide);
	}
}
function goslide(nu){
	o = true;
    currentSlide=nu;
	n = 0;
	clearInterval(sliderTimer);
	$('.slidewrapper').animate({left: -currentSlide*slideWidth},500,ofls()).data('current',currentSlide);
}
