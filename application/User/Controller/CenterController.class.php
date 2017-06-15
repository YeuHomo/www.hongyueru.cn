<?php
namespace User\Controller;

use Common\Controller\MemberbaseController;

class CenterController extends MemberbaseController {
	
	function _initialize(){
		parent::_initialize();
	}
	
    // 会员中心首页
	public function index() {
//
	    $this->assign($this->user);
    	$this->display(':center');
    }

    //修改个人信息
    public function changInfo(){
	    $info = I('post.');
	    $user = session('user');
	    M('users')->where('id='.$user['id'])->save($info);
	    $this->display(':center');
    }



}
