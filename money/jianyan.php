<?php 
    include_once "common.php";
	foreach ($_GET as $key => $value) {
		$$key = $value;
	}
//	$openid = "b";
//	$imgurl = "bb";
	//用户进入得到用户的openid和用户头像地址imgurl(打开就会进来)
	 if($openid!=""){
		//查询是否存在该用户
	 	$sql = "select * from user where openid='$openid'";
		 $result = mysql_query($sql);
		 //若存在该用户则返回用户的setcookie的id
		 if(mysql_num_rows($result)==1){
		 	
		 	$row = mysql_fetch_assoc($result);//关联数组
			 $id = $row["id"];
//			 echo $id;
		 	setcookie("id",$id);//服务器保存用户的id
		 	echo '{"name":"success","id":"'.$id.'"}';
		 	//返回用户的id   
		 }
		 //不存在则进行注册用户的信息，昵称和号码在注册框中注册
		 else{
		 	echo '{"name":"error"}';
		 }
	 }else{
	 	echo '{"name":"cccc"}';
	 }
	 
	 
	 
	
	
	
	
	
	
?>




   

