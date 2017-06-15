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
                <!--
                                <div class="log_in_title clearfix">

                                </div>
                -->
                <div class="f">
                    <div class="f__hd log_in_title clearfix">
                        <a class="rborder log_in_title_on"><span>账号登录</span></a>
                        <a class="active log_in_title_on"><span>手机动态密码登录</span></a>
                    </div>


                    <div class="f___bd">


                        <!--手机动态密码登录-->
                        <div class="f__tab">
                            <form class="form-horizontal js-ajax-form" action="<?php echo U('user/login/dologin');?>" method="post">
                            <div class="col-3">
                                <input name="username" placeholder="账号" class="phonenumber effect-11"/>
                                <span class="focus-border">
									<i></i>
								</span>
                            </div>
                            <div class="col-5">
                                <input type="password" name="password" placeholder="密码" class="usercode effect-8" style="width:100%;"/>
                                <span class="focus-border">
									<i></i>
								</span>
                            </div>
                             <div class="span4">
                              <input type="text" id="input_verify" name="verify"  placeholder="验证码" style="width:252px;" required>
                               <?php echo sp_verifycode_img('length=4&font_size=14&width=100&height=34&charset=2345678&use_noise=1&use_curve=0');?>
                                 <span class="focus-border">
									<i></i>
								</span>
                             </div>


                            <div class="fc_reg clearfix">
                                <a class="pull-left" href="<?php echo U('user/login/forgot_password');?>">忘记密码？</a>
                                <a class="pull-right" href="<?php echo leuu('user/register/index');?>">新用户注册</a>
                            </div>
                            <button type="submit">登录</button>
                        </form>
                        </div>



                        <!--账号登录-->
                        <div class="f__tab active">
                            <div class="col-3">
                                <input name="phonenumber" id="phone" placeholder="手机号码" class="phonenumber effect-8"/>
                                <span class="focus-border">
									<i></i>
								</span>
                            </div>
                            <div class="col-4">
                                <input name="code" id="code" placeholder="动态密码" class="code effect-8"/>
                                <span class="focus-border">
									<i></i>
								</span>
                            </div>
                            <div class="get_code" onclick="dy()">获取手机动态密码</div>
                            <div class="fc_reg clearfix">
                                <a class="pull-left" href="<?php echo U('user/login/forgot_password');?>">忘记密码？</a>
                                <a class="pull-right" href="<?php echo leuu('user/register/index');?>">新用户注册</a>
                            </div>
                            <button onclick="code_check()">登录</button>
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
</div>
</body>

<script type="text/javascript">
//全局变量
var GV = {
    ROOT: "/",
    WEB_ROOT: "/",
    JS_ROOT: "public/js/"
};
</script>
   <!-- Placed at the end of the document so the pages load faster -->
   <script src="/public/js/jquery.js"></script>
   <script src="/public/js/wind.js"></script>
   <script src="/themes/simplebootx/Public/assets/simpleboot/bootstrap/js/bootstrap.min.js"></script>
   <script src="/public/js/frontend.js"></script>
<script>
$(function(){
	$('body').on('touchstart.dropdown', '.dropdown-menu', function (e) { e.stopPropagation(); });
	
	$("#main-menu li.dropdown").hover(function(){
		$(this).addClass("open");
	},function(){
		$(this).removeClass("open");
	});
	
	$.post("<?php echo U('user/index/is_login');?>",{},function(data){
		if(data.status==1){
			if(data.user.avatar){
				$("#main-menu-user .headicon").attr("src",data.user.avatar.indexOf("http")==0?data.user.avatar:"<?php echo sp_get_image_url('[AVATAR]','!avatar');?>".replace('[AVATAR]',data.user.avatar));
			}
			
			$("#main-menu-user .user-nicename").text(data.user.user_nicename!=""?data.user.user_nicename:data.user.user_login);
			$("#main-menu-user li.login").show();
			
		}
		if(data.status==0){
			$("#main-menu-user li.offline").show();
		}
		
		/* $.post("<?php echo U('user/notification/getLastNotifications');?>",{},function(data){
			$(".nav .notifactions .count").text(data.list.length);
		}); */
		
	});	
	;(function($){
		$.fn.totop=function(opt){
			var scrolling=false;
			return this.each(function(){
				var $this=$(this);
				$(window).scroll(function(){
					if(!scrolling){
						var sd=$(window).scrollTop();
						if(sd>100){
							$this.fadeIn();
						}else{
							$this.fadeOut();
						}
					}
				});
				
				$this.click(function(){
					scrolling=true;
					$('html, body').animate({
						scrollTop : 0
					}, 500,function(){
						scrolling=false;
						$this.fadeOut();
					});
				});
			});
		};
	})(jQuery); 
	
	$("#backtotop").totop();
	
	
});
</script>


</html>
<script>
    function dy() {
        var mobile  = $("#phone").val();

        $.ajax({
            type: 'GET', //请求类型
            url: "<?php echo U('user/login/dypassword');?>", //提交URL地址
            dataType: 'json',   //返回格式
            data:{mobile:mobile},  //数据
            success: function (data) { //如果成功，执行

                if(data.status==1){
                    layer.open({
                        content: data.message,
                        icon: 2,
                    yes: function () {


                        location.href = "<?php echo leuu('user/register/index');?>";
                    }


                    });
                }else if (data.status != 0) {   //返回状态不为0时，显示对应的错误
                    layer.open({
                        content: data.message,
                        icon: 2,
                    });
                    return;
                }

            },
            error: function (xhr, status) { //如果失败，执行
                console.log(xhr);   //在控制台显示错误的原因以及返回值
                console.log(status);
            }
        });
    }

    function code_check() {
        var code = $("#code").val();
        var mobile = $("#phone").val();

        $.ajax({
            type: 'post', //请求类型
            url: "<?php echo U('user/login/dypassword');?>", //提交URL地址
            dataType: 'json',   //返回格式
            data:{code:code,mobile:mobile},  //数据
            success: function (data) { //如果成功，执行
                if (data.status != 0) {   //返回状态不为0时，显示对应的错误
                    layer.open({
                        content: data.message,
                        icon: 2,
                    });
                    return;
                }
                location.href = "";

            },
            error: function (xhr, status) { //如果失败，执行
                console.log(xhr);   //在控制台显示错误的原因以及返回值
                console.log(status);
            }
        });
    }
</script>