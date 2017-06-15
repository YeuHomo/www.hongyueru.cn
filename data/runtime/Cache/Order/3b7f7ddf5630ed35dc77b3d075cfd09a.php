<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>支付</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/themes/simplebootx/Public/assets2/css/bootstrap.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/pay.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/base.css" rel="stylesheet"/>
    <script src="/themes/simplebootx/Public/assets2/js/lib/jquery/jquery.min.js"></script>
    <style>
        @media (min-width: 1200px) {
            .container {
                width: 1200px;
            }
        }
    </style>
</head>

<body>
<div class="log_bgcolor">
    <div class="container">
        <div class="log_content1">
            <div class="col-md-8"> <span class="pull-left log_content1_left">欢迎来到世纪母婴！</span> </div>
            <div class="col-md-4">
                <div class="nav pull-right log_content1_right"> <span>欢迎，我和我的猫</span> <a href="#">　|　个人中心　|　</a> <a href="#">退出登录</a> </div>
            </div>
        </div>
    </div>
    <div class="log_content2">
        <div class="container">
            <div class="col-md-3 pull-left"> <img src="/themes/simplebootx/Public/assets2/img/logo2.png" width="279px" height="69px" class="log_content2_img"> </div>
            <div class="pull-right col-md-9">
                <ul class="log_content2_nav">
                    <li style="border:none;width:12%;text-align: right;"><a href="contact.html">联系我们</a></li>
                    <li><a href="about.html">关于我们</a></li>
                    <li><a href="matching.html">智能匹配月嫂</a></li>
                    <li class="active"><a href="showorder.html">月嫂展示&预约</a></li>
                    <li style="width: 12%;"><a href="index.html">首页</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="log_bgcolor">
        <div class="container">
            <div class="oder_toplist">
                <span><?php echo ($order["order_create_at"]); ?></span>
                <span class="pd_left">订单号：<?php echo ($order["order_id"]); ?></span>
            </div>
            <div class="oder_content">
                <div class="oder_line"></div>
                <img src="data/upload/<?php echo ($order["ys_avatar"]); ?>" class="oder_head">
                <ul class="oder_ul1">
                    <li class="oder_li1"><?php echo ($order["ys_name"]); ?></li>
                    <li class="oder_li2">¥ <?php echo ($order["price"]); ?></li>
                    <li class="oder_li3"><a href="<?php echo U('Order/MemberOrder/orderDetail',array('id'=>$order['order_id']));?>">订单详情</a></li>
                    <li class="oder_li4">服务时间：<?php echo (date('Y/m/d',strtotime($order["start_serve"]))); ?>-<?php echo (date('Y/m/d',strtotime($order["end_serve"]))); ?></li>
                </ul>
                <ul class="oder_ul2">
                    <li class="oder_li1">订单号：<?php echo ($order["order_id"]); ?></li>

                    <?php if($order["order_status"] == 1): ?><li class="oder_li2">预约月嫂，只需要支付10%定金~</li>
                        <li class="oder_li3">合计：¥<?php echo (number_format($order['price']/10, 2, '.', '')); ?></li>
                    <?php elseif($order["order_status"] == 2): ?>
                        <li class="oder_li2">已支付10%定金，尾款为总额的90%噢~</li>
                        <li class="oder_li3">合计：¥<?php echo (number_format($order['price']/10*9, 2, '.', '')); ?></li><?php endif; ?>

                </ul>
                <p class="oder_p1">选择支付方式</p>
                <div class="oder_pay">
                    <div class="profile-form__radio-wrap">
                        <input class="profile-form__radio" type="radio" name="payment" id="alipay"/>
                        <label class="profile-form__radio-lbl" for="alipay"><img src="/themes/simplebootx/Public/assets2/img/pay/2.png"></label>
                        <input style="margin-left:90px;"class="profile-form__radio" type="radio" name="payment" id="wechat"/>
                        <label class="profile-form__radio-lbl" for="wechat"><img src="/themes/simplebootx/Public/assets2/img/pay/3.png"></label>
                    </div>
                </div>
                <div style="text-align: center;">
                    <button class="oder_button">支付</button>
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
            <p class="g-footer__text">联系电话：0571-56624893　　　版权所有：XXX</p>
        </div>
        <div class="g-footer__b"><img class="g-footer__logo" src="assets/img/logo.png" alt=""/></div>
        <div class="g-footer__c">
            <hr style="margin-top:4px;"/>
            <p class="g-footer__slogan">“以敬天之心事人，以求道之心做事”</p>
        </div>
    </div>
</footer>
</body>
</html>