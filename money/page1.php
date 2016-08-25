<?php 
header("Content-type:text/html;charset=utf-8");
//date_default_timezone_set("PRC");
//	mysql_query("set names utf8");
	$name = "";
	if(isset($_COOKIE["name"])){
		$name = $_COOKIE["name"];
        //用户昵称
        //echo $name = $_COOKIE["name"];
	}
	if(isset($_COOKIE["id"])){
	  $id = $_COOKIE["id"];
        //用户id
        //echo $id = $_COOKIE["id"];
	}
	include_once"common.php"; 

	if(isset($_GET["code"])){
//通过code获取网页授权access_token;
		$code =  $_GET["code"]; 
        // echo $_GET["code"];
		$appid = "wxe863aac30efe0ab7";
		$appsecret = "8145b4623b097afcdb8183f4edf03257";
		$api = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$appsecret&code=$code&grant_type=authorization_code";			
		$json = httpGet($api);
		$obj = json_decode($json,TRUE);
      	
		$access_token = $obj["access_token"];
        //获取的access_token
        //echo "access_token:".$access_token;

//获取用户信息
		$openid = $obj["openid"];
		$api = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
		$user = httpGet($api);
        
        
		$userinfo = json_decode($user,true);    
		$imgurl = $userinfo["headimgurl"];
        //echo "用户头像地址:".$imgurl;
        
        
	}
	
    if(isset($openid)){
        //echo "OPENID".$openid."<br>";
        $openid=$openid;
    }else{
        $openid = "";
    }
    if(isset($imgurl)){
        //echo "IMGURL".$imgurl;
        $imgurl=$imgurl;
        
    }else{
        $imgurl = "";
    }	
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  	<link rel="stylesheet" type="text/css" href="css/page1.css"/>
  <title>一起数钱吧！</title>
  
</head>
<body>
<!--对用户信息隐藏-->	
    
    <div id="box" style="width: 100px; height: 100px;background-color: red;text-align: center;line-height: 100px;border-radius: 50%;margin: auto;margin-top:50%;transform: translateY(-50%);">
		
	</div>
    

	<div id="wrap" style="display: none;">
        
        <div id="hiden">
            <input id="hiden1" type="hidden" name="openid" value="<?php echo $openid;?>" />
            <input id="hiden2" type="hidden" name="headerimgurl" value="<?php echo $imgurl;?>" />
            <input id="hiden3" type="hidden" name="id" value="<?php echo $id;?>" />
		</div>
        
        <img id="bg" src="" data_src="img/1背景.png"/>
		<img id="tiaozhan" src="" data_src="img/挑战.png"/>
		<img id="shuqian" src="" data_src="img/数钱速度.png" alt="" />
		<img id="kaishi" src="" data_src="img/开始挑战按钮.png" style="cursor:pointer"/>
		<img id="shou"src=""  data_src="img/手.png" alt="" /> 
		
		<div id="show">
			<img id="btn1" src="" data_src="img/按钮-数钱榜.png" style="cursor:pointer"/>
			<img id="btn2" src="" data_src="img/按钮-活动规则.png" alt="" style="cursor:pointer"/>
			<img id="btn3" src="" data_src="img/按钮-活动奖品.png" alt="" style="cursor:pointer"/>
			<img id="btn4" src=""  data_src="img/按钮-奖品使用说明.png" alt=""style="cursor:pointer" />
		</div>
		
		
		<div id="shu" class="style" >
			<img id="btn1_style" src=""  data_src="img/数钱榜.png" alt="" />
			<ul id="ul">
<!--填充-->
			</ul>
			<img id="btn1_style_cancel" class="cancelbtn" src="" data_src="img/chacha.png" style="cursor:pointer"/> 
		</div>	
		<div id="rule" class="style">
			<img id="btn2_style" src="" data_src="img/活动规则.png" alt="" />
			<img id="btn2_style_cancel" class="cancelbtn" src="" data_src="img/chacha.png" style="cursor:pointer"/> 
		</div>
		<div id="prize" class="style">
			<img id="btn3_style" src="" data_src="img/活动奖品.png" alt="" />
			<img id="btn3_style_cancel" class="cancelbtn" src="" data_src="img/chacha.png" style="cursor:pointer"/> 
		</div>
		<div id="lottery" class="style">
			<img id="btn4_style" src="" data_src="img/奖券使用说明.png" alt="" />
			<img id="btn4_style_cancel" class="cancelbtn" src=""  data_src="img/chacha.png" style="cursor:pointer"/>
		</div>
