<?php

namespace Order\Controller;

use Common\Controller\MemberbaseController;

class MemberOrderController extends MemberbaseController {

    public function index(){
        $order_id = $_GET['id'];
        $order = M('order')
            ->where('order_id='.$order_id)
            ->join('ys_yuesao ON ys_order.yuesao_id=ys_yuesao.ys_id')
            ->find();
        return $order;
    }

    //新增订单
    public function addOrder(){
        $ys_id = $_GET['ys_id'];
        if(IS_POST) {
            $order = I('post.');
            $ys=M('yuesao')->where('ys_id='.$ys_id)->find();
            $order['yuesao_id']=$ys_id;
            $user = session('user');

            $id=date('YmdHis').$ys_id.rand(10,99).$user['id'];
            $order['order_id']=$id;
            $order['user_id']=$user['id'];
            $order['deposit']=$ys['price']/10;
            $order['balance']=$ys['price']/10*9;
            $order['is_del']=1;
            $order['order_create_at']=date('Y-m-d');
            $order['order_status']=1;
            $time=$order['order_time'];
            $order['start_serve']=$time;
            $time=strtotime($time);
            $order['end_serve']=date("Y-m-d",strtotime("+26 day",$time));
            $result = M('order')->add($order);
            if($result){
                setJson(0,'预约成功！');
            }else{
                setJson(1,'预约失败，请重试！');
            }
        }
    }

    //显示所有订单
    public function allOrder(){

        $type = $_GET['type'];
        $user = session('user');
        $where='user_id=' . $user['id'] . ' AND ys_order.is_del=1';
        session('type',$type);


        if($type != 0) {
            $where=$where.' AND order_status=' . $type;
        }
            $count = M('order')
                ->join('ys_yuesao ON ys_order.yuesao_id=ys_yuesao.ys_id')
                ->where($where)
                ->count();

            $page = $this->page($count, 5);

            $order = M('order')
                ->join('ys_yuesao ON ys_order.yuesao_id=ys_yuesao.ys_id')
                ->where($where)
                ->order('order_create_at desc')
                ->limit($page->firstRow . ',' . $page->listRows)
                ->select();
//        var_dump($order);
//        die();

            $this->assign("page", $page->show('Admin'));
            $this->assign('order', $order);
            $this->display();
    }

    //跳转到评价页面
    public function evaluateAction(){
        $order =$this->index();
        $this->assign('order',$order);
        $this->display();
    }

    //提交评价
    public function evaluatePost(){

        $comment = I('post.');
        $order =  M('order')->where('order_id='.$comment['order_id'])->find();

        if($order['order_status']!=3){
            setJson(2,'订单已评价，请刷新~');
        }
        $comment['user_id']=$order['user_id'];
        $comment['yuesao_id']=$order['yuesao_id'];
        $comment['order_id']=$order['order_id'];
        $comment['create_at']=date('Y-m-d H:i:s');


        if(!empty($comment['photos_alt']) && !empty($comment['photos_url'])){
            foreach ($comment['photos_url'] as $key=>$url){
                $photourl=sp_asset_relative_url($url);
                $comment['images'][]=array("url"=>$photourl);
            }
        }

        $comment['images']=json_encode($comment['images']);
        $result = M('comment')->add($comment);
        if($result){
            $order['order_status']=4;
            M('order')->where('order_id='.$comment['order_id'])->save($order);
            setJson(0,'提交评价成功！');
        }else{
            setJson(1,'提交失败，请重试！');
        }


    }

    //评价成功
    public function evaluateSuccess(){
        $this->display();
    }

    //查看评价
    public function evaluateDetail(){
        $order_id = $_GET['id'];
        $comment = M('comment')
            ->join('ys_yuesao ON ys_comment.yuesao_id=ys_yuesao.ys_id')
            ->join('ys_order ON ys_comment.order_id=ys_order.order_id')
            ->where('ys_comment.order_id='.$order_id)
            ->find();

//        $comment_img = $comment['images'];
        $comment_img = json_decode($comment['images'],true);
//        var_dump( $comment);
//        die();

        $this->assign("comment_img",$comment_img);
//        $this->assign('comment_img',$comment_img);
        $this->assign('comment',$comment);
        $this->display();
    }

    //查看详情
    public function orderDetail(){
        $order = $this->index();
        $this->assign('order',$order);
        $this->display();
    }

    //取消订单
    public function orderDel(){
        $order_id = I('get.id');
        $Order = M('order');
        $order = $Order->where('order_id=' . $order_id)->find();
//        if($order['order_status']==1){
//            //直接关闭
//        } else if($order['order_status']==2){
//            //退定金
//            $this->setJson(2,'退款中，请稍等');
//        }
        $Order->order_status=0;
        $result = $Order->where('order_id=' . $order_id)->save();

        if($result){
            setJson(0,'订单已关闭!');
        }else{
            setJson(1,'删除失败，请重试!');
        }
    }

    //跳转到支付页面
    public function orderDepositPay(){
        $order = $this->index();
        $this->assign('order',$order);
        $this->display();
    }
}