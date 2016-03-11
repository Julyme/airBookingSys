<?php
    //连接上数据库
    include("/mysqlconn.php");
?>

<?php
     //获得post请求发送的数据
	 //取得添加计票时所需要的17项信息
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
	 
	 //插入机票数据到数据库
	 
	 //检验某些接收到的参数是否为空，若为空出错。某些参数不检验，因为其数值有正常可能为假值
	 if($fromcity && $tocity && $fromdate && $todate && $fromtime && $totime && $fromport && $toport && $price && $tax &&$number){
			//插入机票的语句 
			$sql = "INSERT INTO ticket (fromcity,tocity,fromdate,todate,fromtime,totime,fromport,toport,price,tax,
			          changenum,number,ecoclass,busclass,firclass,aircompany,isonsale) VALUES 
       	          ('$fromcity','$tocity','$fromdate','$todate','$fromtime','$totime','$fromport','$toport','$price','$tax',
	               '$changenum','$number','$ecoclass','$busclass','$firclass','$aircompany','$isonsale')"; 
		    //执行插入语句
			mysql_query($sql,$link);
			//重新跳转到添加机票页面
			header("Location:/oprateticket.html"); 
	}else{
		echo "error";
	}
	//关闭数据库连接
	mysql_close();
?>