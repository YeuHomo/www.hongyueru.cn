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


</head>
<body>
	<div class="wrap">
		<ul class="nav nav-tabs">
			<li><a href="<?php echo U('nav/index');?>"><?php echo L('ADMIN_NAV_INDEX');?></a></li>
			<li class="active"><a href="<?php echo U('nav/add');?>"><?php echo L('ADMIN_NAV_ADD');?></a></li>
		</ul>
		<form method="post" class="form-horizontal js-ajax-form" action="<?php echo U('nav/add_post');?>">
			<fieldset>
				<div class="control-group">
					<label class="control-label"><?php echo L('NAVIGATION_CATEGORY');?></label>
					<div class="controls">
						<select name="cid" id="navcid_select">
						<?php if(is_array($navcats)): foreach($navcats as $key=>$vo): $navcid_selected=$navcid==$vo['navcid']?"selected":""; ?>
							<option value="<?php echo ($vo["navcid"]); ?>" <?php echo ($navcid_selected); ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo L('PARENT');?></label>
					<div class="controls">
						<select name="parentid">
							<option value="0">/</option>
							<?php echo ($nav_trees); ?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo L('LABEL');?></label>
					<div class="controls">
						<input type="text" name="label" value=""><span class="form-required">*</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo L('HREF');?></label>
					<div class="controls">
						<input type="radio" name="nav" id="outlink_radio">
						<input type="text" name="href" id="outlink_input" value="http://">
						<input type="radio" name="nav" id="selecturl_radio">
						<select name="href" id="selecthref">
							<option value="<?php echo base64_encode('home');?>"><?php echo L('HOME');?></option>
							<?php if(is_array($navs)): foreach($navs as $key=>$vo): ?><optgroup label="<?php echo ($vo["name"]); ?>">
								<?php echo ($vo["html"]); ?>
								</optgroup><?php endforeach; endif; ?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo L('TARGET');?></label>
					<div class="controls">
						<select name="target">
							<option value=""><?php echo L('TARGET_DEFAULT');?></option>
							<option value="_blank"><?php echo L('TARGET_BLANK');?></option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo L('ICON');?></label>
					<div class="controls">
						<input type="text" name="icon" value="">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo L('STATUS');?></label>
					<div class="controls">
						<select name="status">
							<option value="1"><?php echo L('DISPLAY');?></option>
							<option value="0"><?php echo L('HIDDEN');?></option>
						</select>
					</div>
				</div>
			</fieldset>
			<div class="form-actions">
				<button type="submit" class="btn btn-primary js-ajax-submit"><?php echo L('ADD');?></button>
				<a class="btn" href="javascript:history.back(-1);"><?php echo L('BACK');?></a>
			</div>
		</form>
	</div>
	<script src="/public/js/common.js"></script>
	<script>
		$(function() {
			$("#navcid_select").change(function() {
				if(location.search.indexOf("?")>=0){
					location.href = location.href + "&cid=" + $(this).val();
				}else{
					location.href = location.href + "?cid=" + $(this).val();
				}
			});

			$("#selecthref,#selecturl_radio").click(function() {
				$('#outlink_input').removeAttr('name');
				$(this).attr('name','href');
				$('#selecturl_radio').attr({
					'checked' : 'checked'
				});
			});
			$("#outlink_input,#outlink_radio").click(function() {
				$('#selecthref').removeAttr('name');
				$('#outlink_input').attr('name','external_href');
				$('#outlink_radio').attr({
					'checked' : 'checked'
				});
			});
		});
	</script>

</body>
</html>