<!--如果第一次登陆要进行注册-->		
		<form id="form" action="" method="post"  style="display: none; ">
			<img id="cha" src="" data_src="img/chacha.png" style="cursor:pointer"/> 
			<input type="text" name="name" id="name" value="" placeholder="姓名"/>
			<input type="text" name="phoneNumber" id="phoneNumber" value="" placeholder="手机号码"/>
			<img id="begin" src="" data_src="img/1-3.png" alt="" style="cursor:pointer"/>
		</form>
	</div>
</body>

<script src="jquery-1.12.4.min.js" type="text/javascript" charset="utf-8"></script>
<script>
   function loadImg(){
		var imgArr = $("img");
		var num = imgArr.length;
		console.log(imgArr.length);
		var i=0;
		for (var i=0;i<imgArr.length;i++) {
			imgArr[i].src = imgArr[i].getAttribute("data_src");
			imgArr[i].setAttribute("data-src","");
			imgArr[i].onload = function(){
				res = parseInt((i/num)*100);
				$("#box").html(res+"%"); 
				if(i==num){
					$("#box").hide();
					$("#wrap").show();
				}
			}
			console.log(i);
		}
		console.log(i);
	}
	loadImg();
    
    
    
    
    
	$("#cha").click(function(){
		$("#form").hide();
	})
    
    
 //页面加载时候判断是否为注册用户
    window.onload = function(){ 
		var openid = $("#hiden1").val();
		console.log("结果:"+openid);
		$.ajax({
			type:"get",
			url:"jianyan.php",
			async:true,
			dataType:"json",
			data:{
				openid:openid,
			},
			
			success:function(data){
				console.log("加载成功");
				console.log(openid);
				if(data.name=="success"){
					console.log("注册过");
					console.log(data.id);
				}
				else if(data.name=="error"){
					console.log("用户没有注册");
					$("#form").show();
				}else if(data.name == "cccc"){
					alert("请关注");
				}
			},
			error:function(data){
				console.log("please find error");
				console.log(data);
			}
		});	
	}
    
    
    
//开始挑战按钮
	$("#kaishi").click(function(){
		var openid = $("#hiden1").val();
		console.log("开始按钮"+"openid="+openid);
		$.ajax({
			type:"get",
			url:"jianyan.php",
			async:true,
			dataType:"json",
			data:{ 
				openid:openid,
			},
			success:function(data){
				console.log(data);
				console.log("已点击按钮");
				if(data.name=="error"){
					$("#form").show();
                   alert("不注册就不给你玩!");
				}else{
				window.location.href = "page2.php?openid="+openid+"&id="+data.id;
				}
			},
			error:function(data){
				console.log("error");
				console.log(data);
			}
		});
	})
    

    
    
//。注册信息提交按钮
	$("#begin").on("click",function(){
		var name = $("#name").val();
		var phoneNumber = $("#phoneNumber").val();
		var openid = $("#hiden1").val();
		var imgurl = $("#hiden2").val();

		$.ajax({
			type:"post",
			url:"login.php",
			async:true,
			dataType:"json",
			data:{ 
				openid:openid,
				imgurl:imgurl,
				name:name,
				phoneNumber:phoneNumber
			},
			success:function(data){
                alert("注册成功");              
				console.log(data.name);  //用户名
				$("#hiden3").val(data.id);
				$("#form").hide();
				alert("ok");
				
			},
			error:function(data){
				console.log("error");
				console.log(data);
			}
		});
	})
    //排行榜出点击动态获取排名	
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
				for (var i=0;i<data.length;i++) {
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
