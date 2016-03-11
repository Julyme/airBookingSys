<?php
    //连接上数据库
    include("/mysqlconn.php");
?>

<?php
    //获取要退订的订单号
    $orderid = $_POST['orderid'];

    //如果获取订单号成功
	if($orderid){
		//取得用户id
		session_start();
		$userid = $_SESSION['userid'];
		//取得退订机票的票号和舱位等级
		$sql = "select ticket_id, level from orders where order_id = '$orderid'";
		$res = mysql_query($sql,$link);
		$row = mysql_fetch_array($res);
		$ticketid = $row['ticket_id'];
		$level = $row['level'];
		//根据舱位等级，将退订的票加回到相应航班票数中
		switch($level){
		   case 0:
		       $sql = "UPDATE ticket SET ecoclass = ecoclass+1,number = number +1 where ticket_id = '$ticketid'";
			   break;
		   case 1:
		       $sql = "UPDATE ticket SET busclass = busclass+1,number = number +1 where ticket_id = '$ticketid'";
			   break;
		   case 2:
		       $sql = "UPDATE ticket SET firclass = firclass+1,number = number +1 where ticket_id = '$ticketid'";
			   break;   
	    }
		mysql_query($sql,$link);
		//删除该份订单
	    $sql = "delete from orders where order_id = '$orderid' and user_id = '$userid'";
		$res = mysql_query($sql,$link);
		//删除成功跳转至用户界面
		if($res){
			header("Location:/userinfo.php");
		}else{
			echo "error";
		}
	}
	else{
		echo "error";
	}
?>