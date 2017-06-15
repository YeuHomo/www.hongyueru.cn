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
        <li><a href="<?php echo U('Yuesao/Yuesao/ys_list');?>">月嫂管理</a></li>
        <li class="active"><a href="<?php echo U('Yuesao/Yuesao/add');?>" target="_self">添加月嫂</a></li>
    </ul>
    <form action="<?php echo U('Yuesao/Yuesao/edit_post');?>" method="post" class="form-horizontal js-ajax-forms" enctype="multipart/form-data">
        <div class="row-fluid">
            <div class="span9">
                <table class="table table-bordered">
                    <tr>
                        <th>姓名</th>
                        <td>
                            <input type="hidden" name="ys_id" style="width: 400px" value="<?php echo ($ys["ys_id"]); ?>">
                            <input type="text" name="ys_name" style="width: 400px" value="<?php echo ($ys["ys_name"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>出生日期</th>
                        <td>
                            <input type="text" class="js-date" style="width:400px;" name="birth" value="<?php echo ($ys["birth"]); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <th>电话</th>
                        <td>
                            <input type="text" name="mobile" style="width: 400px" value="<?php echo ($ys["mobile"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>照顾宝宝数量</th>
                        <td>
                            <input type="text" name="baby_num" value="<?php echo ($ys["baby_num"]); ?>" style="width: 400px">
                        </td>
                    </tr>
                    <tr>
                        <th>价格</th>
                        <td>
                            <input type="text" name="price" style="width: 400px" value="<?php echo ($ys["price"]); ?>"> </td>
                    </tr>
                    <tr>
                        <th>经验</th>
                        <td>
                            <input type="text" name="experience" style="width: 400px" value="<?php echo ($ys["experience"]); ?>"> </td>
                    </tr>
                    <tr>
                        <th>证书</th>
                        <td><input type="text" name="certificate" style="width: 400px" value="<?php echo ($ys["certificate"]); ?>"></td>
                    </tr>
                    <tr>
                        <th>家乡</th>
                        <td><input type="text" name="ys_address" style="width: 400px" value="<?php echo ($ys["ys_address"]); ?>"></td>
                    </tr>
                    <tr>
                        <th>技能</th>
                        <td>
                            <textarea name="skill" style="width: 98%; height: 50px;"><?php echo ($ys["skill"]); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>介绍</th>
                        <td>
                            <textarea name="introduce" style="width: 98%; height: 50px;"><?php echo ($ys["introduce"]); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>特点</th>
                        <td>
                            <textarea name="features" style="width: 98%; height: 50px;"><?php echo ($ys["features"]); ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <th>相册图集</th>
                        <td>
                            <ul id="photos" class="pic-list unstyled"></ul>

                            <?php if(is_array($ys_img)): foreach($ys_img as $key=>$img): ?><ul id="saved_image<?php echo ($img["id"]); ?>">
                                    <input id="photo_<?php echo ($img["id"]); ?>" type="hidden" name="photos_url[]" value="<?php echo ($img["images"]); ?>">
                                    <input id="photo_<?php echo ($img["id"]); ?>-name" type="text" name="photos_alt[]" value="<?php echo ($img["images"]); ?>" style="width: 160px;" title="图片名称">
                                    <img id="photo_<?php echo ($img["id"]); ?>-preview" src="data/upload/<?php echo ($img["images"]); ?>" style="height:36px;width: 36px;" onclick="parent.image_preview_dialog(this.src);">
                                    <a href="javascript:upload_one_image('图片上传','#photo_<?php echo ($img["id"]); ?>');">替换</a>
                                    <a href="javascript:(function(){<?php echo ($img["id"]); ?>;$('#saved_image<?php echo ($img["id"]); ?>').remove();})();">移除</a>
                                </ul><?php endforeach; endif; ?>
                            <a href="javascript:upload_multi_image('图片上传','#photos','photos-item-wrapper');" class="btn btn-small">选择图片</a>
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
                            <div style="text-align: center;">
                                <input type="hidden" name="avatar" id="thumb" value="<?php echo ($ys["ys_avatar"]); ?>">
                                <a href="javascript:upload_one_image('图片上传','#thumb');">
                                    <?php if($ys["ys_avatar"] == ''): ?><img src="/admin/themes/simplebootx/Public/assets/images/default-thumbnail.png" id="thumb-preview" width="135" style="cursor: hand" />
                                        <?php else: ?>
                                        <img src="data/upload/<?php echo ($ys["ys_avatar"]); ?>" width="135" id="thumb-preview" style="cursor: hand" /><?php endif; ?>
                                </a>
                                <input type="button" class="btn btn-small" onclick="$('#thumb-preview').attr('src','/admin/themes/simplebootx/Public/assets/images/default-thumbnail.png');$('#thumb').val('');return false;" value="取消图片">
                            </div>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
        <div class="form-actions">
            <button class="btn btn-primary js-ajax-submit" type="submit">提交</button>
        </div>
    </form>
</div>
<script type="text/javascript" src="/public/js/common.js"></script>


</body>
</html>