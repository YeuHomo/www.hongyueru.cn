<?php if (!defined('THINK_PATH')) exit();?>

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
        <li><a href="<?php echo U('User/Indexadmin/index');?>">会员管理</a></li>
        <li class="active"><a href="<?php echo U('User/Indexadmin/listOrder');?>" target="_self">用户订单</a></li>
    </ul>

    <form class="well form-search" method="post" action="<?php echo U('User/Indexadmin/listOrder');?>">
        查询订单日期
        <input type="hidden" name="user_id" value="<?php echo ($user_id); ?>">
        <input type="text" name="start_time" class="js-datetime" style="width: 120px;height: 30px" autocomplete="off">-
        <input type="text" name="end_time" class="js-datetime" style="width: 120px;height: 30px" autocomplete="off">
        <input type="text" name="keyword" style="width: 200px;height: 30px"  placeholder="请输入订单编号">
        <button class="btn btn-primary">搜索</button>
    </form>


    <form class="js-ajax-form" action="" method="post">
        <table class="table table-hover table-bordered table-list">
            <thead>
            <tr>
                <th width="15"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
                <th width="100">订单编号</th>
                <th width="120">创建时间</th>
                <th width="120">月嫂姓名</th>
                <th width="120">订单状态</th>
                <th width="120">订单详情</th>
                <th width="120">操作</th>
            </tr>
            </thead>

            <?php if(is_array($order)): foreach($order as $key=>$vo): ?><tr>
                    <td><input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]" value="<?php echo ($vo["order_id"]); ?>" title="ID:<?php echo ($vo["order_id"]); ?>"></td>
                    <td><a><?php echo ($vo["order_id"]); ?></a></td>
                    <td><?php echo ($vo["create_at"]); ?></td>
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
                <th width="15"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
                <th width="100">订单编号</th>
                <th width="120">创建时间</th>
                <th width="120">月嫂姓名</th>
                <th width="120">订单状态</th>
                <th width="120">订单详情</th>
                <th width="120">操作</th>
            </tr>
            </tfoot>
        </table>
        <div class="table-actions">

            <?php if(!empty($term)): ?><button class="btn btn-primary btn-small js-articles-move" type="button">批量移动</button><?php endif; ?>
            <button class="btn btn-primary btn-small js-articles-copy" type="button">批量复制</button>
            <button class="btn btn-danger btn-small js-ajax-submit" type="submit" data-action="<?php echo U('Order/AdminOrder/delete');?>" data-subcheck="true" data-msg="你确定删除吗？"><?php echo L('DELETE');?></button>
        </div>
        <div class="pagination"><?php echo ($page); ?></div>
    </form>
</div>
<script src="/public/js/common.js"></script>
<script>
    function refersh_window() {
        var refersh_time = getCookie('refersh_time');
        if (refersh_time == 1) {
            window.location = "<?php echo U('Order/AdminOrder/orderList',$formget);?>";
        }
    }
    setInterval(function() {
        refersh_window();
    }, 2000);
    $(function() {
        setCookie("refersh_time", 0);
        Wind.use('ajaxForm', 'artDialog', 'iframeTools', function() {
            //批量复制
            $('.js-articles-copy').click(function(e) {
                var ids=[];
                $("input[name='ids[]']").each(function() {
                    if ($(this).is(':checked')) {
                        ids.push($(this).val());
                    }
                });

                if (ids.length == 0) {
                    art.dialog.through({
                        id : 'error',
                        icon : 'error',
                        content : '您没有勾选信息，无法进行操作！',
                        cancelVal : '关闭',
                        cancel : true
                    });
                    return false;
                }

                ids= ids.join(',');
                art.dialog.open("/index.php?g=portal&m=AdminPost&a=copy&ids="+ ids, {
                    title : "批量复制",
                    width : "300px"
                });
            });
            //批量移动
            $('.js-articles-move').click(function(e) {
                var ids=[];
                $("input[name='ids[]']").each(function() {
                    if ($(this).is(':checked')) {
                        ids.push($(this).val());
                    }
                });

                if (ids.length == 0) {
                    art.dialog.through({
                        id : 'error',
                        icon : 'error',
                        content : '您没有勾选信息，无法进行操作！',
                        cancelVal : '关闭',
                        cancel : true
                    });
                    return false;
                }

                ids= ids.join(',');
                art.dialog.open("/index.php?g=portal&m=AdminPost&a=move&old_term_id=<?php echo ((isset($term["term_id"]) && ($term["term_id"] !== ""))?($term["term_id"]):0); ?>&ids="+ ids, {
                    title : "批量移动",
                    width : "300px"
                });
            });
        });
    });
</script>
</body>