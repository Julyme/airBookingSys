<?php
    //连接上数据库
    include("/mysqlconn.php");
	
?>

<?php
   //查询特价机票
   $sql = "select * from ticket where isonsale = 1";
   $res = mysql_query($sql, $link);
   //取得特价机票的数目
   $num=mysql_num_rows($res);
   //取得所有特价机票
   $arr = array();
   $i = 0;
   while($row = mysql_fetch_array($res))
    {
       $arr[$i] = $row;
	   $i++;
    }
	//关闭数据库连接
   mysql_close($link);
?>

