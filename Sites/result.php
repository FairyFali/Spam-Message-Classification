<html>
<?php

$nomessage = "<font size=4 color=red>请输入短信内容!</font>";           //输入错误时的信息

?>
<head>
    <title>垃圾短信识别</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/bootstrap.min.css">  
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
    <div id="container" class="container text-center">
        <center>
        <div id="title" class="page-header">
            <h1>垃圾短信识别</h1>
        </div>  
        <?php
        error_reporting(0);  //禁用错误报告
        #var_dump($_POST);
        if($_POST[pmessage]=="") echo $nomessage; 
        else{
            # $output = shell_exec('python2 /Library/WebServer/Documents/Sites/Model/demoAPI.py'.' '.$_POST[pmessage]);
            $output = shell_exec('/Users/wangfali/miniconda2/bin/python2 /Library/WebServer/Documents/Sites/Model/demoAPI.py'.' '.$_POST[pmessage]);
            echo"<font color=#246183>各分类器检测结果如下</font> </br></br></br>";
            #返回结果形如：LR:[u'1'],RF:[u'1']
            $array = explode(',', $output);
            echo"<table class='table table-striped' id='table1'>";
            for ($i=0;$i<count($array)-1;$i++) {
                $result = explode(':', $array[$i]);
                echo"<tr><td class='text-right'><font>$result[0]</font></td>
                         <td>$result[1]</td></tr>";
            }
            echo"</table>";
        }
        
        ?>

        <div id="closewindos">
            <input id="btn" type="button" value="关闭此页" class="btn btn-primary btn-lg btn-block" onClick="javascript:window.close()">
        </div>
        <div id="notice">
            支持多种分类器：KNN, LR, RF, DT, GBDT, SVM, MultinomialNB, BernoulliNB
            <p align="center">
                Powered by <a href="http://fairyfali.github.io">fairy Wang</a>
            </p>
        </div>
        </center>
    </div>
</body>
</html>
