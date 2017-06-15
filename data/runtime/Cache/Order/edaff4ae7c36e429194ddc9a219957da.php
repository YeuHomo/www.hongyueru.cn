<?php if (!defined('THINK_PATH')) exit();?>
<script src="/public/js/order/orderDel.js"></script>
<!doctype html>
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



</head>
<body>
<div class="wrap js-check-wrap">
    <ul class="nav nav-tabs">
        <li class="active"><a href="<?php echo U('AdminPage/index');?>">查询订单结果</a></li>
    </ul>

    <form class="js-ajax-form" method="post">
        <div class="table-actions">
            <button class="btn btn-danger btn-small js-ajax-submit" type="submit" data-action="<?php echo U('AdminPage/delete');?>" data-subcheck="true" data-msg="<?php echo L('DELETE_CONFIRM_MESSAGE');?>"><?php echo L('DELETE');?></button>
        </div>
        <table class="table table-hover table-bordered table-list">
            <thead>
            <tr>
                <th width="16"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
                <th width="100">订单编号</th>
                <th width="120">创建时间</th>
                <th width="120">顾客姓名</th>
                <th width="120">月嫂姓名</th>
                <th width="120">订单状态</th>
                <th width="120">订单详情</th>
                <th width="120">操作</th>
            </tr>
            </thead>

            <?php if(is_array($find)): foreach($find as $key=>$vo): ?><tr>
                    <td><input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]" value="<?php echo ($vo["id"]); ?>"></td>
                    <td><a><?php echo ($vo["order_id"]); ?></a></td>
                    <td><?php echo ($vo["create_at"]); ?></td>
                    <td><?php echo ($vo["user_nicename"]); ?></td>
                    <td><?php echo ($vo["ys_name"]); ?></td>
                    <td>
                        <?php if($vo["order_status"] == 1): ?>待付定金
                        <?php elseif($vo["order_status"] == 2): ?>待付余款
                        <?php elseif($vo["order_status"] == 3): ?>待评价
                        <?php elseif($vo["order_status"] == 4): ?>已完成
                        <?php else: ?> 已关闭<?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo U('Order/AdminOrder/detail',array('order_id'=>$vo['order_id']));?>">查看订单详情</a>

                    </td>
                    <td><a href="javascript:;" onclick="order.del('<?php echo ($vo["order_id"]); ?>')">删除</a></td>
                </tr><?php endforeach; endif; ?>

            <tfoot>
            <tr>
                <th width="16"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
                <th width="100">订单编号</th>
                <th>创建时间</th>
                <th width="80">顾客姓名</th>
                <th width="120">月嫂姓名</th>
                <th width="120">订单状态</th>
                <th width="120">订单详情</th>
                <th width="120">操作</th>
            </tr>
            </tfoot>
        </table>
        <div class="table-actions">
            <button class="btn btn-danger btn-small js-ajax-submit" type="submit" data-action="<?php echo U('AdminPage/delete');?>" data-subcheck="true" data-msg="你确定删除吗？"><?php echo L('DELETE');?></button>
        </div>
        <div class="pagination"><?php echo ($page); ?></div>
    </form>
</div>
<script src="/public/js/common.js"></script>

</body>
</html>