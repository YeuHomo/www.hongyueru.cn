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
        <li><a href="<?php echo U('Order/AdminOrder/orderList');?>">所有订单</a></li>
        <li class="active"><a href="<?php echo U('Order/AdminOrder/edit');?>">订单详情</a></li>

    </ul>
    <form class="form-horizontal" method="post" action="<?php echo U('Order/AdminOrder/edit_post');?>">
        <fieldset>
            <div class="control-group">
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
                <hr>
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
                        <th><label class="control-label">月嫂姓名</label></th>
                        <td>
                            <div class="controls">
                                <select name="ys_id">
                                    <?php if(is_array($ys)): $i = 0; $__LIST__ = $ys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ys): $mod = ($i % 2 );++$i; if($ys['ys_name'] == $order['ys_name']): ?><option value="<?php echo ($ys["ys_id"]); ?>" selected><?php echo ($ys["ys_name"]); ?></option>
                                            <?php else: ?>
                                            <option value="<?php echo ($ys["ys_id"]); ?>"><?php echo ($ys["ys_name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th><label class="control-label">用户联系电话</label></th>
                        <td><div class="controls"><?php echo ($order["mobile"]); ?></div></td>
                    </tr>
                    <tr>
                        <th><label class="control-label">预约服务时间</label></th>
                        <td>
                            <div class="controls">
                                <input type="text" name="start_serve" value="<?php echo ($order["start_serve"]); ?>" class="js-date" style="width: 120px;height: 20px" autocomplete="off">
                                -
                                <input type="text" name="end_serve" value="<?php echo ($order["end_serve"]); ?>" class="js-date" style="width: 120px;height: 20px" autocomplete="off">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th><label class="control-label">预约地址</label></th>
                        <td><div class="controls">
                            <textarea name="address" style="width: 98%; height: 50px;"><?php echo ($order["address"]); ?></textarea>
                        </div>
                    </tr>
                    <tr>
                        <th><label class="control-label">附言</label></th>
                        <td><div class="controls">
                            <textarea name="leave_message" style="width: 98%; height: 50px;"><?php echo ($order["leave_message"]); ?></textarea>
                        </div>
                        </td>
                    </tr>
                </table>
                <hr>


                    <input type="submit" class="btn btn-primary" value="确认修改">

            </div>

        </fieldset>
    </form>
</div>
</body>
</html>
<script src="/public/js/common.js"></script>