<?php

namespace Member\Controller;



use Common\Controller\AdminbaseController;

class MemberController extends AdminbaseController {

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

        $where = 'is_del=1';
        if(IS_POST){
            $name = I('post.k_name');
            $mobile = I('post.k_mobile');

            if($name !="" && $mobile !=""){
                $where = $where." AND ys_name='".$name."' OR mobile=".$mobile;
            }else {
                if ($name != '') {
                    $where = $where . " AND ys_name='" . $name . "'";
                }
                if ($mobile != "") {
                    $where = $where . " AND mobile=" . $mobile;
                }
            }
        }
        $ys = M('yuesao')->where($where)->select();
        $this->assign('ys',$ys);
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


}