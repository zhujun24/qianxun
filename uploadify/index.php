<html>
<head>
<meta charset='utf-8'>
<title>Uploadify 3.1 Dome  BY璞玉POOY  更多资料请登录：www.pooy.net</title>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="jquery.uploadify-3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="uploadify.css"/>
<script type="text/javascript">
var img_id_upload=new Array();//初始化数组，存储已经上传的图片名
var i=0;//初始化数组下标
$(function() {
    $('#file_upload').uploadify({
    	'auto'     : false,//关闭自动上传
    	'removeTimeout' : 1,//文件队列上传完成1秒后删除
        'swf'      : 'uploadify.swf',
        'uploader' : 'uploadify.php',
        'method'   : 'post',//方法，服务端可以用$_POST数组获取数据
		'buttonText' : '选择图片',//设置按钮文本
        'multi'    : true,//允许同时上传多张图片
        'uploadLimit' : 1,//一次最多只允许上传10张图片
        'fileTypeDesc' : 'Image Files',//只允许上传图像
        'fileTypeExts' : '*.gif; *.jpg; *.png',//限制允许上传的图片后缀
        'fileSizeLimit' : '20000KB',//限制上传的图片不得超过200KB 
        'onUploadSuccess' : function(file, data, response) {//每次成功上传后执行的回调函数，从服务端返回数据到前端
               img_id_upload[i]=data;
               i++;
			   alert(data);
        },
        'onQueueComplete' : function(queueData) {//上传队列全部完成后执行的回调函数
           // if(img_id_upload.length>0)
           // alert('成功上传的文件有：'+encodeURIComponent(img_id_upload));
        }  
        // Put your options here
    });
});
</script>
</head>
<body>
<input type="file" name="file_upload" id="file_upload" />
<!--<p><a href="javascript:$('#file_upload').uploadify('upload','*');">上传</a> -->
<!--动态传值  $('#file_upload').uploadify('settings', 'formData', {'typeCode':document.getElementById('id_file').value}); -->
<p><a href="javascript:$('#file_upload').uploadify('settings', 'formData', {'typeCode':document.getElementById('id_file').value});$('#file_upload').uploadify('upload','*')">上传</a>
<a href="javascript:$('#file_upload').uploadify('cancel','*')">重置上传队列</a>
</p>
<input type="hidden" value="1215154" name="tmpdir" id="id_file">
</body>
</html