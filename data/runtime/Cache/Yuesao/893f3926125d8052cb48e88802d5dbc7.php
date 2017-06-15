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
        <li><a href="<?php echo U('AdminPost/index' );?>">月嫂管理</a></li>
        <li class="active"><a href="" target="_self">月嫂详情</a></li>
    </ul>
    <form action="<?php echo U('Yuesao/add_post');?>" method="post" class="form-horizontal js-ajax-forms" enctype="multipart/form-data">
        <div class="row-fluid">
            <div class="span9">
                <table class="table table-bordered">
                    <tr>
                        <th>姓名</th>
                        <td>
                            <?php echo ($ys["ys_name"]); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>出生日期</th>
                        <td>
                            <?php echo ($ys["birth"]); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>年纪</th>
                        <td>
                            <?php echo ($ys["age"]); ?>岁
                        </td>
                    </tr>
                    <tr>
                        <th>电话</th>
                        <td>
                            <?php echo ($ys["mobile"]); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>照顾宝宝数量</th>
                        <td>
                            <?php echo ($ys["baby_num"]); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>价格</th>
                        <td>
                            <?php echo ($ys["price"]); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>经验</th>
                        <td>
                            <?php echo ($ys["experience"]); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>证书</th>
                        <td>
                            <?php echo ($ys["certificate"]); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>家乡</th>
                        <td><?php echo ($ys["ys_address"]); ?></td>
                    </tr>
                    <tr>
                        <th>所在地</th>
                        <td><?php echo ($ys["ys_homo"]); ?></td>
                    </tr>
                    <tr>
                        <th>技能</th>
                        <td>
                            <?php echo ($ys["skill"]); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>介绍</th>
                        <td>
                            <?php echo ($ys["introduce"]); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>特点</th>
                        <td>
                            <?php echo ($ys["features"]); ?>
                        </td>
                    </tr>

                    <tr>
                        <th>相册图集</th>
                        <td>
                            <?php if(is_array($ys_img)): foreach($ys_img as $key=>$vo): ?><img src="data/upload/<?php echo ($vo["images"]); ?>"><?php endforeach; endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="span3">
                <table class="table table-bordered">
                    <tr>
                        <th><b>头像</b></th>
                    </tr>
                    <tr>
                        <td>
                            <?php if($ys["ys_avatar"] == ''): ?><img src="/admin/themes/simplebootx/Public/assets/images/default-thumbnail.png" width="135" style="cursor: hand" />

                            <?php else: ?>
                                <img src="data/upload/<?php echo ($ys["avatar"]); ?>" width="135" style="cursor: hand" /><?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="/public/js/common.js"></script>

<script type="text/javascript" src="/public/js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/public/js/ueditor/ueditor.all.min.js"></script>
</body>
</html>