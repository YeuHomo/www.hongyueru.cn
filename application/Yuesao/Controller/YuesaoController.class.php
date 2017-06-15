<?php

namespace Yuesao\Controller;



use Common\Controller\AdminbaseController;

class YuesaoController extends AdminbaseController {


    public function index(){
        $this->display();
    }

    public function add(){
        $this->display();
    }

    public function add_post(){

       if(IS_POST){
           $info = I('post.');
           $info['is_del']=1;


//           var_dump($info);
//           die();

           //根据出生时间计算年纪
           $birthday=getDate(strtotime($info['birth']));
           $now=getDate();
           $month=0;
           if($now['month']>$birthday['month']) {
               $month = 1;
           }
           if($now['month']==$birthday['month']) {
               if ($now['mday'] >= $birthday['mday']) {
                   $month = 1;
               }
           }
           $info['age'] = $now['year'] - $birthday['year'] + $month;
           $info['is_recommend'] = 0;
           $result = M('yuesao')->add($info);

           $find = M('yuesao')->where("ys_name='".$info['ys_name']."' AND birth='".$info['birth']."'")->find();

           //相册
           $img =  M('yuesao_images');
//           $img->yuesao_id = $info[''];
//           $result1 =->add($info['photos_url']);

           if(!empty($_POST['photos_alt']) && !empty($_POST['photos_url'])){
               foreach ($_POST['photos_url'] as $key=>$url){
                   $photourl=sp_asset_relative_url($url);
                   $result=$img->add(array("yuesao_id"=>$find['ys_id'],"images"=>$photourl));
               }
           }

           if($result){
               $this->success('添加成功！');
           }else{
               $this->error('添加失败！');
           }

       }
    }

    public function ys_list(){

        $where='is_del=1';
        $request=I('request.');
        $order = "";

        if(!empty($_GET['type'])){
            $type = $_GET['type'];
            $sort = $_GET['sort'];
            $order = $type.' '.$sort;
        }

        //搜索关键字
        if(!empty($request['keyword'])){
            $keyword=$request['keyword'];
//            $keyword_complex=array();
//            $keyword_complex['ys_name']  = array('like',"%$keyword%");
//            $keyword_complex['mobile']  = array('like',"%$keyword%");
//            $keyword_complex['_logic'] = 'or';
//            $where['_complex'] = $keyword_complex;
//
            $where = $where." AND ys_name like '%".$keyword."%' OR mobile like '%".$keyword."%'";
        }

        //年纪筛选
        if(!empty($request['age_start'])){

            $where = $where." AND age BETWEEN ".$request['age_start']." AND ".$request['age_end'];
        }
        //等级筛选
        if(!empty($request['level_start'])){
            $where = $where." AND level BETWEEN ".$request['level_start']." AND ".$request['level_end'];
        }

        //照顾宝宝数量筛选
        if(!empty($request['num_start'])){
            $where = $where." AND baby_num BETWEEN ".$request['num_start']." AND ".$request['num_end'];
        }

        $users_model=M("yuesao");

        $count=$users_model->where($where)->count();
        $page = $this->page($count, 5);

        if(IS_POST){

        }
        $list = $users_model
            ->where($where)
            ->order($order)
            ->limit($page->firstRow . ',' . $page->listRows)
            ->select();

        $this->assign('ys', $list);
        $this->assign("page", $page->show('Admin'));

        $this->display();

    }

    public function detail(){
        $ys_id = I('get.ys_id');

        $ys = M('yuesao')
            ->where('ys_id='.$ys_id)->find();
        $this->assign('ys',$ys);

        $ys_img = M('yuesao_images')->where('yuesao_id='.$ys_id)->select();
        $this->assign('ys_img',$ys_img);

        $this->display();
    }

    public function edit(){
        $ys_id = I('get.ys_id');

        $ys = M('yuesao')
            ->where('ys_id='.$ys_id)->find();

        $this->assign('ys',$ys);

        $ys_img = M('yuesao_images')->where('yuesao_id='.$ys_id)->select();
        $this->assign('ys_img',$ys_img);

        $this->display();
    }

    public function edit_post(){

        if(IS_POST){
            $info = I('post.');
            $info['is_del']=1;

//            var_dump($info);
//            die();

            $birthday=getDate(strtotime($info['birth']));
            $now=getDate();
            $month=0;
            if($now['month']>$birthday['month']) {
                $month = 1;
            }
            if($now['month']==$birthday['month']) {
                if ($now['mday'] >= $birthday['mday']) {
                    $month = 1;
                }
            }
            $info['age'] = $now['year'] - $birthday['year'] + $month;
            $result = M('yuesao')->where('ys_id='.$info['ys_id'])->save($info);

            $img =  M('yuesao_images');
            $ys_img =$img->where('yuesao_id='.$info['ys_id'])->delete();

            if(!empty($_POST['photos_alt']) && !empty($_POST['photos_url'])){
                foreach ($_POST['photos_url'] as $key=>$url){
                    $photourl=sp_asset_relative_url($url);
                    $result=$img->add(array("yuesao_id"=>$info['ys_id'],"images"=>$photourl));
                }
            }

            if($result){
                $this->success('添加成功！');
            }else{
                $this->error('添加失败！');
            }
        }
    }

