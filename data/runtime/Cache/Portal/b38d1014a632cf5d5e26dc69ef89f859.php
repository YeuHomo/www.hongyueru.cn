<?php if (!defined('THINK_PATH')) exit();?><!--<!doctype html>-->
<!--<html>-->
<!--<head>-->
	<!--<meta charset="utf-8">-->
	<!--<title>世纪母婴</title>-->
	<!---->


<!--</head>-->

<!--<body>-->
<!--
	<div class="width1200">
		<div class="log_content1">
			<span class="log_content1_left">欢迎来到世纪母婴！</span>
			<div class="log_content1_right">
				<span>欢迎，我和我的猫　|　</span>
				<a>个人中心　|　</a>
				<a>退出登录</a>
			</div>
		</div>
	</div>
-->
<!--<div class="container">-->
	<!--<div class="log_content1">-->
		<!--<div class="col-md-8"> <span class="pull-left log_content1_left">欢迎来到世纪母婴！</span> </div>-->
		<!--<div class="col-md-4">-->
			<!--<div class="nav pull-right log_content1_right"> <span>欢迎，我和我的猫</span>-->
				<!--<a href="<?php echo U('Order/MemberOrder/allOrder');?>">　|　个人中心　|　</a>-->
				<!--<a href="<?php echo U('user/index/logout');?>">退出登录</a> </div>-->
		<!--</div>-->
	<!--</div>-->
<!--</div>-->

<?php  function _sp_helloworld(){ echo "hello ThinkCMF!"; } function _sp_helloworld2(){ echo "hello ThinkCMF2!"; } function _sp_helloworld3(){ echo "hello ThinkCMF3!"; } ?>
<?php $portal_index_lastnews="1,2"; $portal_hot_articles="1,2"; $portal_last_post="1,2"; $tmpl=sp_get_theme_path(); $default_home_slides=array( array( "slide_name"=>"ThinkCMFX2.2.0发布啦！", "slide_pic"=>$tmpl."Public/assets/images/demo/1.jpg", "slide_url"=>"", ), array( "slide_name"=>"ThinkCMFX2.2.0发布啦！", "slide_pic"=>$tmpl."Public/assets/images/demo/2.jpg", "slide_url"=>"", ), array( "slide_name"=>"ThinkCMFX2.2.0发布啦！", "slide_pic"=>$tmpl."Public/assets/images/demo/3.jpg", "slide_url"=>"", ), ); ?>
<head>
    <meta charset="utf-8">
    <title>世纪母婴——最专业的月嫂</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/themes/simplebootx/Public/assets2/css/bootstrap.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/mobilelog.css" rel="stylesheet"/>
    <script src="/themes/simplebootx/Public/assets2/js/lib/jquery/jquery.min.js"></script>
    <script src="/themes/simplebootx/Public/assets2/js/login/mobilelog.js"></script>
    <script src="/public/js/layer/layer.js"></script>
    <link href="/themes/simplebootx/Public/assets2/css/index.css" rel="stylesheet"/>
    <script src="/themes/simplebootx/Public/assets2/js/swiper.min.js"></script>
    <link href="/themes/simplebootx/Public/assets2/css/swiper.css" rel="stylesheet"/>
    <script src="/themes/simplebootx/Public/assets2/js/site/index/index.js"></script>
    <link href="/themes/simplebootx/Public/assets2/css/showorder.css" rel="stylesheet" />
    <link href="/themes/simplebootx/Public/assets2/css/base.css" rel="stylesheet" />
    <link href="/themes/simplebootx/Public/assets2/css/about.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/contact.css" rel="stylesheet"/>

    <style>
        @media (min-width: 1200px) {
            .container {
                width: 1200px;
            }
        }
    </style>

    <link href="/themes/simplebootx/Public/assets2/css/lib/mdl/material.min.css" rel="stylesheet"/>
    <script src="/themes/simplebootx/Public/assets2/js/lib/mdl/material.min.js"></script>
    <link href="/themes/simplebootx/Public/assets2/css/site/header.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/site/footer.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/site/user/my-order.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/site/common/base.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/public/CSS/page.css">
