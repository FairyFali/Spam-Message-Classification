<html>
<?php

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
            margin: 0 auto;
            width: 120px;
            font-size: 14px;
            font-family: "宋体";
        }
    </style>
</head>
<body>
    <div id="container" class="container text-center">
        <div id="title" class="page-header">
            <h1>垃圾短信识别</h1>
        </div>  
        <form method=post name="cf" target="_blank" onSubmit=javascript:chkfs() class="form-horizontal">
            <textarea  id="u"  class="form-control" rows="5"  name="pmessage"  autocomplete="off" ></textarea>
            <br>
            <div id="cjsubmit"><input id="btn" type=submit value=识别 class="btn btn-primary btn-lg btn-block"></div>
            <script language=javascript>  
                function chkfs(){ 
                    var frm = document.forms['cf'];  
                    frm.action="result.php";
                    return true;  
                }
            </script>
        </form>
        <div id="notice">
            支持多种分类器：KNN, LR, RF, DT, GBDT, SVM, MultinomialNB, BernoulliNB
            <p align="center">
                Powered by <a href="http://fairyfali.github.io">fairy Wang</a>
            </p>
        </div>
    </div>
</body>
</html>
