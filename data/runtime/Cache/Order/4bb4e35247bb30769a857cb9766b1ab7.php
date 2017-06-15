<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

    <script src="/themes/simplebootx/Public/assets2/js/lib/jquery/jquery-2.1.3.min.js">   </script>
    <link href="/themes/simplebootx/Public/assets2/css/lib/mdl/material.min.css" rel="stylesheet"/>
    <script src="/themes/simplebootx/Public/assets2/js/lib/mdl/material.min.js"></script>
    <link href="/themes/simplebootx/Public/assets2/css/site/header.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/site/footer.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/site/user/footprint.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/site/common/base.css" rel="stylesheet"/>
    <script src="/public/js/layer/layer.js"></script>
    <title>我的收藏</title>
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
<div class="main" style="padding-bottom: 80px;">
    <div class="container">
        <div class="breadcrumb"><a class="breadcrumb__link" href="">首页</a><span class="breadcrumb__seperator">&gt;</span><a class="breadcrumb__link" href="">个人中心</a><span class="breadcrumb__seperator">&gt;</span><a class="breadcrumb__link" href="">我的收藏</a></div>
        <div class="pannel-container">
            <aside class="row-1">
                <div class="stupid pannel"><img class="stupid__avatar" src="data/upload/<?php echo ($_SESSION['user']["avatar"]); ?>" alt=""/>
                    <h5 class="stupid__nickname">我的<?php echo ($_SESSION['user']["user_nicename"]); ?><span class="stupid__vip-grade">V<sub>0</sub></span></h5>
                </div>
                <ul class="menu-list pannel">
                    <li class="menu"><a class="menu__link" href="<?php echo U('Order/MemberOrder/allOrder',array('type'=>0));?>">我的订单</a></li>
                    <li class="menu menu--active"><a class="menu__link" href="<?php echo U('Order/MemberMark/my_mark');?>">我的收藏</a></li>
                    <li class="menu"><a class="menu__link" href="<?php echo U('Order/MemberMark/footprint');?>">浏览历史</a></li>
                </ul>
            </aside>
            <div class="row-2">
                <div class="view-list">
                    <div class="view" style="margin-top: -50px">


                            <?php if(is_array($favorite)): $i = 0; $__LIST__ = $favorite;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$f): $mod = ($i % 2 );++$i; if(($mod) == "0"): ?><div class="view__row" style="margin-top: 50px">
                                    <div class="v-item">
                                    <div class="v-item__attachment">
                                        <img class="v-item__img stupid__avatar" src="data/upload/<?php echo ($f["ys_avatar"]); ?>" alt=""/>
                                    </div>
                                    <div class="v-item__main pannel" style="border-radius:6px;">
                                        <div class="v-item__body">
                                            <span class="v-item__text"><?php echo ($f["ys_name"]); ?></span>
                                            <span class="v-item__text v-item__text--em">
                                                <?php if($f["level"] == 1): ?>一<?php elseif($f["level"] == 2): ?>二<?php elseif($f["level"] == 3): ?>三<?php elseif($f["level"] == 4): ?>四<?php elseif($f["level"] == 5): ?>五<?php else: ?>无<?php endif; ?>星级月嫂
                                            </span>
                                            <span class="v-item__text">价格：<?php echo (number_format($f["price"], 0, '.', '')); ?>元/26天</span>
                                            <span class="v-item__text"><?php echo ($f["age"]); ?>岁/<?php echo ($f["ys_address"]); ?>/<?php echo ($f["experience"]); ?>年月嫂经验</span>
                                        </div>
                                        <div class="v-item__footer">
                                            <p class="v-item__comment"><?php echo ($f["introduce"]); ?></p>
                                            <div class="v-item__actions">
                                                <a class="v-item__action v-item__action--em" href="<?php echo U('Yuesao/MemberYuesao/showorder3',array('ys_id'=>$f['yuesao_id']));?>">+去看看</a>
                                                <a class="v-item__action" href="javascript:;" onclick="delMark(<?php echo ($f["id"]); ?>)">删除</a></div>
                                        </div>
                                    </div>
                                    </div><?php endif; ?>

                                <?php if(($mod) == "1"): ?><div class="v-item">
                                        <div class="v-item__attachment">
                                            <img class="v-item__img stupid__avatar" src="data/upload/<?php echo ($f["ys_avatar"]); ?>" alt=""/>
                                        </div>
                                        <div class="v-item__main pannel" style="border-radius:6px;">
                                            <div class="v-item__body">
                                                <span class="v-item__text"><?php echo ($f["ys_name"]); ?></span>
                                                <span class="v-item__text v-item__text--em">
                                                <?php if($f["level"] == 1): ?>一<?php elseif($f["level"] == 2): ?>二<?php elseif($f["level"] == 3): ?>三<?php elseif($f["level"] == 4): ?>四<?php elseif($f["level"] == 5): ?>五<?php else: ?>无<?php endif; ?>星级月嫂
                                            </span>
                                                <span class="v-item__text">价格：<?php echo (number_format($f["price"], 0, '.', '')); ?>元/26天</span>
                                                <span class="v-item__text"><?php echo ($f["age"]); ?>岁/<?php echo ($f["ys_address"]); ?>/<?php echo ($f["experience"]); ?>年月嫂经验</span>
                                            </div>
                                            <div class="v-item__footer">
                                                <p class="v-item__comment"><?php echo ($f["introduce"]); ?></p>
                                                <div class="v-item__actions">
                                                    <a class="v-item__action v-item__action--em" href="<?php echo U('Yuesao/MemberYuesao/showorder3',array('ys_id'=>$f['yuesao_id']));?>">+去看看</a>
                                                    <a class="v-item__action" href="javascript:;" onclick="delMark(<?php echo ($f["id"]); ?>)">删除</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>

                        </div>
                    </div>
                <div class="pagnation pannel"><a class="pagnation__p" href="">01</a><a class="pagnation__p" href="">02</a><a class="pagnation__nav" href=""><img src="/themes/simplebootx/Public/assets2/img/user/icon-arrow-left.png" alt=""/></a><a class="pagnation__current" href="">03</a><a class="pagnation__nav" href=""><img src="/themes/simplebootx/Public/assets2/img/user/icon-arrow-right.png" alt=""/></a><a class="pagnation__p" href="">04</a><a class="pagnation__p" href="">05</a></div>
            </div>
        </div>
    </div>
