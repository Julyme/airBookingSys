<?php
    //连接上数据库
    include("/mysqlconn.php");
?>

<?php
   //获得post请求的出发地，目的地，出发时间，到达时间
   $fromcity = $_POST["fromcity"];
   $tocity = $_POST["tocity"];
   $fromdate = $_POST["fromdate"];
   $todate = $_POST["todate"];
   
   //按指定要求查询机票
   //当出发地，目的地，出发日期存在时
   if ($fromcity && $tocity && $fromdate){

	   //如果存在到达日期
	     if($todate){
		   $sql = "select * from ticket where fromcity = '$fromcity' and tocity = '$tocity' and fromdate = '$fromdate' and todate =                 '$todate'";  
		   $res = mysql_query($sql, $link);
		   $num=mysql_num_rows($res);      //存储取得的票数
		   $arr = array();                 //存储界面要显示的票
		   $i = 0;
		   while($row = mysql_fetch_array($res)){
		       $arr[$i] = $row;
			   $i++;
		   }
	     }
	     //不根据到达日期查询
	     else{
		   $sql = "select * from ticket where fromcity = '$fromcity' and tocity = '$tocity' and fromdate = '$fromdate'";
		   $res = mysql_query($sql, $link);
		   $num=mysql_num_rows($res);      //存储取得的票数
		   $arr = array();                 //存储界面要显示的票
		   $i = 0;
		   while($row = mysql_fetch_array($res)){
		       $arr[$i] = $row;
			   $i++;
		   }
	     }  
   }
   else{
	   echo "error";
   }
   mysql_close($link);
?>

