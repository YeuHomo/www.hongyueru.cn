<?php if (!defined('THINK_PATH')) exit();?>
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


<div class="log_bgcolor">
    <div class="log_content2">
        <div class="container">
            <div class="col-md-3 pull-left"> <img src="/themes/simplebootx/Public/assets2/img/logo2.png" width="279px" height="69px" class="log_content2_img"> </div>
            <div class="pull-right col-md-9">
                <ul class="log_content2_nav">
                    <li style="border:none;width:12%;text-align: right;"><a href="<?php echo U('Portal/Index/contact');?>">联系我们</a></li>
                    <li><a href="<?php echo U('Portal/Index/about');?>">关于我们</a></li>
                    <li><a href="matching.html">智能匹配月嫂</a></li>
                    <li  class="active"><a href="<?php echo U('Yuesao/MemberYuesao/showorder');?>">月嫂展示&预约</a></li>
                    <li style="width: 12%;"><a href="<?php echo U('Portal/Index/index');?>">首页</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="subnav">
            <p><a href="../../Portal/index.html" style="color:#333;">首页</a>　＞　月嫂展示&预约</p>
        </div>
        <!--为您推荐-->
        <div class="main5 clearfix">
            <p class="main5_p1">为您推荐 ● 杭州</p>
            <p class="main5_p2">目前，世纪母婴在杭州地区共<span><?php echo ($count); ?></span>名月嫂可供您选择<a style="padding-left:20px;color:#ffb696;" href=""> >>查看更多</a></p>
            <div class="main_content clearfix">

                <?php if(is_array($ys)): foreach($ys as $key=>$vo): ?><div class="content_list">
                    <div class="news-item"> <img src="/themes/simplebootx/Public/assets2/img/1.png">
                        <div class="news_pic"> <a href="showorder2.html"><img src="data/upload/<?php echo ($vo["ys_avatar"]); ?>"></a> </div>
                        <div class="news-t1"><?php echo ($vo["ys_name"]); ?></div>
                        <div class="news-t2"><?php if($vo["level"] == 1): ?>一<?php elseif($vo["level"] == 2): ?>二<?php elseif($vo["level"] == 3): ?>三<?php elseif($vo["level"] == 4): ?>四<?php elseif($vo["level"] == 5): ?>五<?php else: ?>无<?php endif; ?>星级月嫂</span>星级月嫂</div>
                        <div class="news-t3">价格：<?php echo (number_format($vo["price"], 0, '.', '')); ?>元/26天</div>
                        <div class="news-t4"><?php echo ($vo["age"]); ?>岁/<?php echo ($vo["ys_address"]); ?>/<?php echo ($vo["experience"]); ?>年月嫂经验</div>
                        <div class="news-t5"><?php echo ($vo["introduce"]); ?></div>
                        <a class="news-t6" href="showorder2.html" style="color:#ffb696">+去看看</a> </div>
                </div><?php endforeach; endif; ?>
        </div>
        <div class="evaluate">
            <p class="evaluate_title">晒单评价</p>
            <ul id="RunTopic" style="position:relative;">
                <div class="r-wrapper" style="position:absolute;top:0;left:0;">

                    <?php if(is_array($comment)): foreach($comment as $key=>$vo): ?><li>
                        <img src="data/upload/<?php echo ($vo["ys_avatar"]); ?>" class="RunTopic_img news_pic">
                        <div class="RunTopic_content">
                            <?php $user_name=mb_substr($vo['order_name'],0,1); ?>
                            <p class="RunTopic_content_p"><?php echo ($user_name); if($vo["sex"] == 1): ?>女士<?php else: ?>先生<?php endif; ?>
                                <span><?php echo (date("Y-m-d",strtotime($vo["create_at"]))); ?></span>
                                <?php echo (substr($vo["order_mobile"],0,3)); ?>****<?php echo (substr($vo["order_mobile"],7)); ?>
                            </p>
                            <span class="RunTopic_content_span"><?php echo ($vo["content"]); ?></span>
                        </div>
                    </li><?php endforeach; endif; ?>

                    <li>
                        <img src="/themes/simplebootx/Public/assets2/img/showorder/1.png" class="RunTopic_img">
                        <div class="RunTopic_content">
                            <p class="RunTopic_content_p">刘女士<span>2017-03-03</span>188****2222</p>
                            <span class="RunTopic_content_span">我家请的刘姐，刘姐照顾宝宝手法很专业，为人细心周到，干活也很麻利，每天给宝宝洗澡、一日三餐照顾我的饮食，还几乎包揽了家里所有的家务，家里人都对刘姐赞不绝口，感谢刘姐无微不至的照顾。</span>
                        </div>
                    </li>
                    <li>
                        <img src="/themes/simplebootx/Public/assets2/img/showorder/1.png" class="RunTopic_img">
                        <div class="RunTopic_content">
                            <p class="RunTopic_content_p">吴女士<span>2017-03-03</span>188****2222</p>
                            <span class="RunTopic_content_span">我家请的刘姐，刘姐照顾宝宝手法很专业，为人细心周到，干活也很麻利，每天给宝宝洗澡、一日三餐照顾我的饮食，还几乎包揽了家里所有的家务，家里人都对刘姐赞不绝口，感谢刘姐无微不至的照顾。</span>
                        </div>
                    </li>
                    <li>
                        <img src="/themes/simplebootx/Public/assets2/img/showorder/1.png" class="RunTopic_img">
                        <div class="RunTopic_content">
                            <p class="RunTopic_content_p">李女士<span>2017-03-03</span>188****2222</p>
                            <span class="RunTopic_content_span">我家请的刘姐，刘姐照顾宝宝手法很专业，为人细心周到，干活也很麻利，每天给宝宝洗澡、一日三餐照顾我的饮食，还几乎包揽了家里所有的家务，家里人都对刘姐赞不绝口，感谢刘姐无微不至的照顾。</span>
                        </div>
                    </li>
                    <li>
                        <img src="/themes/simplebootx/Public/assets2/img/showorder/1.png" class="RunTopic_img">
                        <div class="RunTopic_content">
                            <p class="RunTopic_content_p">王楠士<span>2017-03-03</span>188****2222</p>
                            <span class="RunTopic_content_span">我家请的刘姐，刘姐照顾宝宝手法很专业，为人细心周到，干活也很麻利，每天给宝宝洗澡、一日三餐照顾我的饮食，还几乎包揽了家里所有的家务，家里人都对刘姐赞不绝口，感谢刘姐无微不至的照顾。</span>
                        </div>
                    </li>
                </div>
            </ul>
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
</div>

<script type="text/javascript">

    var i = 0;
    var $wrap = $('.r-wrapper');

    var $li = $('.r-wrapper>li');
    var timer = setInterval(function () {
        var offset = i * 5;
        $wrap.css('transform', 'translateY(-'+ i * 5 +'px)');
        i++;

        if ( offset >= $wrap.height() - $li.height()){
            i = 0;
        }
    }, 200);

</script>
</body>
</html>