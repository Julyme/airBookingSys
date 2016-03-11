<?php
    include("/server/sortresult.php");
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>排序结果</title>

<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<script type="text/javascript" src="js/check.js"></script>
<link rel="Stylesheet" type="text/css" href="css/loginDialog.css" />
<link rel="stylesheet" type="text/css" href="css/singleresult.css" />
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
			     echo "尊敬的"."<a href='#'><font color='#FF6600'><b>".$_SESSION["username"]."</b></font></a>";
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
    <div style="min-height:550px">
    <!-- 查询框--> 
    <div id="searchDiv" class="#searchDiv">
        <div>
             <img src="pic/searchtitle.png" />
        </div>
        <!-- 查询的实体框-->
        <div id="searchInnerDiv" class="#searchDiv #searchInnerDiv">
            <form action="checkresult.php" method="post">
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
            <!-- 筛选栏以及名称栏-->
          <div id="selectDiv">
                <!-- 根据条件进行筛选-->
                <div>
                 <form action="sortresult_ui.php" method="post">
                 <input type="hidden" name="hfromcity" id="hfromcity" value="<?php echo $fromcity; ?>"  />
                 <input type="hidden" name="htocity" id="htocity" value="<?php echo $tocity; ?>"  />
                 <input type="hidden" name="hfromdate" id="hfromdate" value="<?php echo $fromdate; ?>"  />
                 <input type="hidden" name="htodate" id="htodate" value="<?php echo $todate; ?>"  />
                  <table width="707">
                    <tr>
                      <td width="97"><b>排序/筛选</b></td>
                      <td width="95"><select name="price" id="price" size="1">
                                     <option value="3">价格排序
                                     <option value="1">价格升序
                                     <option value="0">价格降序</td>
                      <td width="111"><select name="fromtime" id="fromtime" size="1">
                                     <option value="3">起飞时间排序
                                     <option value="1">起飞时间升序 
                                     <option value="0">起飞时间降序</td>
                      <td width="104"><select name="totime" id="totime" size="1">
                                     <option value="3">到达时间排序
                                     <option value="1">到达时间升序 
                                     <option value="0">到达时间降序</td>
                      <td width="118"><select name="timelen" id="timelen" size="1">
                                     <option value="3">时长排序
                                     <option value="1">时长升序 
                                     <option value="0">时长降序</td>
                      <td width="67"><select name="level" id="level" size="1">
                                     <option value="3">舱位排序
                                     <option value="0">经济舱 
                                     <option value="1">商务舱
                                     <option value="2">头等舱</td>
                      <td width="69"><input type="submit" value="查询" /></td>
                    </tr>
                   </table>
                  </form>
                </div>
                <!-- -->
                <div id="nameDiv" class="#nameDiv">
                  <table width="708">
                    <tr>
                      <td width="99">航空公司</td>
                      <td width="123">起飞/到达机场</td>
                      <td width="111">起飞/到达时间</td>
                      <td width="56">中转次数</td>
                      <td width="72">舱位等级</td>
                      <td width="97">价格/税费</td>
                      <td width="118">&nbsp;</td>
                    </tr>
                  </table>
              </div>
            </div>
            <?php if($num == 0){
				echo "<div style='margin-top:55px;margin-left:50px'><img src='pic/noresult.png'></div>";
			}?>
            <!-- 这里就是一条条的机票信息，每条都在一个div里面-->
			<?php foreach($arr as $aTicket){    ?>
            <div id="aticket" class="#aticket" style="margin-top:45px">
              <table width="696">
                <tr>
                  <td width="90" rowspan="3"><img src="pic/planecompany.png" /></td>
                  <td width="159">&nbsp;</td>
                  <td width="63"><p>&nbsp;</p></td>
                  <td width="56" height="13">&nbsp;</td>
                  <td width="73">&nbsp;</td>
                  <td width="114">&nbsp;</td>
                  <td width="109" rowspan="3" style="text-align:right">
                  <form action="bookticket.php" method="post">
                  <input type="hidden" value="<?php echo $aTicket['ticket_id']; ?>" name="ticketid"  />
                  <input name="submit" type="image" value="" src="pic/order.png"/>
                  </form>
                  </td>
                </tr>
                <tr>
                  <td><?php echo $aTicket["fromcity"]; echo "&nbsp;"; echo $aTicket["fromport"];  ?></td>
                  <td width="63"><b><?php echo date('H:i',strtotime($aTicket["fromtime"])); ?></b></td>
                  <td width="56" height="14">&nbsp;</td>
                  <td width="73"><?php
				         if($aTicket['ecoclass'] > 0) echo "经济舱";
				       ?></td>
                  <td width="114">价格：<font size="+1" color="#ff0000"><b>￥<?php echo $aTicket["price"]; ?></b></font></td>
                </tr>
                <tr>
                  <td width="159"><img src="pic/updown.png" width="91" height="16" /></td>
                  <td width="63">&nbsp;</td>
                  <td><b><?php echo $aTicket["changenum"]; ?></b></td>
                  <td><?php
				         if($aTicket['busclass'] > 0) echo "商务舱";
				       ?></td>
                  <td width="114">&nbsp;</td>
                </tr>
                <tr>
                  <td width="90">&nbsp;</td>
                  <td width="159"><?php echo $aTicket["tocity"]; echo "&nbsp;"; echo $aTicket["toport"];  ?></td>
                  <td width="63"><b><?php echo date('H:i',strtotime($aTicket["totime"])); ?></b></td>
                  <td>&nbsp;</td>
                  <td><?php
				         if($aTicket['firclass'] > 0) echo "头等舱";
				       ?></td>
                  <td width="114">税费：<font size="+1" color="#ff0000"><b>￥<?php echo $aTicket["tax"]; ?></b></font></td>
                  <td width="109" style="text-align:right">&nbsp;</td>
                </tr>
                <tr>
                  <td height="17">票号 <u><font color="#FF0000"><b><?php echo $aTicket['ticket_id'] ?></b></font></u></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td style="text-align:right"><u>退改签说明</u></td>
                </tr>
              </table>
            </div>	
            <?php } ?>			
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