</head>
<body>

<div class="log_bgcolor">
<div class="container">
    <div class="log_content1">
        <div class="col-md-8"> <span class="pull-left log_content1_left">欢迎来到世纪母婴！</span> </div>

            <?php if(empty($_SESSION['user'])): ?><div class="col-md-4">
                    <div class="nav pull-right log_content1_right">
                    <a href="<?php echo U('user/register/index');?>">　　注册　|　</a>
                        <a href="<?php echo U('user/login/index');?>">登录</a></div>
                </div>
        <?php else: ?>
                <div class="col-md-4">
            <div class="nav pull-right log_content1_right"> <span>欢迎，我的<?php echo ($_SESSION['user']["user_nicename"]); ?></span>
                <a href="<?php echo U('Order/MemberOrder/allOrder');?>">　|　个人中心　|　</a>
                <a href="<?php echo U('user/index/logout');?>">退出登录</a>
            </div>
                </div><?php endif; ?>

    </div>
</div>

<div class="log_content2">
	<div class="container">
		<div class="col-md-3 pull-left"> <img src="/themes/simplebootx/Public/assets2/img/logo2.png" width="279px" height="69px" class="log_content2_img"> </div>
		<div class="pull-right col-md-9">
			<ul class="log_content2_nav">
				<li style="border:none;width:12%;text-align: right;"><a href="<?php echo U('Portal/Index/contact');?>">联系我们</a></li>
				<li><a href="<?php echo U('Portal/Index/about');?>">关于我们</a></li>
				<li><a href="matching.html">智能匹配月嫂</a></li>
				<li><a href="<?php echo U('Yuesao/MemberYuesao/showorder');?>">月嫂展示&预约</a></li>
				<li style="width: 12%;" class="active"><a href="<?php echo U('Portal/Index/index');?>">首页</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="log_bgcolor">
	<div class="container">
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<div class="swiper-slide"> <img src="/themes/simplebootx/Public/assets2/img/index/banner.png"></div>
				<div class="swiper-slide"> <img src="/themes/simplebootx/Public/assets2/img/index/banner.png"></div>
				<div class="swiper-slide"> <img src="/themes/simplebootx/Public/assets2/img/index/banner.png"></div>
				<div class="swiper-slide"> <img src="/themes/simplebootx/Public/assets2/img/index/banner.png"></div>
			</div>
			<ui class="log_banner_icon" > </ui>
		</div>
	</div>
