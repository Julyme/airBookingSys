<?php
    //连接上数据库
    include("/mysqlconn.php");
	
?>

<?php
   //获得userid,显然此时用户已经登录了
   session_start();
   $userid = $_SESSION['userid'];
   
   //取得用户数据
   if ($userid){
	   //获得用户基本信息
       $sql = "select * from user where user_id = '$userid'";
       $res = mysql_query($sql, $link);
	   $info = mysql_fetch_array($res);
	   
	   //查询用户订票情况
	   
	   //订单数据表与机票数据表自然连接
	   $sql = "SELECT * FROM ticket NATURAL JOIN orders WHERE user_id = '$userid'";
	   $res = mysql_query($sql,$link);
	   //获得用户订单数与详细订单
	   $num = mysql_num_rows($res);
	   $tickets = array();
	   $i = 0;
	   while($row = mysql_fetch_array($res)){
		    $tickets[$i] = $row;
			$i++;   
	   }
   }
   else{
       echo "error";
   } 
   //关闭数据库连接
   mysql_close($link);
?>

