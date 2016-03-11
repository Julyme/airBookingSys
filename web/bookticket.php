<?php 
    include("/server/checkbyid.php"); 
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户购票</title>

<link rel="Stylesheet" type="text/css" href="css/register.css" />
<link rel="stylesheet" type="text/css" href="css/singleresult.css" />
<link rel="stylesheet" type="text/css" href="css/bookticket.css" />
</head>

<body>
    <!-- logo头部分 -->
    <div>
        <img src="pic/logo.png" style="margin-left:100px"/> 
        <img src="pic/header.png" style="margin-left:200px"  />
    </div>
    <!-- 导航栏-->
    <div id="naviDiv" class="#naviDiv">
    </div>
    <div style="margin-left:198px;margin-top:5px">
        <b>用户购票</b>
    </div>
    <!-- 主题内容框-->
    <div id="content" class="#content" style="background:#FFF">

        <!-- 机票显示部分-->
        <table width="961" style="background:RGB(249,178,0)">
          <tr>
            <td width="122">航空公司</td>
            <td width="121">出发/到达</td>
            <td width="91">出发/到达时间</td>
            <td width="73">中转次数</td>
            <td width="63">可选舱位</td>
            <td width="98">价格</td>
            <td width="361">&nbsp;</td>
          </tr>
        </table>
    <div id="row" class="#row" >
        <table width="696">
                <tr>
                  <td width="90" rowspan="3"><img src="pic/planecompany.png" /></td>
                  <td width="159">&nbsp;</td>
                  <td width="63"><p>&nbsp;</p></td>
                  <td width="56" height="13">&nbsp;</td>
                  <td width="73">&nbsp;</td>
                  <td width="114">&nbsp;</td>
                  <td width="109" rowspan="3" style="text-align:center">
                  </td>
                </tr>
                <tr>
                  <td><?php echo $row["fromcity"]; echo "&nbsp;"; echo $row["fromport"];  ?></td>
                  <td width="63"><b><?php echo date('H:i',strtotime($row["fromtime"])); ?></b></td>
                  <td width="56" height="14">&nbsp;</td>
                  <td width="73"><?php 
				      if($row['ecoclass'] > 0) echo "经济舱";
				  ?></td>
                  <td width="114">价格：<font size="+1" color="#ff0000"><b>￥<?php echo $row["price"]; ?></b></font></td>
                </tr>
                <tr>
                  <td width="159"><img src="pic/updown.png" width="91" height="16" /></td>
                  <td width="63">&nbsp;</td>
                  <td><b><?php echo $row["changenum"]; ?></b></td>
                  <td><?php 
				      if($row['busclass'] > 0) echo "商务舱";
				  ?></td>
                  <td width="114">&nbsp;</td>
                </tr>
                <tr>
                  <td width="90">&nbsp;</td>
                  <td width="159"><?php echo $row["tocity"]; echo "&nbsp;"; echo $row["toport"];  ?></td>
                  <td width="63"><b><?php echo date('H:i',strtotime($row["totime"]));  ?></b></td>
                  <td>&nbsp;</td>
                  <td><?php 
				      if($row['firclass'] > 0) echo "头等舱";
				  ?></td>
                  <td width="114">税费：<font size="+1" color="#ff0000"><b>￥<?php echo $row["tax"]; ?></b></font></td>
                  <td width="109" style="text-align:right">&nbsp;</td>
                </tr>
                <tr>
                  <td height="17">票号 <u><font color="#FF0000"><b><?php echo $row['ticket_id'] ?></b></font></u></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td style="text-align:center"><u>退改签说明</u></td>
                </tr>
              </table>
            </div>	
            <div id="book" class="#book" >
                <font color="#FF0000" size="-1">请根据票中舱位等级选择你所需舱位</font></br></br></br></br></br>
                <form action="/server/bookticket.php" method="post">
                   选择：<select name="level" id="level" size="1">
                                     <option value="0">经济舱 </option>
                                     <option value="1">商务舱 </option>
                                     <option value="2">头等舱 </option>
                   <input type="hidden" value="<?php echo $row['ticket_id']; ?>" name="ticketid"  />
                   <input type="image" name="submit" src="pic/order.png" style="margin-left:15px;"  />
                 </form>
            </div>
      <!-- 联系人区域-->
        <div>
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
