<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>新用户注册</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/themes/simplebootx/Public/assets2/css/bootstrap.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/register.css" rel="stylesheet"/>
    <link href="/themes/simplebootx/Public/assets2/css/base.css" rel="stylesheet"/>
    <script src="/themes/simplebootx/Public/assets2/js/lib/jquery/jquery.min.js"></script>
    <script src="/themes/simplebootx/Public/assets2/js/login/mobilelog.js"></script>
    <script src="/public/js/layer/layer.js"></script>
    <style>
        @media (min-width: 1200px) {
            .container {
                width: 1200px;
            }
        }
    </style>
</head>

<body>
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
                <li><a href="showorder.html">月嫂展示&预约</a></li>
                <li style="width: 12%;" class="active"><a href="index.html">首页</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="log_bgcolor">
    <div class="container">
        <div class="log_in clearfix">
            <img src="/themes/simplebootx/Public/assets2/img/login/1.png" class="pull-left">
            <div class="pull-right">
                <div class="f">
                    <div class="f__hd log_in_title clearfix">
                        <h3 style="padding-left:50px;font-size:20px;color:#000；">新用户注册</h3>
                    </div>
                    <div class="f___bd">
                        <!--新注册用户-->
                        <div class="f__tab clearfix">
                            <form class="form-horizontal js-ajax-form" action="<?php echo U('user/register/doregister');?>" method="post">
                                <div class="col-3">
                                    <input name="mobile" id="mobile" type="text" placeholder="手机号码" class="phonenumber effect-8"/>
                                    <span class="focus-border">
										<i></i>
									</span>
                                </div>
                                <div class="col-5">
                                    <input name="password" type="password" placeholder="密码" class="usercode effect-8" style="width:100%;"/>
                                    <span class="focus-border">
										<i></i>
									</span>
                                </div>
                                <div class="col-4">
                                    <input name="code" type="text" placeholder="动态密码" class="code effect-8"/>
                                    <span class="focus-border">
										<i></i>
									</span>
                                </div>
                                <div class="btn btn-success" id="btn" onclick="getCode()">获取手机动态密码</div>
                                <div class="fc_reg clearfix">
                                    <input type="checkbox" class="agree"/>
                                    <p class="agree_word">同意并阅读<a href="agreement.html">《用户服务使用协议》</a></p>
                                </div>
                                <a class="skip_log pull-right" href="<?php echo U('user/login/index');?>">已有账号？　登录＞＞</a>
                                <button disabled id="btnRegister">注册</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="foot" style="border-top:1px solid transparent">
    <div class="container">
        <footer class="g-footer">
            <div class="g-footer__wrap">
                <div class="g-footer__a">
                    <p class="g-footer__text">公司地址：杭州市拱墅区祥园路88号智慧信息产业园M座10楼</p>
                    <hr style="margin: 10px 0;"/>
                    <p class="g-footer__text">联系电话：0571-56624893　　　版权所有：XXX</p>
                </div>
                <div class="g-footer__b"><img class="g-footer__logo" src="/themes/simplebootx/Public/assets2/img/logo.png" alt=""/></div>
                <div class="g-footer__c">
                    <hr style="margin-top:4px;"/>
                    <p class="g-footer__slogan">“以敬天之心事人，以求道之心做事”</p>
                </div>
            </div>
        </footer>
    </div>
</div>
<script>
    var i = 60;
    function remainTime(){
        $("#btn").attr("disabled", true);
        if(i==0){
            $("#btn").attr("disabled", false);
            $('#btn').html("获取手机动态密码");
            i = 60;
            return;
        }
        $('#btn').html(i-- +"s后重发校验码");
        setTimeout("remainTime()",1000);
    }


    function getCode() {
        var mobile  = $("#mobile").val();

        $.ajax({
            type: 'GET', //请求类型
            url: "<?php echo U('user/register/getcode');?>", //提交URL地址
            dataType: 'json',   //返回格式
            data:{mobile:mobile},  //数据
            success: function (data) { //如果成功，执行

                if(data.status != 0){
                    layer.open({
                        content: data.message,
                        icon: 2,
                    });
                    return;
                }
                if (data.status == 0) {   //返回状态不为0时，显示对应的错误
                    layer.open({
                        content: data.message,
                        icon: 3,
                    });
                    remainTime();
                }

            },
            error: function (xhr, status) { //如果失败，执行
                console.log(xhr);   //在控制台显示错误的原因以及返回值
                console.log(status);
            }
        });
    }

</script>
</body>

</html>