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
        <li  class="active"><a href="<?php echo U('Yuesao/Yuesao/ys_list');?>">月嫂管理</a></li>
        <li><a href="<?php echo U('Yuesao/Yuesao/add');?>" target="_self">添加月嫂</a></li>
    </ul>

    <form class="well form-search" method="post" id="form1">
        关键字：
        <input type="text" name="keyword" style="width: 300px;" value="<?php echo I('request.keyword');?>" placeholder="姓名/电话">
        <input type="button" onclick="find()" class="btn btn-primary" value="搜索" />
        <br><br>
        &nbsp;&nbsp;&nbsp;年龄：
        <input type="text" name="age_start" style="width: 30px;" value="<?php echo I('request.age_start');?>">
        -
        <input type="text" name="age_end" style="width: 30px;" value="<?php echo I('request.age_end');?>">
        &nbsp;&nbsp;&nbsp;星级：
        <input type="text" name="level_start" style="width: 30px;" value="<?php echo I('request.level_start');?>">
        -
        <input type="text" name="level_end" style="width: 30px;" value="<?php echo I('request.level_end');?>">
        &nbsp;&nbsp;&nbsp;照顾宝宝数量：
        <input type="text" name="num_start" style="width: 30px;" value="<?php echo I('request.num_start');?>">
        -
        <input type="text" name="num_end" style="width: 30px;" value="<?php echo I('request.num_end');?>">
        <input type="button" onclick="find()" class="btn btn-primary" value="筛选" />
    </form>


    <form class="js-ajax-form" action="" method="post">
        <table class="table table-hover table-bordered table-list" >
            <thead>
            <tr>
                <th width="15"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
                <th width="50" style="text-align:center">编号</th>
                <th width="100" style="text-align:center">姓名</th>
                <th width="100" style="text-align:center">
                    <a href="<?php echo U('Yuesao/Yuesao/ys_list',array('type'=>'level','sort'=>'desc'));?>">
                        <i class="fa fa-star"></i>
                    </a>&nbsp;&nbsp;&nbsp;
                        星级&nbsp;&nbsp;&nbsp;
                    <a href="<?php echo U('Yuesao/Yuesao/ys_list',array('type'=>'level','sort'=>'asc'));?>">
                        <i class="fa fa-star-o"></i>
                     </a>
                </th>
                <th width="100" style="text-align:center">年纪</th>
                <th width="120" style="text-align:center">
                    <a href="<?php echo U('Yuesao/Yuesao/ys_list',array('type'=>'baby_num','sort'=>'desc'));?>">
                        <i class="fa fa-heart"></i>
                    </a>&nbsp;&nbsp;&nbsp;
                    照顾宝宝数量&nbsp;&nbsp;&nbsp;
                    <a href="<?php echo U('Yuesao/Yuesao/ys_list',array('type'=>'baby_num','sort'=>'asc'));?>">
                        <i class="fa fa-heart-o"></i>
                    </a>
                </th>
                <th width="120" style="text-align:center">价格</th>
                <th width="120" style="text-align:center">电话</th>
                <th width="100" style="text-align:center">审核&nbsp;/&nbsp;&nbsp;置顶&nbsp;&nbsp;/&nbsp;推荐</th>
                <th width="120" style="text-align:center">查看详情</th>
                <th width="120" style="text-align:center">操作</th>

            </tr>
            </thead>

            <tbody class="tbody">
            <?php if(is_array($ys)): foreach($ys as $key=>$vo): ?><tr>
                    <td><input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]" value="<?php echo ($vo["ys_id"]); ?>" title="ID:<?php echo ($vo["ys_id"]); ?>"></td>
                    <th style="text-align:center"><a><?php echo ($vo["ys_id"]); ?></a></th>
                    <td style="text-align:center"><?php echo ($vo["ys_name"]); ?></td>
                    <td style="text-align:center"><?php echo ($vo["level"]); ?></td>
                    <td style="text-align:center"><?php echo ($vo["age"]); ?></td>
                    <td style="text-align:center"><?php echo ($vo["baby_num"]); ?></td>
                    <td style="text-align:center"><?php echo ($vo["price"]); ?></td>
                    <td style="text-align:center"><?php echo ($vo["mobile"]); ?></td>
                    <td style="text-align:center">
                        <?php if(!empty($vo["is_checked"])): ?>&nbsp; &nbsp;<a data-toggle="tooltip" style="color:red" title="已审核" onclick="recommend(<?php echo ($vo["ys_id"]); ?>,5)"><i class="fa fa-check"></i></a>
                            <?php else: ?>
                            &nbsp; &nbsp; <a data-toggle="tooltip" title="待审核" onclick="recommend(<?php echo ($vo["ys_id"]); ?>,4)"><i class="fa fa-close"></i></a><?php endif; ?>
                        &nbsp;&nbsp;&nbsp;
                        <?php if(!empty($vo["is_top"])): ?>&nbsp; &nbsp;<a data-toggle="tooltip" style="color:red" title="已置顶" onclick="recommend(<?php echo ($vo["ys_id"]); ?>,3)"><i class="fa fa-arrow-up"></i></a>
                            <?php else: ?>
                            &nbsp; &nbsp; <a data-toggle="tooltip" title="未置顶" onclick="recommend(<?php echo ($vo["ys_id"]); ?>,2)"><i class="fa fa-arrow-down"></i></a><?php endif; ?>
                        &nbsp;&nbsp;&nbsp;
                        <?php if(!empty($vo["is_recommend"])): ?>&nbsp; &nbsp;<a data-toggle="tooltip" style="color:red" title="已推荐" onclick="recommend(<?php echo ($vo["ys_id"]); ?>,1)"><i class="fa fa-thumbs-up"></i></a>
                            <?php else: ?>
                            &nbsp; &nbsp; <a data-toggle="tooltip" title="未推荐" onclick="recommend(<?php echo ($vo["ys_id"]); ?>,0)"><i class="fa fa-thumbs-down"></i></a><?php endif; ?>
                    </td>
                    <td style="text-align:center">
                        <a href="<?php echo U('Yuesao/Yuesao/detail',array('ys_id'=>$vo['ys_id']));?>">查看月嫂详情</a>

                    </td>
                    <td style="text-align:center">
                        <a href="<?php echo U('Yuesao/Yuesao/edit',array('ys_id'=>$vo['ys_id']));?>">编辑</a>
                        |
                        <a href="<?php echo U('Yuesao/Yuesao/delete',array('ys_id'=>$vo['ys_id']));?>" class="js-ajax-delete"><?php echo L('DELETE');?></a>

                </tr><?php endforeach; endif; ?>
            </tbody>
            <tfoot>
            <tr>
                <th width="15"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
                <th width="50" style="text-align:center">编号</th>
                <th width="100" style="text-align:center">姓名</th>
                <th width="100" style="text-align:center">星级</th>
                <th width="100" style="text-align:center">年纪</th>
                <th width="120" style="text-align:center">照顾宝宝数量</th>
                <th width="120" style="text-align:center">价格</th>
                <th width="120" style="text-align:center">电话</th>
                <th width="100" style="text-align:center">审核&nbsp;/&nbsp;&nbsp;置顶&nbsp;&nbsp;/&nbsp;推荐</th>
                <th width="120" style="text-align:center">查看详情</th>
                <th width="120" style="text-align:center">操作</th>
            </tr>
            </tfoot>
        </table>
        <div class="table-actions">
            <button class="btn btn-danger btn-small js-ajax-submit" type="submit" data-action="<?php echo U('Yuesao/Yuesao/delete');?>" data-subcheck="true" data-msg="你确定删除吗？"><?php echo L('DELETE');?></button>

            <button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('Yuesao/Yuesao/check',array('check'=>1));?>" data-subcheck="true">审核</button>
            <button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('Yuesao/Yuesao/check',array('uncheck'=>1));?>" data-subcheck="true">取消审核</button>
            <button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('Yuesao/Yuesao/top',array('top'=>1));?>" data-subcheck="true">置顶</button>
            <button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('Yuesao/Yuesao/top',array('untop'=>1));?>" data-subcheck="true">取消置顶</button>
            <button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('Yuesao/Yuesao/recommended',array('recommend'=>1));?>" data-subcheck="true">推荐</button>
            <button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('Yuesao/Yuesao/recommended',array('unrecommend'=>1));?>" data-subcheck="true">取消推荐</button>
        </div>
        <div class="pagination"><?php echo ($page); ?></div>
    </form>
