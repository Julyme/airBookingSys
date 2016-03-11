<?php
    //连接上数据库
    include("/mysqlconn.php");	
?>

<?php
   //获得post请求的账户及加密后的密码
   $acount = $_POST["txtName"];
   $password = md5($_POST["txtPwd"]);
   
   //验证账户密码是否正确
   if ($acount && $password){
	   //根据获取的账户和密码在用户数据表中查询有无该用户
       $sql = "select * from user where acount = '$acount' and password = '$password'";
       $res = mysql_query($sql, $link);
	   $row = mysql_fetch_array($res);
	   //查询到符合条件的用户数
       $rowsnum=mysql_num_rows($res);
	   //如果没有该用户
	   if($rowsnum == 0){
		   echo "erorr";
           exit;
	   }
	   else{
		   //存在该用户，则将该用户信息存入session中，方便更新用户状态
		   session_start();
		   $_SESSION["userid"] = $row["user_id"];
		   $_SESSION["username"] = $row["name"];
		   header("Location:/index.php");
		   exit;
	   } 
   }
   //关闭数据库连接
   mysql_close($link);
?>

