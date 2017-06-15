<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>月嫂预约</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="/public/js/jquery.js"></script>
    <link href="/themes/simplebootx/Public/assets2/css/bootstrap.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/showorder2.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/base.css" rel="stylesheet"/>
    <script src="/themes/simplebootx/Public/assets2/js/lib/jquery/jquery.min.js"></script>
    <script src="/public/js/layer/layer.js"></script>
    <script src="/public/js/laydate/laydate.js"></script>
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
            <p><a href="index.html" style="color:#333;">首页</a> ＞ 月嫂展示&预约 ＞ 月嫂列表 ＞ 月嫂详情 ＞ 月嫂预约</p>
        </div>
        <div class="order">
            <div class="order_list1">
                <div class="order_list1_lump1 clearfix">
                    <a href="showorder.html">返回列表</a>
                    <img src="data/upload/<?php echo ($ys["ys_avatar"]); ?>" width="156" height="156">
                    <h3><?php echo ($ys["ys_name"]); ?></h3>
                    <p class="order_list1_lump1_p2">
                        <?php if($ys["level"] == 1): ?>一
                            <?php elseif($ys["level"] == 2): ?>二
                            <?php elseif($ys["level"] == 3): ?>三
                            <?php elseif($ys["level"] == 4): ?>四
                            <?php elseif($ys["level"] == 5): ?>五
                            <?php else: ?>无<?php endif; ?>星级月嫂</span>星级月嫂</p>
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
                            <td>所在地：<?php echo ($ys["home"]); ?></td>
                            <td>学历：<?php echo ($ys["ys_education"]); ?></td>
                            <td>从业经验：<?php echo ($ys["experience"]); ?>年</td>
                        </tr>
                        <tr>
                            <td>家乡：山东</td>
                            <td>照顾宝宝：32位</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3">证书：高级母婴护理师证、小儿推拿，营养师，产后康复师</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="order_list1_lump3 clearfix">
                    <p class="order_list1_lump3_p">月嫂预订</p>
                    <form class="lump3_form" id="form">
                        <div><label>姓名：</label>
                            <input type="text" name="order_name" id="name"/>
                        </div>
                        <div><label>电话：</label>
                            <input id='mobile' type="text" name="order_mobile"/>
                        </div>
                        <div><label>预定时间：</label>
                            <input onclick="laydate({format: 'YYYY-MM-DD'})" name="order_time" id="time">
                            <span>（服务周期：预定时间后的26天）</span></div>
                        <div><label>地址：</label>
                            <input name="address" id="address"/></div>
                        <div style="display: flex;">
                            <label>附言：</label>
                            <textarea name="leave_message"></textarea>
                        </div>

                    </form>
                    <button onclick="order(<?php echo ($ys["ys_id"]); ?>)">发送预订</button>

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
    function order(ys_id) {

        if($('#name').val()=='' || $('#mobile').val()==''|| $('#time').val()==''|| $('#address').val()==''){
            layer.alert("请输入完整预约信息噢~");
        }


        $.ajax({
            type: 'POST', //请求类型
            url: "<?php echo U('Order/MemberOrder/addOrder',array('ys_id'=>$ys['ys_id']));?>", //提交URL地址
            dataType: 'json',   //返回格式
            data: $('#form').serialize(), //数据
            success: function (data) { //如果成功，执行
                if(data.status != 0){   //返回状态不为0时，显示对应的错误
                    layer.msg(data.message,{icon:5,time: 2000});
                    return;
                }
                layer.msg(data.message, {
                    icon: 1,
                    time: 1000
                }, function() {
                    location.href = "<?php echo U('Order/MemberOrder/allOrder');?>";//成功跳转到页面
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