    public function delete(){
        if(isset($_GET['ys_id'])){
            $id = I("get.ys_id",0,'intval');
            if (M('yuesao')->where(array('ys_id'=>$id))->save(array('is_del'=>0)) !==false) {
                $this->success("删除成功！");
            } else {
                $this->error("删除失败！");
            }
        }

        if(isset($_POST['ids'])){
            $ids = I('post.ids/a');
            if (M('yuesao')->where(array('ys_id'=>array('in',$ids)))->save(array('is_del'=>0))!==false) {
                $this->success("删除成功！");
            } else {
                $this->error("删除失败！");
            }
        }
    }

    public function recommend(){
        $id = $_GET['id'];
        $status = $_GET['status'];

        if($id) {
            if ($status == 0) {
                $result = M('yuesao')->where('ys_id=' . $id)->save(array('is_recommend'=>1));
                if($result){
                    setJson(0,'推荐成功！');
                }else{
                    setJson(1,'推荐失败，请重试！');
                }
            }
            if ($status == 1) {
                $result = M('yuesao')->where('ys_id=' . $id)->save(array('is_recommend'=>0));
                if($result){
                    setJson(0,'取消推荐成功！');
                }else{
                    setJson(1,'取消推荐失败，请重试！');
                }
            }
            if ($status == 2) {
                $result = M('yuesao')->where('ys_id=' . $id)->save(array('is_top'=>1));
                if($result){
                    setJson(0,'置顶成功！');
                }else{
                   setJson(1,'置顶失败，请重试！');
                }
            }
            if ($status == 3) {
                $result = M('yuesao')->where('ys_id=' . $id)->save(array('is_top'=>0));
                if($result){
                    setJson(0,'取消置顶成功！');
                }else{
                    setJson(1,'取消置顶失败，请重试！');
                }
            }
            if ($status == 4) {
                $result = M('yuesao')->where('ys_id=' . $id)->save(array('is_checked'=>1));
                if($result){
                    setJson(0,'审核成功！');
                }else{
                    setJson(1,'审核失败，请重试！');
                }
            }
            if ($status == 5) {
                $result = M('yuesao')->where('ys_id=' . $id)->save(array('is_checked'=>0));
                if($result){
                    setJson(0,'取消审核成功！');
                }else{
                    setJson(1,'取消审核失败，请重试！');
                }
            }
        }
    }

    // 批量审核
    public function check(){
        if(isset($_POST['ids']) && $_GET["check"]){
            $ids = I('post.ids/a');

            if ( M('yuesao')->where(array('ys_id'=>array('in',$ids)))->save(array('is_checked'=>1)) !== false ) {
                $this->success("审核成功！");
            } else {
                $this->error("审核失败！");
            }
        }
        if(isset($_POST['ids']) && $_GET["uncheck"]){
            $ids = I('post.ids/a');

            if ( M('yuesao')->where(array('ys_id'=>array('in',$ids)))->save(array('is_checked'=>0)) !== false) {
                $this->success("取消审核成功！");
            } else {
                $this->error("取消审核失败！");
            }
        }
    }

    // 批量置顶
    public function top(){
        if(isset($_POST['ids']) && $_GET["top"]){
            $ids = I('post.ids/a');

            if ( M('yuesao')->where(array('ys_id'=>array('in',$ids)))->save(array('is_top'=>1))!==false) {
                $this->success("置顶成功！");
            } else {
                $this->error("置顶失败！");
            }
        }
        if(isset($_POST['ids']) && $_GET["untop"]){
            $ids = I('post.ids/a');

            if ( M('yuesao')->where(array('ys_id'=>array('in',$ids)))->save(array('is_top'=>0))!==false) {
                $this->success("取消置顶成功！");
            } else {
                $this->error("取消置顶失败！");
            }
        }
    }

    // 批量推荐
    public function recommended(){
        if(isset($_POST['ids']) && $_GET["recommend"]){
            $ids = I('post.ids/a');

            if ( M('yuesao')->where(array('ys_id'=>array('in',$ids)))->save(array('is_recommend'=>1))!==false) {
                $this->success("推荐成功！");
            } else {
                $this->error("推荐失败！");
            }
        }
        if(isset($_POST['ids']) && $_GET["unrecommend"]){
            $ids = I('post.ids/a');

            if ( M('yuesao')->where(array('ys_id'=>array('in',$ids)))->save(array('is_recommend'=>0))!==false) {
                $this->success("取消推荐成功！");
            } else {
                $this->error("取消推荐失败！");
            }
        }
    }

}