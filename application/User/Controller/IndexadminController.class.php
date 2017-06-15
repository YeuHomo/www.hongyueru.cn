<?php
namespace User\Controller;

use Common\Controller\AdminbaseController;

class IndexadminController extends AdminbaseController {
    
    // 后台本站用户列表
    public function index(){
        $where=array();
        $request=I('request.');
        
        if(!empty($request['uid'])){
            $where['id']=intval($request['uid']);
        }
        
        if(!empty($request['keyword'])){
            $keyword=$request['keyword'];
            $keyword_complex=array();
            $keyword_complex['user_login']  = array('like', "%$keyword%");
            $keyword_complex['user_nicename']  = array('like',"%$keyword%");
            $keyword_complex['user_email']  = array('like',"%$keyword%");
            $keyword_complex['mobile']  = array('like',"%$keyword%");
            $keyword_complex['_logic'] = 'or';
            $where['_complex'] = $keyword_complex;
        }
        
    	$users_model=M("Users");
    	
    	$count=$users_model->where($where)->count();
    	$page = $this->page($count, 20);
    	
    	$list = $users_model
    	->where($where)
    	->order("create_time DESC")
    	->limit($page->firstRow . ',' . $page->listRows)
    	->select();
    	
    	$this->assign('list', $list);
    	$this->assign("page", $page->show('Admin'));
    	
    	$this->display(":index");
    }
    
    // 后台本站用户禁用
    public function ban(){
    	$id= I('get.id',0,'intval');
    	if ($id) {
    		$result = M("Users")->where(array("id"=>$id,"user_type"=>2))->setField('user_status',0);
    		if ($result) {
    			$this->success("会员拉黑成功！", U("indexadmin/index"));
    		} else {
    			$this->error('会员拉黑失败,会员不存在,或者是管理员！');
    		}
    	} else {
    		$this->error('数据传入失败！');
    	}
    }
    
    // 后台本站用户启用
    public function cancelban(){
    	$id= I('get.id',0,'intval');
    	if ($id) {
    		$result = M("Users")->where(array("id"=>$id,"user_type"=>2))->setField('user_status',1);
    		if ($result) {
    			$this->success("会员启用成功！", U("indexadmin/index"));
    		} else {
    			$this->error('会员启用失败！');
    		}
    	} else {
    		$this->error('数据传入失败！');
    	}
    }

    public function detail(){

        $id= I('get.id',0,'intval');
        if ($id) {
            $result = M("Users")->where(array("id"=>$id,"user_type"=>2))->find();
            $this->assign('user',$result);
            $this->display();
        } else {
            $this->error('未获得id！');
        }
    }

    public function listOrder(){

        $id= I('get.id',0,'intval');
        if($id != '') {
            session('user_id', $id);
        }
        $id = session('user_id');
        $where = 'ys_order.is_del=1 AND user_id='.$id;
        if(IS_POST){
            $start_time = I('post.start_time');
            $end_time = I('post.end_time');
            $order_id = I('post.keyword');

            if ($order_id == '') {
                if ($start_time != "" || $end_time != "") {
                    $where = $where . " AND create_at BETWEEN '" . $start_time . "' AND '" . $end_time."'";
                }
            }

            if (is_numeric($order_id)) {
                $where = $where." AND order_id=".$order_id;
            }
        }

        if ($id) {
            $result = M("order")
                ->join('ys_users ON ys_order.user_id=ys_users.id')
                ->join('ys_yuesao ON ys_order.yuesao_id=ys_yuesao.ys_id')
                ->order('create_at desc')
                ->where($where)
                ->select();

            $this->assign('order',$result);
            $this->display();
        } else {
            $this->error('未获得id！');
        }

    }
}
