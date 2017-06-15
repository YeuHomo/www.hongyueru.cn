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
    <script src="/themes/simplebootx/Public/assets2/js/lib/jquery/jquery-2.1.3.min.js">   </script>
    <script src="/themes/simplebootx/Public/assets2/js/site/comment.js"></script>
    <script src="/public/js/layer/layer.js"></script>



    <link href="/public/js/artDialog/skins/default.css" rel="stylesheet" />
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
    <script src="/public/js/common.js"></script>

    <title>评价</title>

    <script type="text/html" id="photos-item-wrapper">
    <span id="savedimage{id}">
    <input id="photo-{id}" type="text" style="display:none;" name="photos_url[]" value="{filepath}">
    <input id="photo-{id}-name" type="text" style="display:none;" name="photos_alt[]" value="{name}" style="width: 160px;" title="图片名称">
    <img id="photo-{id}-preview" src="{url}" style="height:100px;width: 100px;" onclick="parent.image_preview_dialog(this.src);">
    <a href="javascript:upload_one_image('图片上传','#photo-{id}');">替换</a>
    <a href="javascript:(function(){$('#savedimage{id}').remove();})();">移除</a>
    </span>
   </script>
    <script>

    </script>


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
                <div class="order__date"><?php echo ($order["order_create_at"]); ?></div>
                <div class="order__number">订单号：<?php echo ($order["order_id"]); ?></div>
            </div>
            <div class="order__info pannel">
                <div class="order__img-wrap">
                    <img class="order__img" src="data/upload/<?php echo ($order["ys_avatar"]); ?>" alt=""/>
                </div>
                <div class="order__nurse">
                    <div class="order__nurse-wrap">
                        <div class="order__nurse-a">
                            <span class="order__nurse-text"><?php echo ($order["ys_name"]); ?></span>
                            <span class="order__nurse-text" style="color:#fd5959;"><?php if($order["level"] == 1): ?>一<?php elseif($order["level"] == 2): ?>二<?php elseif($order["level"] == 3): ?>三<?php elseif($order["level"] == 4): ?>四<?php elseif($order["level"] == 5): ?>五<?php else: ?>无<?php endif; ?>星级月嫂</span>
                        </div>
                        <div class="order__nurse-b">
                            <span class="order__nurse-text">价格：<?php echo (number_format($order["price"], 0, '.', '')); ?>元/26天</span>
                            <span class="order__nurse-text"><?php echo ($order["age"]); ?>岁/<?php echo ($order["ys_address"]); ?>/<?php echo ($order["experience"]); ?>年月嫂经验</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="comment pannel">
            <h4 class="comment__title">请填写您宝贵的建议</h4>

            <div class="comment__bd">
                <div class="comment__item-wrap">
                    <div class="comment__item"><span class="comment__k"><i class="comment__icon-k">*</i>综合评分</span>
                        <div class="comment__v" data-star-num="0" id="comprehensive_score">
                            <span class="comment__star"></span><span class="comment__star"></span><span class="comment__star"></span><span class="comment__star"></span><span class="comment__star"></span>
                        </div>
                    </div>
                    <div class="comment__item"><span class="comment__k"><i class="comment__icon-k">*</i>技能评分</span>
                        <div class="comment__v" data-star-num="0" id="skill_score"><span class="comment__star"></span><span class="comment__star"></span><span class="comment__star"></span><span class="comment__star"></span><span class="comment__star"></span></div>
                    </div>
                    <div class="comment__item"><span class="comment__k"><i class="comment__icon-k">*</i>态度评分</span>
                        <div class="comment__v" data-star-num="0" id="attitude_score"><span class="comment__star"></span><span class="comment__star"></span><span class="comment__star"></span><span class="comment__star"></span><span class="comment__star"></span></div>
                    </div>
                </div>
                <textarea class="comment__input" id="content" cols="30" rows="10" placeholder="亲！我们的月嫂都很棒棒噢~"></textarea>




                <!--<div class="uploader">-->
                    <!--<div class="uploader__preview"></div>-->
                    <!--<input id="fileElem" type="file" accept="image/*" style="display:none;" multiple="multiple" onchange="handleFiles(this.files)"/>-->
                    <!--<img class="uploader__select" id="selectElem" src="/themes/simplebootx/Public/assets2/img/user/plus.png" onclick="upload_multi_image('图片上传','#photos','photos-item-wrapper');"/>-->
                <!--</div>-->

                <div class="uploader">
                <ul id="photos" class="pic-list unstyled"></ul>
                <img onclick="upload_multi_image('图片上传','#photos','photos-item-wrapper',5,'');" src="/themes/simplebootx/Public/assets2/img/user/plus.png" style="height:100px;width: 100px;float: left">
                </div>

                <!--<div style="text-align: center;">-->
                    <!--<input type="hidden" name="smeta[thumb]" id="thumb" value="">-->
                    <!--<a href="javascript:upload_one_image('图片上传','#thumb');">-->
                        <!--<img src="/themes/simplebootx/Public/assets/images/default-thumbnail.png" id="thumb-preview" width="135" style="cursor: hand" />-->
                    <!--</a>-->
                            <!--<input type="button" class="btn btn-small" onclick="$('#thumb-preview').attr('src','/themes/simplebootx/Public/assets/images/default-thumbnail.png');$('#thumb').val('');return false;" value="取消图片">-->
                <!--</div>-->




                <div class="comment__input-wrap">
                    <input class="comment__submit" type="button" onclick="eva_post(<?php echo ($order["order_id"]); ?>)" value="提交"/>
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

<script>
    function eva_post(order_id) {

        var comprehensive_score = $('#comprehensive_score').data('star-num');
        var skill_score = $('#skill_score').data('star-num');
        var attitude_score = $('#attitude_score').data('star-num');
        var content=$('#content').val();
        var url=document.getElementsByName('photos_url[]');
        var alt=document.getElementsByName('photos_alt[]');

        if(comprehensive_score==0 || skill_score==0 || attitude_score==0){
            layer.tips('请给我们可爱的月嫂打分噢~', $('#comprehensive_score'), {
                tips: [1, '#000'],
                time: 4000
            });
            return;
        }
        if(url.length>5){
            layer.msg('最多只能上传5张图片噢~');
            return;
        }
        var photos_url=[];
        var photos_alt=[];

        for(i = 0; i < url.length; i++) {
//            alert(url[i].value);
            photos_url.push(url[i].value);
        }

        for(i = 0; i < alt.length; i++) {
//            alert(alt[i].value);
            photos_alt.push(alt[i].value);
        }
//        alert(a);
//        alert("___");
//        alert(b);
//        return;

        $.ajax({
            type: 'POST', //请求类型
            url: "<?php echo U('Order/MemberOrder/evaluatePost');?>", //提交URL地址
            dataType: 'json',   //返回格式
            data:{order_id: order_id,comprehensive_score:comprehensive_score,
                skill_score:skill_score,attitude_score:attitude_score,content:content,
                photos_url:photos_url,photos_alt:photos_alt},  //数据
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
                        location.href = "<?php echo U('Order/MemberOrder/evaluateSuccess');?>";
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