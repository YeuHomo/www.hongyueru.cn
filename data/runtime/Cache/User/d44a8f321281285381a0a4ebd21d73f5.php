<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

    <![endif]-->

	<link href="/public/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/public/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/public/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
	<script type="text/javascript">
	//全局变量
	var GV = {
	    ROOT: "/",
	    WEB_ROOT: "/",
	    JS_ROOT: "public/js/",
	    APP:'<?php echo (MODULE_NAME); ?>'/*当前应用名*/
	};
	</script>
    <script src="/public/js/jquery.js"></script>
    <script src="/public/js/wind.js"></script>
    <script src="/public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
    <script src="/public/js/layer/layer.js"></script>
    <script src="/public/js/laydate/laydate.js"></script>
    <script src="/public/js/order/order.js"></script>
    <script>
    	$(function(){
    		$("[data-toggle='tooltip']").tooltip();
    	});
    </script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>


<style type="text/css">
    .pic-list li {
        margin-bottom: 5px;
    }
</style>
<script type="text/html" id="photos-item-wrapper">
    <li id="savedimage{id}">
        <input id="photo-{id}" type="hidden" name="photos_url[]" value="{filepath}">
        <input id="photo-{id}-name" type="text" name="photos_alt[]" value="{name}" style="width: 160px;" title="图片名称">
        <img id="photo-{id}-preview" src="{url}" style="height:36px;width: 36px;" onclick="parent.image_preview_dialog(this.src);">
        <a href="javascript:upload_one_image('图片上传','#photo-{id}');">替换</a>
        <a href="javascript:(function(){$('#savedimage{id}').remove();})();">移除</a>
    </li>
</script>
</head>
<body>
<div class="wrap js-check-wrap">
    <ul class="nav nav-tabs">
        <li class="active"><a href="<?php echo U('AdminPost/index' );?>">用户管理</a></li>
    </ul>
    <form action="<?php echo U('Yuesao/add_post');?>" method="post" class="form-horizontal js-ajax-forms" enctype="multipart/form-data">
        <div class="row-fluid">
            <div class="span9">
                <table class="table table-bordered">
                    <tr>
                        <th><b>头像</b></th>
                        <td>
                            <?php if($user["avatar"] == ''): ?><img src="/admin/themes/simplebootx/Public/assets/images/default-thumbnail.png" width="135" style="cursor: hand" />

                                <?php else: ?>
                                <img src="data/upload/<?php echo ($user["avatar"]); ?>" width="135" style="cursor: hand" /><?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>昵称</th>
                        <td>
                            <?php echo ($user["user_nicename"]); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>邮箱</th>
                        <td>
                            <?php echo ($user["user_email"]); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>性别</th>
                        <td>
                            <?php if($user["sex"] == 1): ?>男
                            <elseif condition="$user.sex eq 2">女
                            <?php else: ?>保密<?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>电话</th>
                        <td>
                            <?php echo ($user["mobile"]); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>QQ</th>
                        <td>
                            <?php echo ($user["qq"]); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>微信</th>
                        <td>
                            <?php echo ($user["wechat"]); ?>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="/public/js/common.js"></script>

</body>
</html>