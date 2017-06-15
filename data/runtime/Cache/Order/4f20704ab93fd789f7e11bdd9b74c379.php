<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link href="/themes/simplebootx/Public/assets2/css/lib/mdl/material.min.css" rel="stylesheet"/>
    <script src="/themes/simplebootx/Public/assets2/js/lib/mdl/material.min.js"></script>
    <link href="/themes/simplebootx/Public/assets2/css/site/header.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/site/footer.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/site/user/my-order.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/site/common/base.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/public/CSS/page.css">

    <title>我的订单</title>


</head>
<body>
<div class="topmost">
    <div class="topmost__row"><span class="topmost__left">欢迎来到世纪母婴！</span>
        <div class="topmost__right">
            <span class="topmost__text">欢迎，我的<?php echo ($_SESSION['user']["user_nicename"]); ?></span>
            <a class="topmost__link" href=""><span class="topmost__text">个人中心</span></a>
            <a class="topmost__link" href="<?php echo U('user/index/logout');?>"><span class="topmost__text">退出登录</span></a></div>
    </div>
</div>
<header class="g-header">
    <div class="g-header__row">
        <img class="g-header__logo" src="/themes/simplebootx/Public/assets2/img/header/logo-long.png" alt=""/>
        <nav class="g-nav">
            <a class="g-nav__link g-nav__link--active" href=""><span class="g-nav__text">首页</span></a><a class="g-nav__link" href=""><span class="g-nav__text">月嫂展示&预约</span></a><a class="g-nav__link" href=""><span class="g-nav__text">智能匹配月嫂</span></a><a class="g-nav__link" href=""><span class="g-nav__text">关于我们</span></a><a class="g-nav__link" href=""><span class="g-nav__text">联系我们</span></a></nav>
    </div>
