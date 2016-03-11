<?php
    //连接上数据库
    include("/mysqlconn.php");
?>

<?php
    //获得条件查询的四个个基本条件
    $fromcity = $_POST['hfromcity'];
	$tocity = $_POST['htocity'];
	$fromdate = $_POST['hfromdate'];
	$todate = $_POST['htodate'];
	
    //排序筛选时会另外提交的参数
    //按价格，出发时间，到达时间，时长，舱位等级
	 $price = $_POST["price"];
     $fromtime = $_POST["fromtime"];
     $totime = $_POST["totime"];
     $timelen = $_POST["timelen"];
     $level = $_POST["level"];
 
	 //if($price && $fromtime && $totime && $timelen ){	   
		//基本查询，并没有经过排序
	     $sql = "select * from ticket where fromcity = '$fromcity' and tocity = '$tocity' and fromdate = '$fromdate'";
		 //下面开始是排序条件
		 
		 //选取指定舱位的机票
		 switch($level){
		     case 0: $sql = $sql."and ecoclass > 0"; break;
			 case 1: $sql = $sql."and busclass > 0"; break;
			 case 2: $sql = $sql."and firclass > 0"; break;
			 default: break;	 
		 }
		 
		 //存在着其他排序条件
		 if(!($price == 3 && $fromtime == 3 && $totime == 3)){
			 
			 $sql = $sql."order by";
			 //按价格排序
		     switch($price){
			     case 0:$sql = $sql." price desc"; break;
		         case 1:$sql = $sql." price"; break;
			     default: break;
		     }
		     //按出发时间排序
		     switch($fromtime){
			     case 0:$sql = $sql."fromtime desc"; break;
		         case 1:$sql = $sql."fromtime"; break;
			     default:break;
		     }
		     //按到达时间排序
		     switch($totime){
			     case 0:$sql = $sql."totime desc"; break;
		         case 1:$sql = $sql."totime"; break;
			     default: break;
		     }
		    //按时长排序
		 }
		
		 $res = mysql_query($sql, $link);
		 $num=mysql_num_rows($res);      //存储取得的票数
		 $arr = array();                 //存储界面要显示的票
		 $i = 0;
		 while($row = mysql_fetch_array($res)){
		      $arr[$i] = $row;
			  $i++;
		 }
	 //}
	 //else{
		 //echo "error";
	// }
?>