</div>
<div class="log_bgcolor" style="margin-top: -360px">
	<div class="container">
		<div class="log_title">
			<ul class="controls">
				<li class=" control on"><a>标准化月嫂</a></li>
				<li class="control"><a>7对1服务模式</a></li>
				<li class="control"><a>服务理念</a></li>
			</ul>
		</div>
		<div class="log_content3 abcb on" id="standard">
			<h3>月嫂定义</h3>
			<br>
			<p>月嫂是专业护理产妇与新生儿的一种新兴职业。相对普通保姆，"月嫂"属于高级家政人员。通常情况下，"月嫂"的工作集保姆、护士、厨师、月子护理师、育婴师、早教师的工作性质于一身。月嫂不但肩负一个新生命与一位母亲是否安全健康的重任，有的还要料理一个家庭的生活起居。家政保姆行业分化出月嫂行业标志着社会需求的个性化，标志着产业的分工精细化。 </p>
			<br>
			<p>月嫂的服务范围一般包括：<br>
				1.新生儿生活护理：指导正确哺乳、喂养、呵护、洗澡、穿衣、换洗尿布、物品消毒。<br>
				2.新生儿专业护理：婴儿洗澡、抚触、按摩，大小便观察，口腔、黄疸、脐部护理等。<br>
				3.产妇生活护理：产妇营养餐制作、营养膳食搭配、协助产妇擦浴等。<br>
				4.产妇专业护理：产褥期观察、护理，产后恢复指导，协助母乳喂养，乳房保健护理。<br>
				5.日常服务：为产妇及婴儿清洗衣物，打扫母婴卧室卫生等。</p>
			<ul style="padding-left:0px;">
				<li> <img src="/themes/simplebootx/Public/assets2/img/index/1.png"> </li>
				<li> <img src="/themes/simplebootx/Public/assets2/img/index/2.png"> </li>
				<li> <img src="/themes/simplebootx/Public/assets2/img/index/3.png"> </li>
			</ul>
		</div>
		<div class="log_content4 abcb" id="serve">
			<h3>服务团队组成</h3>
			<ul>
				<li class="title">
					<p class="p1 size">职务</p>
					<p class="p2 size">工作职责</p>
				</li>
				<li>
					<p class="p1">客服经理</p>
					<p class="p2">第一责任人；负责客户需求的沟通和内部资源调配</p>
				</li>
				<li>
					<p class="p1">服务监督</p>
					<p class="p2">服务流程控制；客户满意度调查；投诉处</p>
				</li>
				<li>
					<p class="p1">售后经理</p>
					<p class="p2">安排售后服务；和理疗师、催乳师协商服务</p>
				</li>
				<li>
					<p class="p1">月子专家</p>
					<p class="p2">月子方案；有针对性地指导月嫂</p>
				</li>
				<li>
					<p class="p1">月嫂</p>
					<p class="p2">现场护理</p>
				</li>
				<li>
					<p class="p1">催乳师</p>
					<p class="p2">产前和产后为产妇提供更专业的乳房护理</p>
				</li>
				<li>
					<p class="p1">理疗师</p>
					<p class="p2">入户为产妇提供中药汗蒸、美容美体等服务</p>
				</li>
			</ul>
		</div>
		<div class="log_content5 abcb" id="idea">
			<h3>我们的月子理念</h3>
			<br>
			<p style="text-align: left;">1.          做月子不仅是产妇身体调整，更是心理调整过程。心情愉快，妈妈和宝宝都会漂亮！<br>
				2.          孩子不能承受药物伤害，哺乳期产妇用药必须慎之又慎！<br>
				3.          全体家庭成员都需要自我调整和适应新生活，家庭和谐至关重要！<br>
				4.          新生命有能力适应新环境，请给宝宝战胜疾病，自我修复的机会。<br>
				5.          做月子会影响女人的一生健康，产妇往往比宝宝需要更多的关注和照顾。<br>
				6.          哺乳是女性幸福和美好的经历；母乳喂养的孩子更健康！<br>
				7.          重视中国传统的月子理念！ </p>
			<br>
			<h3>月嫂服务誓词</h3><br>
			<p style="text-align: left;">
				尊敬的客户:<br>
				　　衷心感谢您使用我爱我妻的月嫂服务。我将严格按照公司《操作流程》进行操作，并严格遵守《服务行为规范》。<br>
				　　我将严格要求自已，在服务中做到：<br>
				　　操作到位、细节完美、纪律严明、沟通清晰、超出期望。<br>
				　　感谢您给了我工作的机会，我要用专业服务和努力工作来回报您。<br>
				　　请您监督我！</p>
		</div>
	</div>

	<div class="foot" style="border-top:1px solid transparent">
		<div class="container">
			<!--
                    <div class="content">
                        <div class="foot_left">
                            <p class="left_p1">公司地址：杭州市拱墅区祥园路88号智慧信息产业园M座10楼</p>
                            <p>联系电话：0571-56624893　　　版权所有：杭州晖硕信息技术有限公司</p>
                        </div>
                        <div class="foot_center"><img src="assets/img/logo.png"></div>
                        <div class="foot_right">ee</div>
                    </div>
            -->


			
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
		</div>
	</div>

</div>
</div>
<script>
    var mySwiper = new Swiper('.swiper-container', {
        autoplay: 2000,//可选选项，自动滑动
        pagination : '.log_banner_icon',
        paginationClickable :true,
        paginationBulletRender: function (swiper, index, className) {
            return '<span class="' + className + ' log_banner_icon_li">' + (index + 1) + '</span>';
        }
    })
</script>
</body>
</html>