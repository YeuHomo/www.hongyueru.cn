<?php

namespace Order\Controller;

use Common\Controller\AdminbaseController;

class AdminOrderController extends AdminbaseController {

    public function index()
    {
        $order = M('order')->join('ys_users ON ys_order.user_id=ys_users.id')
            ->join('ys_yuesao ON ys_order.yuesao_id=ys_yuesao.ys_id')
            ->where('ys_order.is_del=1')
            ->order('order_create_at desc');

        return $order;
    }

    public function find(){

        $where = 'ys_order.is_del=1';
        if(IS_POST) {
            //获取时间
            $sta_con = I('post.start_confinement');
            $end_con = I('post.end_confinement');

            $sta_ser = I('post.start_serve');
            $end_ser = I('post.end_serve');
            $type = $_GET['type'];

            //判断是否有状态
            if($type != ''){
                $where = $where." AND order_status=".$type;
            }


            if(strtotime($sta_ser)>strtotime($end_ser)){
                $a = $sta_ser;
                $sta_ser = $end_ser;
                $end_ser = $a;
            }

            //加到$where中
            if($sta_con !='' || $end_con !=''){

                if($end_con ==''){
                    $end_con = date("Y-m-d",strtotime("+265 day",time()));
                }
                if($sta_con ==''){
                    $sta_con = date('Y-m-d');
                }

                //开始时间比结束时间早
                if(strtotime($sta_con)>strtotime($end_con)){
                    $a = $sta_con;
                    $sta_con = $end_con;
                    $end_con = $a;
                }

                $where = $where." AND start_confinement BETWEEN '".
                    $sta_con."' AND '".$end_con.
                    "' AND end_confinement BETWEEN '".$sta_con."' AND '".$end_con."'";
            }

            if($sta_ser !='' && $end_ser !=''){
                $where = $where." AND start_serve BETWEEN '".
                    $sta_ser."' AND '".$end_ser.
                    "' AND end_serve BETWEEN '".$sta_ser."' AND '".$end_ser."'";
            }
            $this->assign('sta_con',$sta_con);
            $this->assign('end_con',$end_con);
            $this->assign('sta_ser',$sta_ser);
            $this->assign('end_ser',$end_ser);

        }

        //分页
        $count= $this->index()->where($where)->count();
        $page = $this->page($count, 1);
        $this->assign("page", $page->show('Admin'));

        $order = $this->index()->where($where)->limit($page->firstRow . ',' . $page->listRows);
        return $order;
    }

    public function orderList(){
        if(IS_POST){
            $list = $this->find()->select();
        }else {
            $list = $this->index()->select();
        }
        $this->assign('list',$list);
        $this->display();
    }

    //待付定金订单
    public function depositList(){
        if(!IS_POST) {
            $list = $this->index()->where('order_status=1 and ys_order.is_del=1')->select();
        }
        else{
            $list = $this->find()->select();
        }
        $this->assign('list',$list);
        $this->display();
    }

    //待付余款订单
    public function balanceList(){
        if(IS_POST){
            $list = $this->find()->select();
        }else {
            $list  = $this->index()->where('order_status=2 and ys_order.is_del=1')->select();
        }


        $this->assign('list',$list);
        $this->display();
    }

    //待评价订单
    public function evaluateList(){
        if(IS_POST){
            $list = $this->find()->select();
        }else {
            $list  = $this->index()->where('order_status=3 and ys_order.is_del=1')->select();
        }
        $this->assign('list',$list);
        $this->display();
    }

    //已完成订单
    public function finishList(){
        if(IS_POST){
            $list = $this->find()->select();
        }else {
            $list  = $this->index()->where('order_status=4 and ys_order.is_del=1')->select();
        }
        $this->assign('list',$list);
        $this->display();
    }

    //已关闭订单
    public function closeList(){
        if(IS_POST){
            $list = $this->find()->select();
        }else {
            $list  = $this->index()->where('order_status=0 and ys_order.is_del=1')->select();
        }

        $this->assign('list',$list);
        $this->display();
    }