</div>
<footer class="g-footer">
    <div class="g-footer__wrap">
        <div class="g-footer__a">
            <p class="g-footer__text">公司地址：杭州市拱墅区祥园路88号智慧信息产业园M座10楼</p>
            <hr style="margin: 10px 0;"/>
            <p class="g-footer__text">联系电话：0571-56624893          版权所有：XXX</p>
        </div>
        <div class="g-footer__b"><img class="g-footer__logo" src="/themes/simplebootx/Public/assets2/img/footer/logo-copy.png" alt=""/></div>
        <div class="g-footer__c">
            <hr style="margin-top:4px;"/>
            <p class="g-footer__slogan">“以敬天之心事人，以求道之心做事”</p>
        </div>
    </div>
</footer>
</body>
<script>

    function delMark(id) {
        $.ajax({
            type: 'get', //请求类型
            url:"<?php echo U('Order/MemberMark/delMark');?>", //提交URL地址
            dataType: 'json',   //返回格式
            data: {id: id}, //数据
            success: function (data) { //如果成功，执行
                if (data.status != 0) {   //返回状态不为0时，显示对应的错误
                    layer.open({
                        content: data.message,
                        icon: 2,
                    });
                    return;
                }

                layer.open({
                    content: data.message,
                    icon: 1,
                    yes: function () {
                        location.href = "<?php echo U('Order/MemberMark/my_mark');?>";
                    },
                });
            },
            error: function (xhr, status) { //如果失败，执行
                console.log(xhr);   //在控制台显示错误的原因以及返回值
                console.log(status);
            }
    });
    }

</script>

</html>