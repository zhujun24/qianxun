
<?php
error_reporting(0);
include_once "php/function.php";
if(!isset($_SESSION)){ session_start();};
if(empty($_SESSION['uid'])){
    echo_message("请先注册登录后，才可以发布信息！",3);
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>千寻网发布--合肥工业大学失物招领</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <!--<link href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="css/publish.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Head Navbar -->
<?php
include_once "php/header.php";
?>

<!-- Body Main -->
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">发布 (标注*为必填项)</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal col-lg-6" id="publishform" role="form" action="php/publish.php"
                    method="post" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label class="col-lg-4 control-label">物品类型*</label>

                            <div class="col-lg-8">
                                <select name="item" class="form-control">
                                    <option value="卡类证件">卡类证件</option>
                                    <option value="随身物品">随身物品</option>
                                    <option value="书籍文具">书籍文具</option>
                                    <option value="电子数码">电子数码</option>
                                    <option value="衣服饰品">衣服饰品</option>
                                    <option value="其他物品">其他物品</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="good" class="col-lg-4 control-label">物品名称*</label>

                            <div class="col-lg-8">
                                <input name="name" type="text" class="form-control" id="good" placeholder="物品名称">
                                <span class="help-inline">物品名称不能为空</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="place" class="col-lg-4 control-label">捡到&丢失地点*</label>

                            <div class="col-lg-8">
                                <input name="location" 
                                type="text" class="form-control" id="place" placeholder="地点">
                                <span class="help-inline">地点不能为空</span>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="timer" class="col-lg-4 control-label">捡到&丢失时间*</label>

                            <div class="input-group date form_datetime col-lg-8" data-date="2014-01-01T00:00:00Z"
                                 data-date-format="yyyy MM dd - HH:ii p" data-link-field="dtp_input1">
                                <input id="timer" 
                                name="time" 
                                class="form-control" size="16" type="text" value="" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                            </div>
                            <input type="hidden" id="dtp_input1" value="">
                        </div>
                        <div class="form-group">
                            <label for="doc" class="col-lg-4 control-label">物品图片*</label>

                            <div class="col-lg-8">
                                <input type="file" name="uploadfile" id="doc" onchange="javascript:setImagePreview();"
                                       class="form-control filestyle" data-icon="false" data-buttonText="上传图片"
                                       data-buttonName="btn-primary">
                                <span class="help-inline"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textarea" class="col-lg-4 control-label">详情描述*</label>

                            <div class="col-lg-8">
                                <textarea 
                                name="details" 
                                id="textarea" class="form-control" rows="6"
                                          placeholder="详细说明失物招领信息，不超过200字"></textarea>
                                <span id="num" class="help-inline">您还可以输入200字</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="yzm" class="col-lg-4 control-label">验证码</label>

                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="yzm" placeholder="输入验证码" maxlength="4">
                                <span class="help-inline help">验证码输入错误</span>
                            </div>
                            <img id="yzm-img" src="php/code_char.php" title="看不清，点击换一张">
                            <span class="yzm-img-click">点击换一张</span>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">发布信息类别*</label>

                            <div class="col-lg-8">
                                <label class="radio-inline" title="我捡到东西了，希望失主能看到">
                                    <input type="radio" checked name="inlineRadioOptions" id="inlineRadio1"
                                           value="1">招领信息
                                </label>
                                <label class="radio-inline" title="我丢失东西了，希望捡到的好心人能看到">
                                    <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0">失物信息
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-4 col-lg-8">
                                <button id="publish" type="button" class="btn btn-primary btn-block">我要发布</button>
                            </div>
                        </div>
                    </form>
                    <!-- 上传图片在本地预览 -->
                    <div class="col-lg-6" id="localImag">
                        <img class="img-thumbnail" id="preview"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="container-fluid" id="bottom">
    <p>Copyright 2014-? <span><a href="index.php">www.hfutfind.com</a></span> 版权所有 合肥工业大学千寻网</p>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>
<script src="js/bootstrap-datetimepicker.zh-CN.js"></script>
<script src="js/bootstrap-filestyle.min.js"></script>
<script src="js/previewImage.js"></script>
<script src="js/publish.js"></script>
</body>
</html>