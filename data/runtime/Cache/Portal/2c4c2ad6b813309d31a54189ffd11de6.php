<?php if (!defined('THINK_PATH')) exit(); function _sp_helloworld(){ echo "hello ThinkCMF!"; } function _sp_helloworld2(){ echo "hello ThinkCMF2!"; } function _sp_helloworld3(){ echo "hello ThinkCMF3!"; } ?>
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
                    <li class="active"><a href="<?php echo U('Portal/Index/about');?>">关于我们</a></li>
                    <li><a href="matching.html">智能匹配月嫂</a></li>
                    <li><a href="../Yuesao/MemberYuesao/showorder.html">月嫂展示&预约</a></li>
                    <li style="width: 12%;"><a href="<?php echo U('Portal/Index/index');?>">首页</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"> <img src="/themes/simplebootx/Public/assets2/img/index/banner.png"></div>
            </div>
        </div>
    </div>
<div class="container" style="margin-top: -360px">
    <div class="subnav"><p><a href="index.html">首页</a>　＞　关于我们</p></div>
    <div class="content">
        <img src="/themes/simplebootx/Public/assets2/img/about/1.png" class="img1">
        <p class="content_p">杭州世纪母婴服务有限公司成立于2001年，是杭州专业的高档月子护理、月嫂培训机构，共拥有300多名工作经验丰富的星级月嫂及金牌VIP月嫂。世纪母婴经过近10多年的市场运作已成为是浙江省内口碑好的母婴生活护理机构。</p>
        <img src="/themes/simplebootx/Public/assets2/img/about/2.png" class="img2">
        <p class="content_p2">世纪母婴公司员工不但要掌握科学知识，还必须要有细心.耐心.爱心.从而为客户提供更优质的服务，使客户感到放心.舒心.称心。公司针对产妇与婴幼儿，制定了相应配套的一系列服务，科学的喂养，营养的膳食，产后恢复等为产妇制定了一整套科学坐月子的优质方案，为婴幼儿提供先进科学的服务和健康指导。世纪母婴的阿姨配备印有“世纪母婴”字样的拉杆箱，自带床单被套，着工作服，持有派工单、本人身份证原件，卫生防疫站颁发的健康证，工作日记，专业月子菜单上岗，用爱心，热心，责任心，为你添喜出力，陪你度过一个幸福美妙的月子历程。</p>
        <p class="content_p3">杭州世纪母婴服务有限公司成立于2001年，是杭州专业的高档月子护理、月嫂培训机构，共拥有300多名工作经验丰富的星级月嫂及金牌VIP月嫂。世纪母婴经过近10多年的市场运作已成为是浙江省内口碑好的母婴生活护理机构。</p>  		<img src="/themes/simplebootx/Public/assets2/img/about/3.png" style="margin-top: -50px" class="img3">
        <img src="/themes/simplebootx/Public/assets2/img/about/4.png" class="img4" style="margin-top: 50px">
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
</div>
</body>
</html>