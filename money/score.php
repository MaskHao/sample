<?php 
    include_once 'common.php';
	foreach ($_GET as $key => $value) {
		$$key = $value;
	} 
//获取所有分数的排名
		//用户进入模式
	if(isset($_GET["id"])){
		$sql = "select * from user where id='$id'";
		$result = mysql_query($sql);
		if(mysql_num_rows($result)==1){
			$row = mysql_fetch_assoc($result);
			$score1 = $row["score"];
		//分数与上一次进行比较
			if($score>$score1){
				$sql = "update user set score=$score where id=$id";
				$result = mysql_query($sql);
				if(mysql_affected_rows()>0){
					$sql = "select * from user order by score DESC";
					$result = mysql_query($sql);
					if(mysql_num_rows($result)>0){
						while ($row = mysql_fetch_assoc($result)) {
							$arr[]=$row;//倒序排往数组插分数
						};//关联数组
						$num = 1;
						for ($i=0; $i <count($arr) ; $i++) {
							if($arr[$i]["id"]==$id){
								$num+=$i;
							}
						}
						header("Location:page3.php?id=$id&score=$score&score1=$score&num=$num");
					}
				}
			}
			else{
				$sql = "select * from user order by score DESC";
				$result = mysql_query($sql);
				if(mysql_num_rows($result)>0){
					while ($row = mysql_fetch_assoc($result)) {
						$arr[]=$row;//倒序排往数组插分数
					};//关联数组
					$num = 1;
					for ($i=0; $i <count($arr) ; $i++) {
						if($arr[$i]["id"]==$id){
							$num+=$i;
						}
					}
				header("Location:page3.php?id=$id&score=$score&score1=$score1&num=$num");
				}
			}
		}
	}else{
		$sql = "select * from user order by score DESC";
		$result = mysql_query($sql);
		if(mysql_num_rows($result)>0){
			while ($row = mysql_fetch_assoc($result)) {
				$arr[]=$row;
			};//关联数组
			echo json_encode($arr);
		}
	}
	
?>