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
    <link href="/themes/simplebootx/Public/assets2/css/site/user/comment.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/site/common/base.css" rel="stylesheet"/>
    <script src="/themes/simplebootx/Public/assets2/js/site/comment.js"></script>
    <title>已评价</title>

    <style>
        .uploader{
            width: 500px;
        }

    </style>
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
<div class="main" style="padding-bottom: 48px;">
    <div class="container">
        <div class="order order--bottom">
            <div class="order__meta" style="padding-top: 40px;">
                <div class="order__date"><?php echo ($comment["order_create_at"]); ?></div>
                <div class="order__number">订单号：<?php echo ($comment["order_id"]); ?></div>
            </div>
            <div class="order__info pannel">
                <div class="order__img-wrap">
                    <img class="order__img" src="data/upload/<?php echo ($comment["ys_avatar"]); ?>" alt=""/></div>
                <div class="order__nurse">
                    <div class="order__nurse-wrap">
                        <div class="order__nurse-a"><span class="order__nurse-text"><?php echo ($comment["ys_name"]); ?></span>
                            <span class="order__nurse-text" style="color:#fd5959;">
                                <?php if($comment["level"] == 1): ?>一<?php elseif($comment["level"] == 2): ?>二<?php elseif($comment["level"] == 3): ?>三<?php elseif($comment["level"] == 4): ?>四<?php elseif($comment["level"] == 5): ?>五<?php else: ?>无<?php endif; ?>星级月嫂</span>
                        </div>
                        <div class="order__nurse-b"><span class="order__nurse-text">价格：<?php echo (number_format($comment["price"], 0, '.', '')); ?>元/26天</span>
                            <span class="order__nurse-text"><?php echo ($comment["age"]); ?>岁/<?php echo ($comment["ys_address"]); ?>/<?php echo ($comment["experience"]); ?>年月嫂经验</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="comment pannel">
            <h4 class="comment__title">请填写您宝贵的建议</h4>
            <div class="comment__bd">
                <div class="comment__item-wrap">
                    <div class="comment__item"><span class="comment__k"><i class="comment__icon-k">*</i>综合评分</span>
                        <div class="comment__v" data-star-num="0">
                            <?php $i=(int)$comment['comprehensive_score'] ?>
                            <?php $__FOR_START_22561__=0;$__FOR_END_22561__=$i;for($i=$__FOR_START_22561__;$i < $__FOR_END_22561__;$i+=1){ ?><span class="comment__star comment__star--full"></span><?php } ?>
                            <?php $__FOR_START_17478__=$i;$__FOR_END_17478__=5;for($i=$__FOR_START_17478__;$i < $__FOR_END_17478__;$i+=1){ ?><span class="comment__star"></span><?php } ?>
                        </div>
                         &nbsp;&nbsp;&nbsp;<?php echo ($comment["comprehensive_score"]); ?>星
                    </div>


                    <div class="comment__item">
                        <span class="comment__k"><i class="comment__icon-k">*</i>技能评分</span>
                        <div class="comment__v" data-star-num="0">
                            <?php $i=(int)$comment['skill_score'] ?>
                            <?php $__FOR_START_5639__=0;$__FOR_END_5639__=$i;for($i=$__FOR_START_5639__;$i < $__FOR_END_5639__;$i+=1){ ?><span class="comment__star comment__star--full"></span><?php } ?>
                            <?php $__FOR_START_13108__=$i;$__FOR_END_13108__=5;for($i=$__FOR_START_13108__;$i < $__FOR_END_13108__;$i+=1){ ?><span class="comment__star"></span><?php } ?>
                        </div>
                        &nbsp;&nbsp;&nbsp;<?php echo ($comment["skill_score"]); ?>星
                    </div>


                    <div class="comment__item"><span class="comment__k"><i class="comment__icon-k">*</i>态度评分</span>
                        <div class="comment__v" data-star-num="0">
                            <?php $i=(int)$comment['attitude_score'] ?>
                            <?php $__FOR_START_21853__=0;$__FOR_END_21853__=$i;for($i=$__FOR_START_21853__;$i < $__FOR_END_21853__;$i+=1){ ?><span class="comment__star comment__star--full"></span><?php } ?>
                            <?php $__FOR_START_24274__=$i;$__FOR_END_24274__=5;for($i=$__FOR_START_24274__;$i < $__FOR_END_24274__;$i+=1){ ?><span class="comment__star"></span><?php } ?>
                        </div>
                        &nbsp;&nbsp;&nbsp;<?php echo ($comment["attitude_score"]); ?>星
                    </div>
                </div>
                <p><?php echo ($comment["content"]); ?></p>


                <div class="uploader">
                        <?php if(is_array($comment_img)): foreach($comment_img as $key=>$vo): ?><img class="uploader__img" src="<?php echo sp_get_image_preview_url($vo['url']);?>"><?php endforeach; endif; ?>
                </div>


                <div class="comment__input-wrap">
                    <input class="comment__submit" type="submit" value="返回" onclick="window.history.go(-1);"/>
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
        <div class="g-footer__b"><img class="g-footer__logo" src="../assets/img/footer/logo-copy.png" alt=""/></div>
        <div class="g-footer__c">
            <hr style="margin-top:4px;"/>
            <p class="g-footer__slogan">“以敬天之心事人，以求道之心做事”</p>
        </div>
    </div>
</footer>
</body>
</html>