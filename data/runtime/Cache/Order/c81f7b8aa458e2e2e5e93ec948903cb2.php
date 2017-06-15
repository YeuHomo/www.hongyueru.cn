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


<title>订单详情</title>
</head>
<body>
<div class="wrap">
    <ul class="nav nav-tabs">
        <li class="active"><a href="<?php echo U('Order/AdminOrder/orderList');?>">订单详情</a></li>
    </ul>
    <form class="form-horizontal" method="post" action="<?php echo U('Order/AdminOrder/edit');?>">
        <fieldset>
            <div class="control-group">
                <table>
                    <tr>
                        <th><label class="control-label">订单编号</label></th>
                        <td>
                            <div class="controls"><?php echo ($order["order_id"]); ?></div>
                            <input type="hidden" name="order_id" value="<?php echo ($order["order_id"]); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th><label class="control-label">订单创建时间</label></th>
                        <td><div class="controls"><?php echo ($order["create_at"]); ?></div></td>
                    </tr>
                    <tr>
                        <th><label class="control-label">用户姓名</label></th>
                        <td><div class="controls"><?php echo ($order["user_nicename"]); ?></div></td>
                    </tr>
                    <tr>
                        <th><label class="control-label">用户电话</label></th>
                        <td><div class="controls"><?php echo ($order["mobile"]); ?></div></td>
                    </tr>
                    <tr>
                        <th><label class="control-label">定金</label></th>
                        <td><div class="controls"><?php echo ($order["deposit"]); ?>元</div></td>
                    </tr>
                    <tr>
                        <th><label class="control-label">余款</label></th>
                        <td><div class="controls"><?php echo ($order["balance"]); ?>元</div></td>
                    </tr>
                    <!--<tr>-->
                        <!--<th><label class="control-label">预约时间</label></th>-->
                        <!--<td><div class="controls"><?php echo ($order["order_time"]); ?></div></td>-->
                    <!--</tr>-->
                    <tr>
                        <th><label class="control-label">预约地址</label></th>
                        <td><div class="controls"><?php echo ($order["address"]); ?></div></td>
                    </tr>
                    <tr>
                        <th><label class="control-label">预产期</label></th>
                        <td><div class="controls"><?php echo ($order["start_confinement"]); ?>至<?php echo ($order["end_confinement"]); ?></div></td>
                    </tr>
                    <tr>
                        <th><label class="control-label">预订服务期</label></th>
                        <td><div class="controls"><?php echo ($order["start_serve"]); ?>至<?php echo ($order["end_serve"]); ?></div></td>
                    </tr>
                    <tr>
                        <th><label class="control-label">附言</label></th>
                        <td><div class="controls"><?php echo ($order["leave_message"]); ?></div></td>
                    </tr>
                </table>
                <hr>
                <table>
                    <tr>
                        <th><label class="control-label">
                            订单状况:</label>
                        </th>
                        <th><div class="controls">
                            <?php if($order["order_status"] == 1): ?>待付定金
                                <?php elseif($order["order_status"] == 2): ?>待付余款
                                <?php elseif($order["order_status"] == 3): ?>待评价
                                <?php elseif($order["order_status"] == 4): ?>已完成
                                <?php else: ?> 已关闭<?php endif; ?>

                        </div></th>
                    </tr>
                </table>

                <table>
                    <tr>
                        <th><label class="control-label">月嫂姓名</label></th>
                        <td><div class="controls"><?php echo ($order["ys_name"]); ?></div></td>
                    </tr>
                    <tr>
                        <th><label class="control-label">月嫂年龄</label></th>
                        <td><div class="controls"><?php echo ($order["age"]); ?>岁</div></td>
                    </tr>
                    <tr>
                        <th><label class="control-label">月嫂星级</label></th>
                        <td><div class="controls"><?php echo ($order["level"]); ?>级月嫂</div></td>
                    </tr>
                    <tr>
                        <th><label class="control-label">月嫂价格</label></th>
                        <td><div class="controls"><?php echo ($order["price"]); ?>元/26天</div></td>
                    </tr>
                    <tr>
                        <th><label class="control-label">照顾宝宝</label></th>
                        <td><div class="controls"><?php echo ($order["experience"]); ?>位</div></td>
                    </tr>
                    <tr>
                        <th><label class="control-label">月嫂家乡</label></th>
                        <td><div class="controls"><?php echo ($order["ys_address"]); ?></div></td>
                    </tr>
                    <tr>
                        <th><label class="control-label">月嫂所在地</label></th>
                        <td><div class="controls"><?php echo ($order["ys_home"]); ?></div></td>
                    </tr>

                </table>
                <?php if(($order["order_status"] == 1) OR ($order["order_status"] == 2)): ?><button class="btn btn-primary" type="submit">修改该订单</button><?php endif; ?>
            </div>

        </fieldset>
    </form>

    <?php if($order["order_status"] == 4): if(is_array($comment)): foreach($comment as $key=>$co): ?>订单评论<br>
        <?php echo ($co["avatar"]); ?><br>
        <?php echo ($co["mobile"]); ?><br>
        <?php echo ($co["order_create_at"]); ?><br>
        技能评分：<?php echo ($co["skill_score"]); ?><br>
        态度评分：<?php echo ($co["attitude_score"]); ?><br>
        综合评分：<?php echo ($co["comprehensive score"]); ?><br>
        <?php echo ($co["content"]); ?><br>

            <?php if(is_array($comment['images'])): foreach($comment['images'] as $key=>$vo): $img_url=sp_get_image_preview_url($vo['images']); ?>
                <li id="savedimage<?php echo ($key); ?>">
                    <input id="photo-<?php echo ($key); ?>" type="hidden" name="photos_url[]" value="<?php echo ($img_url); ?>">
                    <input id="photo-<?php echo ($key); ?>-name" type="text" name="photos_alt[]" value="<?php echo ($vo["alt"]); ?>" style="width: 200px;" title="图片名称">
                    <img id="photo-<?php echo ($key); ?>-preview" src="<?php echo sp_get_image_preview_url($vo['url']);?>" style="height:36px;width: 36px;" onclick="parent.image_preview_dialog(this.src);">
                    <a href="javascript:upload_one_image('图片上传','#photo-<?php echo ($key); ?>');">替换</a>
                    <a href="javascript:(function(){ $('#savedimage<?php echo ($key); ?>').remove();})();">移除</a>
                </li><?php endforeach; endif; endforeach; endif; endif; ?>
</div>
</body>
</html>
<script src="/public/js/common.js"></script>