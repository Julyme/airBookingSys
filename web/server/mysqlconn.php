<?php
// 连主库，提供主机，用户名，密码
$link = mysql_connect("localhost","root","");
//如果连接失败
if (!$link){
  die('Could not connect: ' . mysql_error());
  echo "ok";
}
//连接成功
else
{
	//选中数据库booking_sys
    mysql_select_db("booking_sys",$link);
	//数据库操作编码为utf8
	mysql_query("set names utf8");
}
?>