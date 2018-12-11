<html>
<?php

$nomessage = "<font size=4 color=red>请输入短信内容!</font>";           //输入错误时的信息

?>
<head>
    <title>垃圾短信识别</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.qrcode.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <link href="css/demo.css" rel="stylesheet" media="all" />
    <style type="text/css">
        body{
            margin-top: 60px;
            font-size: 14px;
            font-family: "宋体";
        }
        #btn{
            width: 120px;
            font-size: 14px;
            font-family: "宋体";
        }
        #table1{
            width:400px;
        }
    </style>
</head>
<body>

    <div id="switcher">
        <div class="center">
            <ul>
                <div id="Device">
                    <li class="device-monitor"><a href="javascript:"><div class="icon-monitor"></div></a></li>
                    <li class="device-mobile"><a href="javascript:"><div class="icon-tablet"></div></a></li>
                    <li class="device-mobile"><a href="javascript:"><div class="icon-mobile-1"></div></a></li>
                    <li class="device-mobile-2"><a href="javascript:"><div class="icon-mobile-2"></div></a></li>
                    <li class="device-mobile-3"><a href="javascript:"><div class="icon-mobile-3"></div></a></li>
                </div>
                <!-- <li class="top2">
                    <a href="#">扫一扫</a>
                    <div class="vm">
                        <div id="output"></div>
                        <p style="color:#808080;margin:10px 0 0 0;"></p>
                    </div>
                </li> -->
                <li class="logoTop">
                    <a href="#">垃圾短信识别结果</a>            
                    <script type="text/javascript">
                        jQuery('#output').qrcode({width:150,height: 150,text: window.location.href});
                    </script>
                <li class="remove_frame"><a href="#" title="移除框架"></a></li>
            </ul>
        </div>
    </div>

    <div id="container" class="container text-center">
        <div class="row"> 
            <center class="col-md-6 col-md-offset-2">
            <!-- <div id="title" class="page-header">
                <h1>垃圾短信识别</h1>
            </div>   -->
            <?php
            error_reporting(0);  //禁用错误报告
            #var_dump($_POST);
            $array1 = array(1, 0.9774, 0.9947, 0.9378, 0.9886, 0.9808, 0.8372, 0.9359);
            $count1 = 0;
            if($_POST[pmessage]=="") echo $nomessage; 
            else{
                # $output = shell_exec('python2 /Library/WebServer/Documents/Sites/Model/demoAPI.py'.' '.$_POST[pmessage]);
                $output = shell_exec('/usr/bin/python /var/www/html/Sites/Model/demoAPI.py'.' '.$_POST[pmessage]);
                echo"<font color=#246183>各分类器检测结果如下</font> </br></br></br>";
                #返回结果形如：LR:[u'1'],RF:[u'1']
                $array = explode(',', $output);
                echo"<table class='table table-striped' id='table1' style='width:80%;'>";
                for ($i=0;$i<count($array)-1;$i++) {
                    $result = explode(':', $array[$i]);
                    echo"<tr><td class='text-right'><font>$result[0]</font></td>
                             <td>$result[1]</td></tr>";
                    if($result[i] == "True(垃圾短信)")
                        $count1 = $count1+$array1[i];
                }
                echo "<tr>";
                    echo "<td class='text-right'>本系统boosting各种分类器的判定结果</td>";
                    if($count1 > 3.8262)
                        echo "<td style='color:#246183;'>垃圾短信</td>";
                    else
                        echo "<td style='color:#246183;'>非垃圾短信</td>";
                echo "</tr>";
                echo"</table>";
            }
            
            ?>

            </center>
            <div class="col-md-4" style="margin-top: 45px;">
                <ul class="list-group">
                    <li class="list-group-item">KNN：K近邻算法</li>
                    <li class="list-group-item">LR: 逻辑回归</li>
                    <li class="list-group-item">RF: 随机森林</li>
                    <li class="list-group-item">DT: 决策树</li>
                    <li class="list-group-item">GBDT: 梯度提升决策树</li>
                    <li class="list-group-item">MultinomialNB: 多项式分布朴素贝叶斯</li>
                    <li class="list-group-item">BernoulliNB: 伯努利分布朴素贝叶斯</li>
                </ul>
            </div>
        </div>
    </div>
    <center>
        <div id="closewindos">
            <input id="btn" type="button" value="关闭此页" class="btn btn-info btn-lg btn-block" onClick="javascript:window.close()">
        </div>
        <div id="notice">
            显示多种分类器的结果，结果可根据多种分类器的预测准确率或者投票结果产生
            <p align="center">
                技术支持<a style="color: blue;" href="http://fairyfali.github.io">fairy Wang</a>
            </p>
        </div>
    </center>
    <footer class="navbar navbar-default navbar-fixed-bottom" style="margin-top: 100px;height: 54px; width: 100%; background-color: #000; position: fixed; bottom: 0;">
        <div class="container text-right" style="text-align: right; color: #fff; line-height: 44px; font-size: 14px; font-family: 黑体; padding-left: 900px;">
            中国科学院大学 网络数据挖掘课程
        </div>
    </footer>
</body>
</html>
