<?php

namespace Yuesao\Controller;
use Common\Controller\MemberbaseController;

class MemberYuesaoController extends MemberbaseController {

    public function index(){
//        echo "123";
//            echo sp_password('123456');
//            exit;

    }

    public function showorder(){

        //显示月嫂人数
        $count=M('yuesao')->where("ys_home='杭州'")->count();
        $ys=M('yuesao')->where("is_recommend=1 and is_checked=1 and is_top=1 and ys_home='杭州'")->limit(3)->select();
        $this->assign('ys',$ys);
        $this->assign('count',$count);


        //显示评论
        $comment=M('comment')
            ->join('ys_users ON ys_comment.user_id=ys_users.id')
            ->join('ys_yuesao ON ys_comment.yuesao_id=ys_yuesao.ys_id')
            ->join('ys_order ON ys_order.order_id=ys_comment.order_id')
            ->where("length(content)>5")
            ->select();
//        var_dump($comment);
//        die();
        $this->assign('comment',$comment);

        $this->display();
    }

    public function yuesaoList(){

        $ys=M('yuesao')->where('is_del=1')->select();
        $this->assign('ys',$ys);
        $this->display();
    }

    public function yuesaoDetail(){
        $ys_id=$_GET['ys_id'];
        $ys=M('yuesao')->where('ys_id='.$ys_id)->find();


        static $id=1;
        $thisurl="index.php?g=Yuesao&m=MemberYuesao&a=showorder3&ys_id=".$ys['ys_id'];
        cookie_history($id,$ys['ys_avatar'],$ys['ys_id'],$ys['ys_name'],$ys['level'],$ys['price'],$ys['age'],$ys['ys_home'],$ys['experience'],$ys['introduce'],$thisurl);
        $id++;



        $this->assign('ys',$ys);
        $this->display();
    }

    public function showorder3(){

        $user = session('user');
        $ys_id = $_GET['ys_id'];
        $is_favorite = 0;

        $ys = M('yuesao')
            ->where('ys_id='.$ys_id)
            ->find();
        $this->assign('ys',$ys);
//        var_dump($ys);
//        die();

        $comment = M('comment')
            ->join('ys_order ON ys_order.yuesao_id=ys_comment.yuesao_id')
            ->join('ys_users ON ys_users.id=ys_comment.user_id')
            ->where('ys_comment.yuesao_id='.$ys_id)
            ->select();
        $this->assign('comment',$comment);
//        var_dump($comment);
//        die();

        $fa = M('favorite')
            ->where('yuesao_id='.$ys_id.' AND user_id='.$user['id'])
            ->find();
        if($fa){
            $is_favorite = 1;
        }
//        var_dump($is_favorite);
//        die();


        $this->assign('is_favorite',$is_favorite);
        $this->display();
    }

}