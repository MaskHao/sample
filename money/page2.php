<?php 
	$id = @$_GET["id"];
  	
	$openid = @$_GET["openid"];
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>一起数钱吧！</title>
	<link rel="stylesheet" type="text/css" href="css/page2.css"/>
</head>
<body>
	<div id="wrap">
		<input id="idget" type="hidden"  value="<?php echo $id ;?>"/>
		<img id="bg" src="img/2背景.png"/>
		<div id="shuffling">
			<img id="sh1" class="sh" src="img/2标题1.png" alt="" />
		</div>
		<div id="time">
			<span id="money1" class="moneyNumber">0</span>
			<span id="money2" class="moneyNumber">0</span>
			<span id="money3" class="moneyNumber">0</span>
			<span id="timeNumber">10</span>
		</div>
		<div id="money">
			<img id="chaopiao"  src="img/2钞票.png" alt="" />
		</div> 
		<img id="foot" src="img/2背景底.png" alt="" />
		<img id="shou" src="img/2手.png" alt="" />
	</div>
</body>
<script src="jquery-1.12.4.min.js" type="text/javascript" charset="utf-8"></script>
<script src="touch.min.js"></script>
<script type="text/javascript">
    var index = 0 ;
    var shImg = document.getElementById("sh1");
    var images =["img/2标题1.png","img/2标题2.png","img/2标题3.png"];
	setInterval(function(){
		index++;	
		if (index>images.length-1) {
			index = 0;
		}
		shImg.src = images[index];
	},2000);
	$('body').on('touchmove', function (event) {
        event.preventDefault();
    });	
	touch.on('#chaopiao', 'touchstart', function(ev){
		ev.preventDefault();
	});
	var chaopiao =$("#chaopiao");
	var num = 0;	num1=0;num2=0;num3=0;
	var time = 10;
	var flag = 1;
    
	touch.on(chaopiao, 'swipeup', function(ev){
        
        num++;
        num1 =num%10;
        num2 =parseInt(num/10);
        $("#money3").html(num1);
		$("#money2").html(num2);
		if(flag){
			var times = setInterval(function(){
				time--;
				$("#timeNumber").html(time);
				if (time==0) {
					clearInterval(times);
                    var  id=$("#idget").val(); 
                    window.location.href = "score.php?id="+id+"&score="+num;
				}

				console.log(time);
			},1000);	
		}
			var ids =$("#idget").val();
			$("#shou").hide();
			
			var moneyPic = $("<img class='moneymove' src='img/cp2.png'  />");
            $("#money").append(moneyPic);           
            $(".moneymove").animate({
                width:"40%",         
                left:"30%"
            },500,function(){
                $(this).remove();
            });				
		flag = 0;

})

	
</script>
</html>