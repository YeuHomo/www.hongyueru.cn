<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>月嫂预约</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/themes/simplebootx/Public/assets2/css/bootstrap.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/showorder3.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/base.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/swiper.css" rel="stylesheet"/>
    <script src="/themes/simplebootx/Public/assets2/js/lib/jquery/jquery.min.js"></script>
    <script src="/themes/simplebootx/Public/assets2/js/swiper.min.js"></script>
    <script src="/public/js/layer/layer.js"></script>
    <style>
        @media (min-width: 1200px) {
            .container {
                width: 1200px;
            }
        }
        .swiper-container {
            width: 1100px;
            height: 100%;
            margin: 45px auto 86px auto;
        }
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
        }
        .swiper-slide img {
            width: 227px;
            height: 227px;
        }
    </style>
    <!--收藏-->
    <script type="text/javascript">
        var times = 0;
        function change(btn,id) {
            btn.style.background = times % 2 == 0 ? '#ffb696' : 'white';
            times++;
            if(btn.style.background = '#ffb696'){
                $.ajax({
                    type: 'get', //请求类型
                    url: "<?php echo U('Order/MemberMark/favorite');?>", //提交URL地址
                    dataType: 'json',   //返回格式
                    data:{id:id},  //数据
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
                                location.href = "index.php?g=Yuesao&m=MemberYuesao&a=showorder3&ys_id="+id;
                            },
                        });
                    },
                    error: function (xhr, status) { //如果失败，执行
                        console.log(xhr);   //在控制台显示错误的原因以及返回值
                        console.log(status);
                    }
                });
            }
        }
    </script>
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
            <div class="col-md-3 pull-left"> <img src="assets/img/logo2.png" width="279px" height="69px" class="log_content2_img"> </div>
            <div class="pull-right col-md-9">
                <ul class="log_content2_nav">
                    <li style="border:none;width:12%;text-align: right;"><a href="contact.html">联系我们</a></li>
                    <li><a href="about.html">关于我们</a></li>
                    <li class="active"><a href="matching.html">智能匹配月嫂</a></li>
                    <li><a href="showorder.html">月嫂展示&预约</a></li>
                    <li style="width: 12%;"><a href="index.html">首页</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="subnav">
            <p><a href="index.html" style="color:#333;">首页</a> ＞ 月嫂展示&预约 ＞ 月嫂列表 ＞ 月嫂详情</p>
        </div>
        <div class="order">
            <div class="order_list1">
                <div class="order_list1_lump1 clearfix" > <a href="showorder.html">返回列表</a>
                    <img src="data/upload/<?php echo ($ys["ys_avatar"]); ?>" class="news_pic" width="156" height="156">
                    <h3><?php echo ($ys["ys_name"]); ?></h3>
                    <p class="order_list1_lump1_p2"><?php if($ys["level"] == 1): ?>一<?php elseif($ys["level"] == 2): ?>二<?php elseif($ys["level"] == 3): ?>三<?php elseif($ys["level"] == 4): ?>四<?php elseif($ys["level"] == 5): ?>五<?php else: ?>无<?php endif; ?>星级月嫂</span>星级月嫂</p>
                    <p class="order_list1_lump1_p1">价格：<?php echo (number_format($ys["price"], 0, '.', '')); ?>元/26天</p>
                </div>
                <div class="order_list1_lump2 clearfix">
                    <table width="912" border="0" align="center">
                        <tbody>
                        <tr>
                            <th colspan="3" scope="col"><div align="center">基本信息</div></th>
                        </tr>
                        <tr>
                            <td>姓名：<?php echo ($ys["ys_name"]); ?></td>
                            <td>性别：<?php echo ($ys["ys_sex"]); ?></td>
                            <td>年龄：<?php echo ($ys["age"]); ?>岁</td>
                        </tr>
                        <tr>
                            <td>所在地：<?php echo ($ys["ys_home"]); ?></td>
                            <td>学历：<?php echo ($ys["ys_education"]); ?></td>
                            <td>从业经验：<?php echo ($ys["experience"]); ?>年</td>
                        </tr>
                        <tr>
                            <td>家乡：<?php echo ($ys["ys_address"]); ?></td>
                            <td>照顾宝宝：<?php echo ($ys["baby_num"]); ?>位</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3">证书：<?php echo ($ys["certificate"]); ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="order_list1_skill clearfix">
                    <p class="title">掌握技能</p>
                    <table width="775" align="center">
                        <tbody>
                        <tr>
                            <td>基本技能</td>
                            <td>高级技能</td>
                            <td>完全掌握</td>
                            <td>特殊技能</td>
                            <td>完全掌握</td>
                        </tr>
                        <tr>
                            <td>月子餐</td>
                            <td>月子餐</td>
                            <td>√</td>
                            <td>月子餐</td>
                            <td>√</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="order_list1_collect clearfix">
                        <?php if($is_favorite == 1): ?><input name="uncollect" type="button"  class="uncollect" value="收藏" style="background-color: #ffb696" onclick="change(this,'<?php echo ($ys["ys_id"]); ?>')" />
                         <?php else: ?>
                        <input name="uncollect" type="button"  class="uncollect" value="收藏" onclick="change(this,'<?php echo ($ys["ys_id"]); ?>')" /><?php endif; ?>
                    </div>
                </div>
                <div class="evaluate clearfix">
                    <p class="evaluate_title">妈妈点评</p>
                    <ul id="RunTopic" class="clearfix">

                        <?php if(is_array($comment)): foreach($comment as $key=>$vo): ?><li> <img src="data/upload/<?php echo ($vo["avatar"]); ?>" class="RunTopic_img">
                            <div class="RunTopic_content">
                                <?php $user_name=mb_substr($vo['order_name'],0,1); ?>
                                <p class="RunTopic_content_p"><?php echo ($user_name); if($vo["sex"] == 1): ?>女士<?php else: ?>先生<?php endif; ?>
                                    <span><?php echo (date("Y-m-d",strtotime($vo["create_at"]))); ?></span>
                                    <?php echo (substr($vo["order_mobile"],0,3)); ?>****<?php echo (substr($vo["order_mobile"],7)); ?>
                                </p>
                                <span class="RunTopic_content_span"><?php echo ($vo["content"]); ?></span>
                            </div>
                        </li><?php endforeach; endif; ?>
                    </ul>
                </div>
                <div class="order_photo">
                    <p class="photo_title">相册</p>
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="s-highlight"><img src="/themes/simplebootx/Public/assets2/img/showorder/2.png"></div>
                            </div>

                            <?php if(is_array($comment['url'])): foreach($comment['url'] as $key=>$vo): ?><div class="swiper-slide"><img src="<?php echo sp_get_image_preview_url($vo['url']);?>"></div><?php endforeach; endif; ?>
                        </div>
                        <div class="swiper-button-prev" style="background-image: url(/themes/simplebootx/Public/assets2/img/showorder/iconleft.png);"></div>
                        <div class="swiper-button-next" style="background-image: url(/themes/simplebootx/Public/assets2/img/showorder/iconright.png)"></div>
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
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 30,
        prevButton: '.swiper-button-prev',
        nextButton: '.swiper-button-next'
    });
</script>

<!--
<script>
	new Swiper('.swiper-container', {
		prevButton: 's-prevButton',
		nextButton: 's-nextButton'
	});
</script>
-->
</html>