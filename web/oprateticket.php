<?php 
    include("/server/checkbyid.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员管理机票</title>
<link rel="Stylesheet" type="text/css" href="css/administrator.css" />
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
        <b>修改机票</b>
    </div>
    <!-- 主题内容框-->
    <div id="content" class="#content" style="height:385px">
        <!-- 顶部颜色框-->
        <div style="height:15px;width:764px;background:RGB(249,178,0);padding-left:196px;padding-top:10px">
        </div>
        <!-- 管理及机票区域-->
        <div style="margin-top:15px;padding-left:10px">
          <!-- 修改机票框-->
          <table width="939">
             <!-- 如果没有票的话-->
              <?php if($num == 0){
			       echo "<img src='pic/noresult.png' >";
			  }
			  ?>
              <!-- 如果有票的话-->
              <?php if($num > 0){ ?>
              <tr>
                <td>● 修改机票:</td>
                <form action="oprateticket.php" method="post">
                <td colspan="2">机票号码：
                  <input type="text" value="<?php echo $row['ticket_id'] ?>" name="ticketid" /><input type="submit" value="查询" class="search" /> 
                  <font color="#FF0000" size="-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;根据机票号查询，结果显示在下面表中</font></td>
                  </form>
              </tr>
              <tr>
                <td background="pic/updown2.png">&nbsp;</td>
                <td background="pic/updown2.png">&nbsp;</td>
                <td background="pic/updown2.png">&nbsp;</td>
              </tr>
              <form action="server/updateticket.php" method="post">
              <tr>
                <input type="hidden" value="<?php echo $row['ticket_id'] ?>" name="hticketid" />
                <td width="103">&nbsp;</td>
                <td width="352">地点：<input type="text" name="fromcity" value="<?php echo $row['fromcity'] ?>" /><b>--></b><input type="text" name="tocity" value="<?php echo $row['tocity'] ?>" /></td>
                <td width="462">日期：<input type="date" name="fromdate" value="<?php echo $row['fromdate'] ?>" /><b>--></b><input type="date" name="todate" value="<?php echo $row['todate'] ?>" /> </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>时间：<input type="time" name="fromtime" value="<?php echo $row['fromtime'] ?>" /><b>--></b><input type="time" name="totime" value="<?php echo $row['totime'] ?>" /></td>
                <td>机场：<input type="text" name="fromport" value="<?php echo $row['fromport'] ?>" /><b>--></b><input type="text" name="toport" value="<?php echo $row['toport'] ?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>费用：<input type="text" name="price" value="<?php echo $row['price'] ?>" /><b>---</b><input type="text" name="tax" value="<?php echo $row['tax'] ?>" /></td>
                <td>中转次数：<input type="text" name="changenum" value="<?php echo $row['changenum'] ?>" /> &nbsp;机票数目：<input type="text" name="number" value="<?php echo $row['number'] ?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>经济舱：<input type="text" name="ecoclass" value="<?php echo $row['ecoclass'] ?>" class="number"/> 商务舱：<input type="text" name="busclass" value="<?php echo $row['busclass'] ?>" class="number" /> 头等舱：<input type="text" name="firclass" value="<?php echo $row['firclass'] ?>" class="number" />
                </td>
                <td>航空公司：<input type="text" name="aircompany" value="<?php echo $row['aircompany'] ?>" /> &nbsp;
                    是否特价:<select name="isonsale" size="1">
                            <option value="0" <?php if($row['isonsale'] == 0) echo "selected"; ?>>非特价 
                            <option value="1" <?php if($row['isonsale'] == 0) echo "selected"; ?>>特价票
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><font color="#FF0000" size="-1">注：机票数设为0即为删除</font></td>
                <td style="text-align:right"><input type="submit" class="submit" value="修改"  /></td>
              </tr>
              </form>
              <?php } ?>
          </table>
          </br></br></br>
         
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
