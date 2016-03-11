<?php
    //连接上数据库
    include("/mysqlconn.php");
?>

<?php
     //获得post请求的数据，更新的机票信息
     $ticketid = $_POST['hticketid'];
     $fromcity = $_POST['fromcity'];
	 $tocity = $_POST['tocity'];
	 $fromdate = $_POST['fromdate'];
	 $todate = $_POST['todate'];
	 $fromtime = $_POST['fromtime'];
	 $totime = $_POST['totime'];
	 $fromport = $_POST['fromport'];
	 $toport = $_POST['toport'];
	 $price = $_POST['price'];
	 $tax = $_POST['tax'];
	 $changenum = $_POST['changenum'];
	 $number = $_POST['number'];
	 $ecoclass = $_POST['ecoclass'];
	 $busclass = $_POST['busclass'];
	 $firclass = $_POST['firclass'];
	 $aircompany = $_POST['aircompany'];
	 $isonsale = $_POST['isonsale'];
	 
	 //设置数目为0，表示要删除这次航班
	 if($number == 0){
		 $sql = "DELETE FROM ticket where ticket_id = '$ticketid'";
		 mysql_query($sql, $link);
	 }
	 //机票数不为零，表示用新数据修改旧数据
	 if($ticketid && $fromcity && $tocity && $fromdate && $todate && $fromtime && $totime && $fromport && $toport && $price){
			$sql = "UPDATE ticket SET fromcity = '$fromcity',tocity = '$tocity',fromdate = '$fromdate',todate = '$todate',
			        fromtime = '$fromtime',totime = '$totime',fromport = '$fromport',toport = '$toport',price = '$price',
					tax = 'tax',changenum = '$changenum',number = '$number',ecoclass = '$ecoclass',
					busclass = '$busclass',firclass = '$firclass',aircompany = '$aircompany',isonsale = '$isonsale'
					where ticket_id = '$ticketid'";
			$res = mysql_query($sql,$link); 
			//如果修改成功
			if($res){
				//跳转到操作首页
				header("Location:/oprateticket.html");
			}
			else{
				echo "error";
			}
     }else{
		 echo "error";
	 }
	 mysql_close();
?>