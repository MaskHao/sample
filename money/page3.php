<?php 
require_once "jssdk.php";
$jssdk = new JSSDK("wxe863aac30efe0ab7", "8145b4623b097afcdb8183f4edf03257");
$signPackage = $jssdk->GetSignPackage();

	if(isset($_GET["score"])){
          $score = $_GET["score"]; 
	}
    if(isset($_GET["id"])){
        $id = $_GET["id"];
    }
    if(isset($_GET["score1"])){
        $score1 = $_GET["score1"];
    }
if(isset($_GET["num"])){
        $num = $_GET["num"];
    }


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>一起数钱吧！</title>
	<link rel="stylesheet" type="text/css" href="css/page3.css"/>
</head>
<body>
	<div id="wrap">
		<img id="bg" src="img/3背景.png"/>
	<div id="score">
		￥<span><?php echo $score;?></span>
	</div>
	<img class="word" src="img/3文字1.png" alt="" />
	<img class="word" src="img/3文字2.png" alt="" />
	<div id="report">
		<p>我的辉煌战绩:￥<span><?php echo $score1;?></span>
		当前排名:<span><?php echo $num;?></span>位
		</p>
	</div>
	<div id="button">
		<img  class="dianji" src="img/3再来一次.png" alt="" />
		<img  class="dianji" src="img/3土豪.png" alt="" />
	</div>
	
	
	
	
	
	
		<div id="show">
			<img id="btn1" src="img/按钮-数钱榜.png" style="cursor:pointer"/>
			<img id="btn2" src="img/按钮-活动规则.png" alt="" style="cursor:pointer"/>
			<img id="btn3" src="img/按钮-活动奖品.png" alt="" style="cursor:pointer"/>
			<img id="btn4" src="img/按钮-奖品使用说明.png" alt=""style="cursor:pointer" />
		</div>
 <!--数钱榜-->
        <div id="shu" class="style" >
			<img id="btn1_style"  src="img/数钱榜.png" alt="" />
			<ul id="ul">
 <!--数钱榜数据添加处-->				
			</ul>
			<img id="btn1_style_cancel" class="cancelbtn" src="img/chacha.png" style="cursor:pointer"/> 
		</div>
        
		<div id="rule" class="style">
			<img id="btn2_style"  src="img/活动规则.png" alt="" />
			<img id="btn2_style_cancel" class="cancelbtn" src="img/chacha.png" style="cursor:pointer"/> 
			</div>
		<div id="prize" class="style">
			<img id="btn3_style"  src="img/活动奖品.png" alt="" />
			<img id="btn3_style_cancel" class="cancelbtn" src="img/chacha.png" style="cursor:pointer"/> 
		</div>
		<div id="lottery" class="style">
			<img id="btn4_style" src="img/奖券使用说明.png" alt="" />
			<img id="btn4_style_cancel" class="cancelbtn" src="img/chacha.png" style="cursor:pointer"/>
		</div>
		<img id="mengban" src="img/3蒙版.png" alt="" />
	</div>
</body>
<script src="jquery-1.12.4.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
    
 wx.config({
    debug: false,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
      "onMenuShareTimeline"
      
    ]
  });
     wx.ready(function () {
    // 在这里调用 API
       wx.onMenuShareTimeline({
        title: '数钱~~~~', // 分享标题
        link: 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxe863aac30efe0ab7&redirect_uri=http://wanghao1.applinzi.com/money/page1.php&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect', // 分享链接
           imgUrl: 'http://wanghao1.applinzi.com/money/img/picture_02.png', // 分享图标
        success: function () { 
            // 用户确认分享后执行的回调函数
            
        },
        cancel: function () { 
            // 用户取消分享后执行的回调函数
        }
    });          
  });
    
    
   function random(max,min){
			return Math.round(Math.random()*(max-min)+min);
		}
	var num = random(1,0);
	function shows(){
		var word = document.getElementsByClassName("word")[num];
		console.log(num);
		word.style.display = "block";
	}shows();
	 
	
	$("#button img:first-child").on("click",function(){
		window.location.href = "page2.php?id="+"<?php echo $id;?>";
	})
	$("#button img:nth-child(2)").on("click",function(){
		$("#mengban").show();
	})
	
	
//sadadadadsasd	
	 $("#btn1").click(function(){
		$("#shu").show();
		$.ajax({
			type:"get",
			url:"score.php",
			async:true,
			dataType:"json",
			success:function(data){
				console.log("ok");
				console.log(data);
				$("#ul").html("");
				if(data.length<6){
					var count = data.length;
				}else{
					var count = 5;
				}
				for (var i=0;i<count;i++) {
					console.log( data[i].name);
					if(i<3){
						var span = $("<span><span>");
					}else{
						var span = $("<span>"+(i+1)+"</span>")
					}
					var li = $("<li ><span><img style='width: 18%;height: 100%; border-radius: 50%;' src='"+data[i].imgurl+"'/></span><span>"+data[i].name+"</span><span style='float:right ;padding-top:8%;margin-right:10%'>"+data[i].score+"</span></li>");
					li.prepend(span);
					$("#ul").append(li);
				}
				
			},
			error:function(data){
				console.log("ooo");
			}
		});
	})
	$("#btn1_style_cancel").click(function(){
		$("#shu").hide();
	})
	
	
	 $("#btn2").click(function(){
		$("#rule").show();
	})
	$("#btn2_style_cancel").click(function(){
		$("#rule").hide();
	})
   $("#btn3").click(function(){
		$("#prize").show();
	})
	$("#btn3_style_cancel").click(function(){
		$("#prize").hide();
	})
	$("#btn4").click(function(){
		$("#lottery").show();
	})
	$("#btn4_style_cancel").click(function(){
		$("#lottery").hide();
	})
</script>
</html>