</header>
<div class="main" style="padding-bottom: 80px;">
    <div class="container">
        <div class="breadcrumb"><a class="breadcrumb__link" href="">首页</a><span class="breadcrumb__seperator">&gt;</span><a class="breadcrumb__link" href="">个人中心</a><span class="breadcrumb__seperator">&gt;</span><a class="breadcrumb__link" href="">我的订单</a></div>
        <div class="pannel-container">
            <aside class="row-1">
                <div class="stupid pannel">
                    <a href="<?php echo U('user/Center/index');?>">
                    <img class="stupid__avatar" src="data/upload/<?php echo ($_SESSION['user']["avatar"]); ?>" alt="" /></a>
                    <h5 class="stupid__nickname">我的<?php echo ($_SESSION['user']["user_nicename"]); ?><span class="stupid__vip-grade">V<sub>0</sub></span></h5>
                </div>
                <ul class="menu-list pannel">
                    <li class="menu menu--active"><a class="menu__link" href="<?php echo U('Order/MemberOrder/allOrder',array('type'=>0));?>">我的订单</a></li>
                    <li class="menu"><a class="menu__link" href="<?php echo U('Order/MemberMark/my_mark');?>">我的收藏</a></li>
                    <li class="menu"><a class="menu__link" href="<?php echo U('Order/MemberMark/footprint');?>">浏览历史</a></li>
                </ul>
            </aside>
            <div class="row-2">
                <div class="order-panel pannel">
                    <div class="order-panel__hd">
                        <div class="controls-wrap">

                            <?php if($_SESSION['type'] == 1): ?><div class="o-control"><a class="o-control__link" href="<?php echo U('Order/MemberOrder/allOrder',array('type'=>0));?>">所有订单</a></div>
                                <div class="o-control o-control--active"><a class="o-control__link" href="<?php echo U('Order/MemberOrder/allOrder',array('type'=>1));?>">代付定金</a></div>
                                <div class="o-control"><a class="o-control__link" href="<?php echo U('Order/MemberOrder/allOrder',array('type'=>2));?>">待付尾款</a></div>
                                <div class="o-control"><a class="o-control__link" href="<?php echo U('Order/MemberOrder/allOrder',array('type'=>3));?>">待评价</a></div>


                                <?php elseif($_SESSION['type'] == 2): ?>

                                <div class="o-control"><a class="o-control__link" href="<?php echo U('Order/MemberOrder/allOrder',array('type'=>0));?>">所有订单</a></div>
                                <div class="o-control"><a class="o-control__link" href="<?php echo U('Order/MemberOrder/allOrder',array('type'=>1));?>">代付定金</a></div>
                                <div class="o-control o-control--active"><a class="o-control__link" href="<?php echo U('Order/MemberOrder/allOrder',array('type'=>2));?>">待付尾款</a></div>
                                <div class="o-control"><a class="o-control__link" href="<?php echo U('Order/MemberOrder/allOrder',array('type'=>3));?>">待评价</a></div>


                                <?php elseif($_SESSION['type'] == 3): ?>

                                <div class="o-control"><a class="o-control__link" href="<?php echo U('Order/MemberOrder/allOrder',array('type'=>0));?>">所有订单</a></div>
                                <div class="o-control"><a class="o-control__link" href="<?php echo U('Order/MemberOrder/allOrder',array('type'=>1));?>">代付定金</a></div>
                                <div class="o-control"><a class="o-control__link" href="<?php echo U('Order/MemberOrder/allOrder',array('type'=>2));?>">待付尾款</a></div>
                                <div class="o-control o-control--active"><a class="o-control__link" href="<?php echo U('Order/MemberOrder/allOrder',array('type'=>3));?>">待评价</a></div>

                                <?php else: ?>

                                <div class="o-control o-control--active"><a class="o-control__link" href="<?php echo U('Order/MemberOrder/allOrder',array('type'=>0));?>">所有订单</a></div>
                                <div class="o-control"><a class="o-control__link" href="<?php echo U('Order/MemberOrder/allOrder',array('type'=>1));?>">代付定金</a></div>
                                <div class="o-control"><a class="o-control__link" href="<?php echo U('Order/MemberOrder/allOrder',array('type'=>2));?>">待付尾款</a></div>
                                <div class="o-control"><a class="o-control__link" href="<?php echo U('Order/MemberOrder/allOrder',array('type'=>3));?>">待评价</a></div><?php endif; ?>

                        </div>
                    </div>
                    <div class="order-panel__bd">
                        <div class="order-list">

                            <?php if(is_array($order)): foreach($order as $key=>$vo): ?><div class="order">
                                <div class="order__hd">
                                    <span class="order__datetime"><?php echo ($vo["order_create_at"]); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="order__number">订单号：<?php echo ($vo["order_id"]); ?></span></div>
                                <div class="order__main">
                                    <img class="order__img" src="data/upload/<?php echo ($vo["ys_avatar"]); ?>" alt=""/>
                                    <span class="order__text"><?php echo ($vo["ys_name"]); ?></span>
                                    <span class="order__text order__text--em">¥ <?php echo ($vo["price"]); ?></span>
                                    <div class="order__col">
                                        <span class="order__text order__text--em">
                                             <?php if($vo["order_status"] == 1): ?>待付定金
                                                <?php elseif($vo["order_status"] == 2): ?>待付余款
                                                <?php elseif($vo["order_status"] == 3): ?>待评价
                                                <?php elseif($vo["order_status"] == 4): ?>已完成
                                                <?php else: ?> 已关闭<?php endif; ?>
                                        </span>

                                        <?php if($vo["order_status"] != 0): ?><a class="order__text" href="<?php echo U('Order/MemberOrder/orderDetail',array('id'=>$vo['order_id']));?>">订单详情</a>
                                            <?php else: ?>
                                            <a class="order__text" href="">&nbsp;</a><?php endif; ?>
                                    </div>
                                    <?php if($vo["order_status"] == 1): ?><a class="order__action" href="<?php echo U('Order/MemberOrder/orderDepositPay',array('id'=>$vo['order_id']));?>">付款</a>
                                     <?php elseif($vo["order_status"] == 2): ?>
                                        <a class="order__action" href="<?php echo U('Order/MemberOrder/orderDepositPay',array('id'=>$vo['order_id']));?>">付款</a>
                                     <?php elseif($vo["order_status"] == 3): ?>
                                        <a class="order__action" href="<?php echo U('Order/MemberOrder/evaluateAction',array('id'=>$vo['order_id']));?>">评价</a>
                                     <?php elseif($vo["order_status"] == 4): ?>
                                        <a class="order__action o-hide" href="">已完成</a>
                                        <?php else: ?>
                                        <a class="order__action o-hide" href="">已关闭</a><?php endif; ?>
                                </div>
                            </div><?php endforeach; endif; ?>


                        </div>
                    </div>
                </div>
                <!--<div class="pagnation pannel" style="border-top:none;">-->
                    <!--&lt;!&ndash;<a class="pagnation__p" href=""><?php echo ($page-2); ?></a>&ndash;&gt;-->
                    <!--&lt;!&ndash;<a class="pagnation__p" href=""><?php echo ($page-1); ?></a>&ndash;&gt;-->
                    <!--&lt;!&ndash;<a class="pagnation__nav" href="">&ndash;&gt;-->
                        <!--&lt;!&ndash;<img src="/themes/simplebootx/Public/assets2/img/user/icon-arrow-left.png" alt=""/>&ndash;&gt;-->
                    <!--&lt;!&ndash;</a>&ndash;&gt;-->
                    <!--&lt;!&ndash;<a class="pagnation__current" href=""></a>&ndash;&gt;-->
                    <!--<div class="green-black"><?php echo ($page); ?></div>-->
                    <!--&lt;!&ndash;<a class="pagnation__nav" href="">&ndash;&gt;-->
                        <!--&lt;!&ndash;<img src="/themes/simplebootx/Public/assets2/img/user/icon-arrow-right.png" alt=""/>&ndash;&gt;-->
                    <!--&lt;!&ndash;</a>&ndash;&gt;-->
                    <!--&lt;!&ndash;<a class="pagnation__p" href=""><?php echo ($page+1); ?></a>&ndash;&gt;-->
                    <!--&lt;!&ndash;<a class="pagnation__p" href=""><?php echo ($page+2); ?></a>&ndash;&gt;-->

                <!--</div>-->
                <div class="pagnation pannel jogger Style " style="border-top:none;">
                <!--<div class="jogger Style"><?php echo ($page); ?></div>-->
                    <?php echo ($page); ?>
                </div>


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
</html>