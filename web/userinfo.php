<?php 
    include("/server/getuserinfo.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户信息</title>
<link rel="Stylesheet" type="text/css" href="css/userinfo.css" />
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 564px;
	height: 115px;
	z-index: 1;
	left: 589px;
	top: 278px;
}
</style>
</head>

<body>
    <!-- logo头部分 -->
    <div>
        <img src="pic/logo.png" style="margin-left:100px" />
        <img src="pic/header.png" style="margin-left:200px"  />
    </div>
    <!-- 导航栏-->
    <div id="naviDiv" class="#naviDiv">
    </div>
    <div style="margin-left:198px;margin-top:5px">
        <b>用户信息</b>
    </div>
    <!-- 主题内容框-->
<div id="content" class="#content">
        <!-- 顶部颜色框-->
        <div style="height:15px;width:764px;background:RGB(249,178,0);padding-left:196px;padding-top:20px">
        </div>
        <!-- 用户信息区域-->
        <div style="margin-top:15px;padding-left:10px">
          <table width="937" >
            <tr>
              <td width="338">█ 账户：<b><?php echo $info['acount']; ?></b></td>
              <td width="587" infospan="7" style="vertical-align:top">
                  <b><font color="#0033CC" >已订机票:</font></b>
                  <div id="apDiv1">
                      <?php if($num > 0){
                      foreach($tickets as $aticket){ ?>
						<div class="ticketdiv">
                            <div style="background:#F90; height:10px;"> </div>
                            </br>
                            ○ <b>票号<font color="#FF0000"> <?php echo "#".$aticket['ticket_id'];?></font>&nbsp;
							<?php echo $aticket['fromcity']."-->".$aticket['tocity']."&nbsp;"; ?>
                            <?php echo "&nbsp;".$aticket['fromport']."-->".$aticket['toport']; ?>
							<?php echo "&nbsp;".$aticket['fromdate']."(发)" ?>&nbsp;</br></br>
							<?php echo "&nbsp;&nbsp;".date('H:i',strtotime($aticket["fromtime"]))."(发)"; ?>
							<?php echo "&nbsp;&nbsp;&nbsp;"."<font color='#FF0000'>￥".$aticket['price']."</font>";?>
                            <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."中转".$aticket['changenum']."次"; ?>
                            <?php
							      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
							      switch($aticket['level']){
									  case 0: echo "经济舱"; break;
									  case 1: echo "商务舱"; break;
									  case 2: echo "头等舱"; break;
								  }
							?>
                            <form action="/server/disticket.php" method="post">
                            <input type="submit" value="退订" style="margin-left:490px"  />
                            <input type="hidden" value="<?php echo $aticket['order_id'] ?>" name="orderid" />
                            </form></b>
                        </div>  
				   <?php	  }
                   } ?>
                  </div>                  
              </td>
            </tr>
            <tr>
              <td>█ 姓名：<b><?php echo $info['name']; ?></b></td>
            </tr>
            <tr>
              <td>█ 性别：<b><?php if($info['sex'] == 1) {
			                           echo "男";
			                       }else{ echo "女"; 
			                 }?></b>
              </td>
            </tr>
            <tr>
              <td>█ 地址：<b><?php echo $info['address']; ?></b></td>
            </tr>
            <tr>
              <td>█ 电话：<b><?php echo $info['phone']; ?></b></td>
            </tr>
            <tr>
              <td>█ 邮箱：<b><?php echo $info['email']; ?></b></td>
            </tr>
            <tr>
              <td><input type="button" value="修改" class="button" /><input type="submit" value="提交" class="button" /></td>
            </tr>
          </table>
      </div>
    </div>

    <!-- 页面底部-->
    <div id="footer" class="#footer">
        <center>
            <p>关于我们 |网站声明</p>
            <p>版权所有©2008-2015航空部信息技术中心  中国武汉大学计算机学院</p>
            <p>鄂ICP备10009636号</p>
        </center>
    </div>
</body>

</html>
