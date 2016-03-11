<?php
    include("/server/indexticket.php");
	session_start();	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>机票查询</title>

<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<script type="text/javascript" src="js/check.js"></script>
<link rel="Stylesheet" type="text/css" href="css/loginDialog.css" />
<link rel="stylesheet" type="text/css" href="css/check.css" />
</head>

<body>
    <!-- logo头部分 -->
    <div>
        <img src="pic/logo.png" style="margin-left:100px"/> 
        <img src="pic/header.png" style="margin-left:200px"  />
    </div>
    <!-- 登录栏-->
    <div align="right" style="font-size:13px; padding-right:10px">
        <?php
		    if(isset($_SESSION["userid"]) ){
			     echo "尊敬的"."<a href='userinfo.php'><font color='#FF6600'><b>".$_SESSION["username"]."</b></font></a>";
				 echo "<font color='#000000'>".",你好！"."</font>";
			}
			else{
				echo "尊敬的用户，点此 <a href='#'><font color='#FF6600' id='example'><b>登录"."</b></font></a>
                     <a href='/register.html'><font color='#FF660'><b>注册</b></font></a>";
			}
		?>
    </div>
    <!-- 登陆框-->
    <div id="LoginBox">
        <form action="/server/login.php" method="post">
        <div class="row1">
            用户登录<a href="javascript:void(0)" title="关闭窗口" class="close_btn" id="closeBtn">×</a>
        </div>
        <div class="row">
            用户名: <span class="inputBox">
                <input type="text" id="txtName" name="txtName" placeholder="账号/邮箱" />
            </span><a href="javascript:void(0)" title="提示" class="warning" id="warn">*</a>
        </div>
        <div class="row">
            密&nbsp;&nbsp;&nbsp;&nbsp;码: <span class="inputBox">
                <input type="password" id="txtPwd" name="txtPwd" placeholder="密码" />
            </span><a href="javascript:void(0)" title="提示" class="warning" id="warn2">*</a>
        </div>
        <div class="row">
            <input type="submit" id="loginbtn" value="登录" />
        </div>
        </form>
    </div>
    <!-- 导航栏-->
    <div id="naviDiv" class="#naviDiv">
    </div>
    <!-- 导航栏下面的灰色块 -->
    <div id="belowNaviDiv" style="height:35px;width:794px;margin-left:177px;background:url(pic/belownavi.png);padding-left:196px;padding-top:10px">
         <b>国内机票|国际机票|特价机票</b>
    </div>
    <!-- 主体内容框-->
    <div style="min-height:500px">
    <!-- 查询框--> 
    <div id="searchDiv" class="#searchDiv">
        <div>
             <img src="pic/searchtitle.png" />
        </div>
        <!-- 查询的实体框-->
        <div id="searchInnerDiv" class="#searchDiv #searchInnerDiv">
            <form action="checkresult.php" method="post" onsubmit="return validate_form(this);">
            <p>出发城市： <input type="text" name="fromcity" id="fromcity"  size="15" /> <font color="#FF0000">*</font></p>
            <p>到达城市： <input type="text" name="tocity" id="tocity" size="15"  /> <font color="#FF0000">*</font></p>
            <p>出发日期： <input type="date" name="fromdate" id="fromdate" value="yyyy/mm/dd"  /> <font color="#FF0000">*</font></p>
            <p>到达日期： <input type="date" name="todate" id="todate" value="yyyy/mm/dd"  /></p>
            <center><input name="submit" type="image" value="" src="pic/searchbutton.png" /></center>
            </form>
            <hr />
            <center><i>预订热线：10086-10086</i></center>
        </div>
    </div>  <!-- 搜索框结束-->
        <!-- 结果框-->
        <div id="result" class="#result">
            <!-- 结果标题框-->
            <div id="resultTitle" class="#resultTitle">
                <b>精选特价机票</b>
            </div>
            <table width="705" class="name">
              <tr>
                <td width="114">出发地/到达地</td>
                <td width="114">中转次数</td>
                <td width="114">价格</td>
                <td width="114">出发日期</td>
                <td width="114">航空公司</td>
                <td width="110">预定</td>
              </tr>
            </table>
<table>
      <?php if($num > 0){ ?>
	    <?php foreach($arr as $oneData){ ?> 
		<tr>
                <form action="bookticket.php" method="post">
			        <td><?php echo $oneData["fromcity"]."-->".$oneData["tocity"]; ?></td> 
                    <td>中转<?php echo $oneData["changenum"]; ?>次</td>
					<td><font color="#FF6600"><b>￥<?php echo $oneData["price"]; ?></b></font></td>
					<td><?php echo $oneData["fromdate"]; ?></td>
                    <td><img src="pic/plane.png" /><?php echo $oneData["aircompany"]; ?> </td>
                    <input type="hidden" value="<?php echo $oneData["ticket_id"]; ?>" name="ticketid" />
                    <td><input type="submit" value="预订" /></td>
                </form>
	  </tr>
				<?php } } ?>
              
          </table>				
        </div>
    </div>  <!-- 主体内容框结束-->
    <!-- 注意事项框-->
    <div id="noticeDiv">
        <div id="noticeTitle" class="#noticeTitle"><b>注意事项</b></div>
        <div id="noticeContent" class="#noticeContent">
        在本网站预订国际机票您可以完全放心，本网是中航信认证机构，获得中国航空运输协会资格认证，支付成功100%出票，7*24小时服务； 
为您提供各大航空公司的国际机票查询、国际机票预订服务及未来一个月的国际机票价格走势信息，更有各大热门城市的国际特价机票信息供您参考，出票无忧。 
通过本网站机票查询，您可以轻松对比热门城市30天国际特价机票价格，获得打折国际机票信息及订票攻略信息，轻松把握国际特价机票价格及出行情况。有着很多变化。
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
