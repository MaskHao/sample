<?php 
    include_once "common.php";
	foreach ($_POST as $key => $value) {
		$$key = $value;
	}
	//用户进入得到用户的openid和用户头像地址imgurl(打开就会进来)
	 if($openid!=""&&$imgurl!=""&&$name!=""&&$phoneNumber!=""){
		 	//不存在该用户的信息。插入数据库user
		 	$sql = "insert into user(openid,imgurl,name,phoneNumber) values('$openid','$imgurl','$name','$phoneNumber')";
			$result = mysql_query($sql);
			if(mysql_affected_rows()>0){
				$id= mysql_insert_id();//获取用户注册成功id
			 	setcookie("id",$id);
				echo '{"name":"'.$name.'","id":"'.$id.'"}';
			}else{
				echo '{"name":"没有插入成功"}';
			}
		 }else{
		 	echo '{"name":"信息不完整"}';
		 }
?>




   

