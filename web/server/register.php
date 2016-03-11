<?php
    //连接上数据库
    include("./mysqlconn.php");	
?>

<?php
   //获得post请求的注册必填信息
   $acount = $_POST["acount"];
   $password = md5($_POST["password"]);
   $name = $_POST["name"];
   $sex = $_POST["sex"];
   $address = $_POST["address"];
   $phone = $_POST["phone"];
   $email = $_POST["email"];
   $idcard = $_POST["idcard"];
   
   //验证并添加数据库
   //判断是否接收到足够数据
   if ($acount && $password && $name && $sex && $address && $phone && $email && $idcard){
	   //检查同名账户是否存在
	   $sql = "select * from user where acount = '$acount'";
	   $res = mysql_query($sql, $link);
	   $row = mysql_fetch_array($res);
	   //根据注册账号查询的结果
       $rowsnum=mysql_num_rows($res);
	   if($rowsnum > 0){
		    echo "同名账号已存在";   
	   }
	   //不存在同名用户
	   else{
		 //在用户数据表中插入新注册用户信息
		 $sql = "INSERT INTO user (acount,password,name,sex,address,phone,email,idcard,iscontact) VALUES 
	          ('$acount', '$password' ,'$name','$sex','$address','$phone','$email','$idcard',0)";
         $res = mysql_query($sql,$link);
		 //如果插入新用户成功
		 if($res){
			  //取得刚刚插入的用户id
			  $sql = "select max(user_id) from user";
			  $res = mysql_query($sql, $link);
			  $ids = mysql_fetch_array($res);
			  $id = $ids[0];
			  //将用户id存入session中以便更新用户状态
	          session_start();
		      $_SESSION["userid"] = $id;
		      $_SESSION["username"] = $name;
		      header("Location:../index.php");
	     }  
	   }
   }
   else{
	   echo "error";
   }
   mysql_close($link);
?>