<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<link href="/themes/simplebootx/Public/assets2/css/lib/mdl/material.min.css" rel="stylesheet"/>
	<script src="/themes/simplebootx/Public/assets2/js/lib/mdl/material.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
	<link href="/themes/simplebootx/Public/assets2/css/site/header.css" rel="stylesheet"/>
	<link href="/themes/simplebootx/Public/assets2/css/site/footer.css" rel="stylesheet"/>
	<link href="/themes/simplebootx/Public/assets2/css/site/user/profile.css" rel="stylesheet"/>
	<link href="/themes/simplebootx/Public/assets2/css/site/common/base.css" rel="stylesheet"/>
	<script src="/themes/simplebootx/Public/assets2/js/lib/jquery/jquery-2.1.3.min.js">   </script>
	<script src="/themes/simplebootx/Public/assets2/js/site/profile.js"></script>
	<title>个人信息</title>
</head>
<body>
<div class="topmost">
	<div class="topmost__row"><span class="topmost__left">欢迎来到世纪母婴！</span>
		<div class="topmost__right"><span class="topmost__text">欢迎，我的琪琪</span><a class="topmost__link" href=""><span class="topmost__text">个人中心</span></a><a class="topmost__link" href=""><span class="topmost__text">退出登录</span></a></div>
	</div>
</div>
<header class="g-header">
	<div class="g-header__row"><img class="g-header__logo" src="/themes/simplebootx/Public/assets2/img/header/logo-long.png" alt=""/>
		<nav class="g-nav"><a class="g-nav__link g-nav__link--active" href=""><span class="g-nav__text">首页</span></a><a class="g-nav__link" href=""><span class="g-nav__text">月嫂展示&预约</span></a><a class="g-nav__link" href=""><span class="g-nav__text">智能匹配月嫂</span></a><a class="g-nav__link" href=""><span class="g-nav__text">关于我们</span></a><a class="g-nav__link" href=""><span class="g-nav__text">联系我们</span></a></nav>
	</div>
</header>
<div class="main">
	<div class="container">
		<div class="breadcrumb"><a class="breadcrumb__link" href="">首页</a><span class="breadcrumb__seperator">&gt;</span><a class="breadcrumb__link" href="">个人中心</a><span class="breadcrumb__seperator">&gt;</span><a class="breadcrumb__link" href="">个人信息</a></div>
		<div class="pannel-container">
			<aside class="row-1">
				<div class="stupid pannel">
					<a href="<?php echo U('user/Center/index');?>">
						<img class="stupid__avatar" src="data/upload/<?php echo ($_SESSION['user']["avatar"]); ?>" alt="" /></a>
					<h5 class="stupid__nickname">我的<?php echo ($_SESSION['user']["user_nicename"]); ?><span class="stupid__vip-grade">V<sub>0</sub></span></h5>
				</div>
				<ul class="menu-list pannel">
					<li class="menu"><a class="menu__link" href="<?php echo U('Order/MemberOrder/allOrder',array('type'=>0));?>">我的订单</a></li>
					<li class="menu"><a class="menu__link" href="<?php echo U('Order/MemberMark/my_mark');?>">我的收藏</a></li>
					<li class="menu"><a class="menu__link" href="<?php echo U('Order/MemberMark/footprint');?>">浏览历史</a></li>
				</ul>
			</aside>
			<div class="row-2">
				<div class="edit-profile pannel">
					<h4 class="edit-profile__title">编辑个人信息</h4>
					<form class="profile-form" id="form1" action="" method="POST">
						<div class="profile-form__row profile-form__row--high">
							<label class="profile-form__lbl">当前头像：</label>
							<div class="uploader"><img class="uploader__preview" src="/themes/simplebootx/Public/assets2/img/user/cat.png" alt=""/>
								<input id="fileElem" type="file" accept="image/*" style="display:none;" onchange="handleFiles(this.files)"/><a class="uploader__upload" id="fileSelect" href="javascript:;">上传头像</a>
							</div>
						</div>
						<div class="profile-form__row">
							<label class="profile-form__lbl">昵称：</label>
							<input class="profile-form__input" value="<?php echo ($user_nicename); ?>" name="user_nicename"/>
						</div>
						<div class="profile-form__row">
							<label class="profile-form__lbl">性别：</label>
							<div class="profile-form__radio-wrap">

								<?php if($sex == 1): ?><input class="profile-form__radio" type="radio" value="1" name="sex" id="male" checked/>
									<?php else: ?>
									<input class="profile-form__radio" type="radio" value="1" name="sex" id="male"/><?php endif; ?>
								<label class="profile-form__radio-lbl" for="male">男</label>

								<?php if($sex == 2): ?><input class="profile-form__radio" type="radio" value="2" name="sex" id="female" checked/>
									<?php else: ?>
									<input class="profile-form__radio" value="2" type="radio" name="sex" id="female"/><?php endif; ?>
								<label class="profile-form__radio-lbl" for="female" style="margin-left:3em;">女</label>
							</div>
						</div>
						<div class="profile-form__row">
							<label class="profile-form__lbl">QQ：</label>
							<input class="profile-form__input" type="text" value="<?php echo ($qq); ?>" name="qq"/>
						</div>
						<div class="profile-form__row">
							<label class="profile-form__lbl">微信：</label>
							<input class="profile-form__input" type="text" value="<?php echo ($wechat); ?>" name="wechat"/>
						</div>
						<div class="profile-form__row">
							<label class="profile-form__lbl">手机：</label>
							<input class="profile-form__input" type="text" value="<?php echo ($mobile); ?>" name="mobile"/>
						</div>
						<div class="profile-form__row">
							<label class="profile-form__lbl">新密码：</label>
							<input class="profile-form__input" type="password" id="pass" name="user_pass"/>
						</div>
						<div class="profile-form__row">
							<label class="profile-form__lbl">确认密码：</label>
							<input class="profile-form__input" type="password" id="check_pass"/>
						</div>
						<div class="error-msg">
							<p class="error-msg__text" id='msg' style="display:none">两次密码输入不一致</p>
						</div>
						<input class="profile-form__submit" type="button" onclick="save()" value="保存"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo hook('footer');?>
<footer class="g-footer">
    <div class="g-footer__wrap">
        <div class="g-footer__a">
            <p class="g-footer__text">公司地址：杭州市拱墅区祥园路88号智慧信息产业园M座10楼</p>
            <hr style="margin: 10px 0;"/>
            <p class="g-footer__text">联系电话：0571-56624893　　　版权所有：XXX</p>
        </div>
        <div class="g-footer__b">
            <img class="g-footer__logo" src="/themes/simplebootx/Public/assets2/img/footer/logo-copy.png" alt=""/></div>
        <div class="g-footer__c">
            <hr style="margin-top:4px;"/>
            <p class="g-footer__slogan">“以敬天之心事人，以求道之心做事”</p>
        </div>
    </div>
</footer>

<script>

	function save() {
	    var pass = $('#pass').val();
	    var check_pass = $('#check_pass').val();

	    if(pass != check_pass){
	        $('#msg').removeAttr('style');
			return;
		}

        document.getElementById('form1').action="index.php?g=user&m=Center&a=changInfo";
        $('#form1').submit();
    }

</script>

</body>
</html>