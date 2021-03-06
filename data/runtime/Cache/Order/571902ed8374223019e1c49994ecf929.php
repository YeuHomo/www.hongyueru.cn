<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <script src="/public/js/jquery.js"></script>
    <link href="/themes/simplebootx/Public/assets2/css/lib/mdl/material.min.css" rel="stylesheet"/>
    <script src="/themes/simplebootx/Public/assets2/js/lib/mdl/material.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/site/header.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/site/footer.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/site/user/order-detail.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/site/common/base.css" rel="stylesheet"/>
    <script src="/public/js/layer/layer.js"></script>
    <title>订单详情</title>
    <style>
        .order_empty{
            list-style: none;
            width: 100px;
        }
    </style>

</head>
<body>
<div class="topmost">
    <div class="topmost__row"><span class="topmost__left">欢迎来到世纪母婴！</span>
        <div class="topmost__right"><span class="topmost__text">欢迎，我的<?php echo ($_SESSION['user']["user_login"]); ?></span><a class="topmost__link" href=""><span class="topmost__text">个人中心</span></a><a class="topmost__link" href=""><span class="topmost__text">退出登录</span></a></div>
    </div>
</div>
<header class="g-header">
    <div class="g-header__row"><img class="g-header__logo" src="/themes/simplebootx/Public/assets2/img/header/logo-long.png" alt=""/>
        <nav class="g-nav"><a class="g-nav__link g-nav__link--active" href=""><span class="g-nav__text">首页</span></a><a class="g-nav__link" href=""><span class="g-nav__text">月嫂展示&预约</span></a><a class="g-nav__link" href=""><span class="g-nav__text">智能匹配月嫂</span></a><a class="g-nav__link" href=""><span class="g-nav__text">关于我们</span></a><a class="g-nav__link" href=""><span class="g-nav__text">联系我们</span></a></nav>
    </div>
</header>
<div class="main" style="padding-bottom:60px;">
    <div class="container">
        <div class="order order--top">
            <div class="order__meta">
                <div class="order__date"><?php echo ($order["order_create_at"]); ?></div>
                <div class="order__number">订单号：<?php echo ($order["order_id"]); ?></div>
            </div>
            <div class="order__info pannel">
                <div class="order__status">
                    <div class="order__title-wrap"><img class="order__icon" src="/themes/simplebootx/Public/assets2/img/user/icon-warn.png" alt=""/>
                        <h5 class="order__title">订单状态：
                            <?php if($order["order_status"] == 1): ?>待付定金
                                <?php elseif($order["order_status"] == 2): ?>待付余款
                                <?php elseif($order["order_status"] == 3): ?>待评价
                                <?php elseif($order["order_status"] == 4): ?>已完成
                                <?php else: ?> 已关闭<?php endif; ?>

                        </h5>
                    </div>
                    <div class="order__action-wrap">

                        <?php if($order["order_status"] == 1): ?><a class="order__action order__action--ok" href="<?php echo U('Order/MemberOrder/orderDepositPay',array('id'=>$order['order_id']));?>">立即支付</a>
                            <a class="order__action order__action--cancel" href="javascript:;" onclick="order_del('<?php echo ($order["order_id"]); ?>')">取消订单</a>
                        <?php elseif($order["order_status"] == 2): ?>
                            <a class="order__action order__action--ok" href="<?php echo U('Order/MemberOrder/orderDepositPay',array('id'=>$order['order_id']));?>">立即支付</a>
                            <a class="order__action order__action--cancel" href="javascript:;" onclick="order_del('<?php echo ($order["order_id"]); ?>')">取消订单</a>
                        <?php elseif($order["order_status"] == 3): ?>
                            <a class="order__action order__action--ok" style="width: 100%" href="<?php echo U('Order/MemberOrder/evaluateAction',array('id'=>$order['order_id']));?>">立即评价</a>
                        <?php elseif($order["order_status"] == 4): ?>
                            <a class="order__action order__action--cancel" style="width: 100%" href="<?php echo U('Order/MemberOrder/evaluateDetail',array('id'=>$order['order_id']));?>">查看评价</a><?php endif; ?>
                    </div>
                </div>
                <div class="order__customer">
                    <div class="order__customer-wrap">
                        <div class="order__text-row">
                            <span class="order__text-k">姓名：</span>
                            <span class="order__text-v"><?php echo ($order["order_name"]); ?></span>
                        </div>
                        <div class="order__text-row">
                            <span class="order__text-k">电话：</span>
                            <span class="order__text-v"><?php echo ($order["order_mobile"]); ?></span>
                        </div>
                        <div class="order__text-row">
                            <span class="order__text-k">预定时间：</span>
                            <span class="order__text-v"><?php echo ($order["order_time"]); ?></span>
                        </div>
                        <div class="order__text-row">
                            <span class="order__text-k">地址：</span>
                            <span class="order__text-v"><?php echo ($order["address"]); ?></span>
                        </div>
                        <div class="order__text-row">
                            <span class="order__text-k">附言：</span>
                            <span class="order__text-v"><?php echo ($order["leave_message"]); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="order order--bottom">
            <div class="order__meta">
                <div class="order__date"><?php echo ($order["order_create_at"]); ?></div>
                <div class="order__number">订单号：<?php echo ($order["order_id"]); ?></div>
            </div>
            <div class="order__info pannel">
                <div class="order__img-wrap"><img class="order__img" src="data/upload/<?php echo ($order["ys_avatar"]); ?>" alt=""/></div>
                <div class="order__nurse">
                    <div class="order__nurse-wrap">
                        <div class="order__nurse-a">
                            <span class="order__nurse-text"><?php echo ($order["ys_name"]); ?></span>
                            <span class="order__nurse-text" style="color:#fd5959;">
                                <?php if($order["level"] == 1): ?>一<?php elseif($order["level"] == 2): ?>二<?php elseif($order["level"] == 3): ?>三<?php elseif($order["level"] == 4): ?>四<?php elseif($order["level"] == 5): ?>五<?php else: ?>无<?php endif; ?>星级月嫂</span>
                        </div>
                        <div class="order__nurse-b">
                            <span class="order__nurse-text">价格：<?php echo (number_format($order["price"], 0, '.', '')); ?>元/26天</span>
                            <span class="order__nurse-text"><?php echo ($order["age"]); ?>岁/<?php echo ($order["ys_address"]); ?>/<?php echo ($order["experience"]); ?>年月嫂经验</span>
                        </div>
                    </div>
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

<script>
    function order_del(id) {
        layer.open({
            content: "您确定删除该订单吗？",
            icon: 3,
            btn: ['是', '否'],
            yes: function () {
                $.ajax({
                    type: 'GET', //请求类型
                    url: "<?php echo U('Order/MemberOrder/orderDel');?>", //提交URL地址
                    dataType: 'json',   //返回格式
                    data: {id: id}, //数据
                    success: function (data) { //如果成功，执行
                        if (data.status != 0) {   //返回状态不为0时，显示对应的错误
                            layer.open({
                                content: data.message,
                                icon: 2,
                                title: '小提示框',
                            });
                            return;
                        }
                        layer.open({
                            content: data.message,
                            icon: 1,
                            yes: function () {
                                location.href = "<?php echo U('Order/MemberOrder/allOrder');?>";
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
    
</script>
</body>
</html>