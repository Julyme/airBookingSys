<?php
    //连接上数据库
    include("/mysqlconn.php");	
?>

<?php
   //获得post请求提交的ticketid
   $ticketid = $_POST["ticketid"];

   //取出查询结果
   if ($ticketid){
	   //执行查询
       $sql = "select * from ticket where ticket_id = '$ticketid'";
       $res = mysql_query($sql, $link);
	   //取出查询结果
	   $row = mysql_fetch_array($res);
	   //取得查询数目
       $num=mysql_num_rows($res);
   }
   else{
	   echo "error";
   }
   //关闭数据库连接
   mysql_close($link);

?>