    //订单详情
    public function detail(){

        $order_id = I('get.order_id');

        $order = M('order')->join('ys_users ON ys_order.user_id=ys_users.id')
            ->join('ys_yuesao ON ys_order.yuesao_id=ys_yuesao.ys_id')
            ->order('order_create_at desc')
            ->where('order_id='.$order_id)
            ->find();
        $this->assign('order',$order);

        $comment = M('comment')->join('ys_users ON ys_comment.user_id=ys_users.id')
            ->join('ys_yuesao ON ys_comment.yuesao_id=ys_yuesao.ys_id')
            ->join('ys_order ON ys_comment.order_id=ys_order.order_id')
            ->where('ys_comment.order_id='.$order_id)
            ->select();

        $this->assign('comment',$comment);

       $this->display();
    }

    //删除订单
    public function delete(){
        $order_id = I('get.id');
        $Order = M('order');
        $Order->is_del = 0;
        if(isset($_GET['id'])) {

            $is_del = $Order->where('order_id=' . $order_id)->save();
            if(!$is_del){
                $this->setJson(1,'删除失败，请重试!');
            }
            $this->setJson(0,'删除成功');
        }


        if(isset($_POST['ids'])) {
            $ids = I('post.ids');
            $ids_explode = implode(',',$ids);
//            var_dump($ids_explode);
            $result = $Order->where('order_id in('.$ids_explode.')')->save();
            if ($result) {
                $this->success('删除成功');
            } else {
                $this->error('删除失败，请重试!');
            }
        }

    }

    //根据日期搜索订单
//    public function findList(){
//
//        $start_time = I('post.start_time');
//        $end_time = I('post.end_time');
//        $order_id = I('post.keyword');
//        $type = $_GET['type'];
//
//        if($type==''){
//            $find = $this->index()->where("is_del=1 AND create_at BETWEEN '".$start_time."' AND '".$end_time."' OR order_id='".$order_id."'")->select();
//        }else {
//            $find = $this->index()->where("is_del=1 AND order_status=" . $type . " AND create_at BETWEEN '" . $start_time . "' AND '" . $end_time . "' OR order_id='" . $order_id."'")->select();
//        }
//
//        if(!$find){
//            $this->setJson(1,'无结果，请重新搜索！');
//        }
//
//        $this->assign('find',$find);
//        $this->display();
//    }

    public function edit(){
        $order_id = I('post.order_id');
        if($order_id !=''){
            session('order_id',$order_id);
        }else{
            $order_id=session('order_id');
        }

        $order = M('order')->join('ys_users ON ys_order.user_id=ys_users.id')
            ->join('ys_yuesao ON ys_order.yuesao_id=ys_yuesao.ys_id')
            ->order('order_create_at desc')
            ->where('order_id='.$order_id)->find();

        $ys = M('yuesao')->where('is_del=1')->select();
        $this->assign('ys',$ys);

        $this->assign('order',$order);
        $this->display();
    }

    public function edit_post(){
        $edit = I('post.');

        //获取原订单信息
        $old_order = M('order')->where('order_id='.$edit['order_id'])->find();


        //获取修改的月嫂信息
        $ys = M('yuesao')->where('ys_id='.$edit['ys_id'])->find();

        //余款 = 新的月嫂价格 - 已付定金
        $balance = $ys['price'] - $old_order['deposit'];

        //修改数据库中的数据
        $result = M('order')->where('order_id='.$edit['order_id'])
            ->save(array('yuesao_id'=>$edit['ys_id'],'order_time'=>$edit['order_time'],
            'address'=>$edit['address'],'leave_message'=>$edit['leave_message'],'balance'=>$balance,
                'start_serve'=>$edit['start_serve'],'end_serve'=>$edit['end_serve']));

        //返回结果
        if($result){
            $this->success('修改成功');
        }else{
            $this->error('修改失败，请重试！');
        }
    }
}