</div>
<script src="/public/js/common.js"></script>
<script>
    function recommend(id,status){
        var c ="";
        if(status==0){
            c = "推荐";
        }
        if(status==1){
            c = "取消推荐";
        }
        if(status==2){
            c = "置顶";
        }
        if(status==3){
            c = "取消置顶";
        }
        if(status==4){
            c = "通过";
        }
        if(status==5){
            c = "取消通过";
        }
            layer.open({
                content: "你确定要"+c+"该月嫂吗？",
                icon: 3,
                btn: ['是', '否'],
                yes: function () {
                    $.ajax({
                        type: 'GET', //请求类型
                        url: "<?php echo U('Yuesao/Yuesao/recommend');?>", //提交URL地址
                        dataType: 'json',   //返回格式
                        data: {id: id,status:status}, //数据
                        success: function (data) { //如果成功，执行
                            if (data.status != 0) {   //返回状态不为0时，显示对应的错误
                                layer.open({
                                    content: data.message,
                                    icon: 2,
                                    title: '错误提示',
                                });
                                return;
                            }
                            layer.open({
                                content: data.message,
                                icon: 1,
                                yes: function () {
                                    location.href = "<?php echo U('Yuesao/Yuesao/ys_list');?>";
                                },
                            });
                        },
                        error: function (xhr, status) { //如果失败，执行
                            console.log(xhr);   //在控制台显示错误的原因以及返回值
                            console.log(status);
                        }
                    });
                },
            });
    }

    function find() {
        var form = $('#form1');
        form.action="<?php echo U('Yuesao/Yuesao/ys_list');?>";
        form.submit();
    }

    function ys_sort_level() {

        $('#level').attr('class','fa fa-star-o');

        if ($('#level').attr('class') == 'fa fa-star-o') {
            $('#sort_level').attr('href',"<?php echo U('Yuesao/Yuesao/ys_list',array('type'=>'level','sort'=>'desc'));?>");
            $('#level').attr('class','fa fa-star');
        } else {
            alert(3);
            $('#sort_level').attr('href',"<?php echo U('Yuesao/Yuesao/ys_list',array('type'=>'level','sort'=>'asc'));?>");
            $('#level').attr('class','fa fa-star-o');
        }
    }
</script>
</body>