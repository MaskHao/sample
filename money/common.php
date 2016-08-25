<?php 
//header("Content-type:text/html;charset=utf-8");
	date_default_timezone_set("PRC");
	
	$db = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
	if ($db) {
    mysql_select_db(SAE_MYSQL_DB, $db);
	$sql = "select * from user";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0){
		while($row = mysql_fetch_assoc($result)){
            //		var_dump($row);
		}
	}
}


	
	
	

	
	$appid = "wxe863aac30efe0ab7";
	$appsecret = "8145b4623b097afcdb8183f4edf03257";
	$api =  "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
	
	
function mysql_get_token(){
		$api=$GLOBALS['api']; //引用全局变量
		$sql = "select * from access_token";
		$result = mysql_query($sql);
		if(mysql_num_rows($result)==1){
			$row = mysql_fetch_assoc($result);
			if($row["lasttime"]<time()){
				
				$arr = json_decode(httpGet($api),TRUE);
				$access_token = $arr["access_token"];
				$lasttime = time()+3600;
				$id = $row["id"];
				$sql = "update access_token set access_token = '$access_token',lasttime = '$lasttime' where id='$id'";
				mysql_query($sql);
				if(mysql_affected_rows()==1){
					$access_token = $arr["access_token"];
				}
			}else{
				$access_token = $row["access_token"]; 
			}
			return $access_token;
		}
	}
 mysql_get_token();
	 
	 function httpGet($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 500);
        // 为保证第三方服务器与微信服务器之间数据传输的安全性，所有微信接口采用https方式调用，必须使用下面2行代码打开ssl安全校验。
        // 如果在部署过程中代码在此处验证失败，请到 http://curl.haxx.se/ca/cacert.pem 下载新的证书判别文件。
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
//      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);
        curl_setopt($curl, CURLOPT_URL, $url);
        $res = curl_exec($curl);
        curl_close($curl);
        return $res;
	}
	 
	 
mysql_query("set names utf8"); 
	 
	 
?>