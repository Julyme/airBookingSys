<?php
    //连接上数据库
    include("/mysqlconn.php");	
?>

<?php
   //获得post请求提交的舱位等级level以及机票的id

   $ticketid = $_POST['ticketid'];
   $level = $_POST['level'];
   
   //从session中取得用户的id
   session_start();
   $userid = $_SESSION['userid'];
   $username = $_SESSION['username'];
   
   if($ticketid && $userid){   //如果选中了机票而且用户存在时
	   //根据选中的舱位等级消费一张相应机票
	   switch($level){
		   case 0:
		       $sql = "UPDATE ticket SET ecoclass = ecoclass-1,number = number -1 where ticket_id = '$ticketid'";
			   break;
		   case 1:
		       $sql = "UPDATE ticket SET busclass = busclass-1,number = number -1 where ticket_id = '$ticketid'";
			   break;
		   case 2:
		       $sql = "UPDATE ticket SET firclass = firclass-1,number = number -1 where ticket_id = '$ticketid'";
			   break;   
	   }
	   //执行修改数据库机票信息
	   $res = mysql_query($sql,$link);
	   //如果预订机票成功
	   if($res){
	       //增加一份订单数据
	       $sql = "INSERT INTO orders (comsumer_name,user_id,ticket_id,level) VALUES 
	          ('$username','$userid','$ticketid','$level')";
		   $res = mysql_query($sql,$link);
		   //预订机票与增加订单都成功，跳转到用户信息界面
		   if($res){
			   header("Location:/userinfo.php");
		   }
		   else{
			  echo "error";
		   }
	   }
	   else{
		   echo "error";
	   }
   }else{
	   echo "error";
   }
   //关闭数据库连接
   mysql_close($link);
?>

