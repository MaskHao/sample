$(function(){

	//预加载
	var impImg = ['images/whitelogo.png','images/sharelogo.jpg','images/up.png','images/video.png','images/play.png','images/awaken.png','images/bg_a.jpg','images/bg_b.jpg','images/bg_c.jpg','images/bg_d.jpg','images/bg_e.jpg','images/bg_f.jpg','images/bg_g.jpg','images/bg_h.jpg','images/bg_i.jpg','images/bg_j.jpg','images/brave.png','images/braves.png','images/car.png','images/cars.png','images/collar.png','images/font_a1.png','images/font_a2.png','images/font_a3.png','images/font_b1.png','images/font_b2.png','images/font_b3.png','images/font_c.png','images/font_d1.png','images/font_d2.png','images/font_e1.png','images/font_e2.png','images/font_e3.png','images/font_e4.png','images/font_e5.png','images/font_f1.png','images/font_f2.png','images/font_f3.png','images/font_g11.png','images/font_g12.png','images/font_g2.png','images/font_h1.png','images/font_h2.png','images/font_h3.png','images/font_i1.png','images/font_i2.png','images/font_j1.png','images/font_j2.png','images/font_j3.png','images/font_j7.png','images/font_j5.png','images/font_j6.png','images/happy.png','images/line.png','images/logo.png','images/love.png','images/motivate.png','images/music.png','images/music_off.png','images/share.png','images/square.png','images/sway.png','images/ten.png','images/tens.png','images/touch.png']

    preloadimage(impImg);

    function fnLoad(iNow,sum){          //loading
        $('.loading>p').html( parseInt(((iNow+1)/sum)*100) +"%");
        $('.loading_bg>div').css({
            width: parseInt(((iNow+1)/sum)*100) +"%"
        });
    }

    function preloadimage(arr){
        var newimages=[], loadedimages=0;
        var arr=(typeof arr!="object")? [arr] : arr;
        function imageloadpost(){
            loadedimages++;
           
            if (loadedimages<=arr.length){
               fnLoad(loadedimages,arr.length);
                if (loadedimages==arr.length){

                    fnStart();

                }
            }
        }
        for (var i=0; i<arr.length; i++){
            newimages[i]=new Image();
            newimages[i].src=arr[i];
            newimages[i].onload=function(){
                imageloadpost();
            }
            newimages[i].onerror=function(){
                imageloadpost();
            }
        }
    }

    //touch
	var musicBol = true;	
	var index = 1;
	var height = document.documentElement.clientHeight;
    var touchBol = false;  

    function fnStart(){
        $('.loading_wrap').remove();              
        touchMove();
        $('.swiper_wrap>div:last-child').insertBefore($('.swiper_wrap>div:first-child'));
		$('.swiper_wrap').css('-webkit-transform','translate3d(0,-'+height+'px,0)');
		$('.swiper_page').eq(1).addClass('swiper_visited');
        $('#mp').get(0).play();
    }

	

	document.addEventListener && document.addEventListener("touchmove", function(a) {
        a.preventDefault()
    });	

	function touchMove(){
		$(document).on('touchstart',function(e){

			if(touchBol){
				return
			}
			if(musicBol){
				$('#mp').get(0).play();
			}

			touchBol = true;
			
			var y=e.touches[0].clientY;
			var disY;

			$(document).on('touchmove',function(e){

				disY = e.touches[0].clientY - y;
				$('.swiper_wrap').css('-webkit-transform','translate3d(0,-'+(height - disY)+'px,0)');
			})

			$(document).on('touchend',function(){
				$('.swiper_wrap').css({'-webkit-transition':'all .6s'});

				if(disY>40){
					index--;
				}else if(disY<-40){
					index++;
				}
				$('.swiper_wrap').css({'-webkit-transform':'translate3d(0,-'+index*height+'px,0)'});
				$('.swiper_page').eq(index).addClass('swiper_visited');
				$(document).unbind('touchstart touchmove touchend');
				setTimeout(function(){

					$('.swiper_wrap').css({'-webkit-transition':'all 0s'});
					if(index==0){
						$('.swiper_wrap>div:last-child').insertBefore($('.swiper_wrap>div:first-child'));
						$('.swiper_wrap').css('-webkit-transform','translate3d(0,-'+height+'px,0)');
					}else if(index==2){
						$('.swiper_wrap>div:first-child').appendTo($('.swiper_wrap'));
						$('.swiper_wrap').css('-webkit-transform','translate3d(0,-'+height+'px,0)');
					}

					index=1;
					touchBol = false;

					touchMove();

				},650);
			})
		})
	}

	//music
	$('#music').on('click',function(){
		if(musicBol){
			$('#mp').get(0).pause();
			$('.music').removeClass('music_move').attr('src','images/music_off.png');
			musicBol = false;
		}else{
			$('#mp').get(0).play();
			$('.music').addClass('music_move').attr('src','images/music.png');
			musicBol = true;
		}
	})

	$('.play').on('click',function(){
		window.location.href = 'http://v.qq.com/page/t/6/v/t0148zejq6v.html';
	})

})