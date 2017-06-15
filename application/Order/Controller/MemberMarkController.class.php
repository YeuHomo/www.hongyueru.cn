<?php

namespace Order\Controller;

use Common\Controller\MemberbaseController;

class MemberMarkController extends MemberbaseController {


    public function index(){
        echo sp_password('123456');
        exit;
        $this->display(":index");
    }

    public function my_mark(){

        $user=session('user');
        $favorite = M('favorite')->join('ys_yuesao ON ys_favorite.yuesao_id=ys_yuesao.ys_id')->where('user_id='.$user['id'])->select();

        $count=count($favorite);
//        var_dump($count);
//        die();

        $this->assign('favorite',$favorite);
        $this->display();

    }

    public function delMark(){
        $id=$_GET['id'];
        $result=M('favorite')->where('id='.$id)->delete();
        if($result){
            $this->setJson(0,'删除成功');
        }else{
            $this->setJson(1,'删除失败，请重试！');
        }

    }

    public function favorite(){
        $id=$_GET['id'];
        $user = session('user');
        $favorite = [];
        $favorite['user_id'] = $user['id'];
        $favorite['yuesao_id']=$id;
        $result=M('favorite')->add($favorite);

        if($result){
            $this->setJson(0,'收藏月嫂成功');
        }else{
            $this->setJson(1,'收藏失败，请重试！');
        }

    }





    //这是一个关于足迹的故事
    /**
    +----------------------------------------------------------
     * 浏览记录按照时间排序
    +----------------------------------------------------------
     */
    function my_sort($a, $b){
        $a = substr($a,1);
        $b = substr($b,1);
        if ($a == $b) return 0;
        return ($a > $b) ? -1 : 1;
    }
    /**
    +----------------------------------------------------------
     * 网页浏览记录生成
    +----------------------------------------------------------
     */
    function cookie_history($id,$avatar,$ys_id,$name,$level,$price,$age,$home,$experience,$introduce,$url){

        $dealinfo['ys_avatar'] = $avatar;
        $dealinfo['ys_id'] = $ys_id;
        $dealinfo['ys_name'] = $name;
        $dealinfo['level'] = $level;
        $dealinfo['price'] = $price;
        $dealinfo['age'] = $age;
        $dealinfo['ys_home'] = $home;
        $dealinfo['experience'] = $experience;
        $dealinfo['introduce'] = $introduce;
        $dealinfo['url'] = $url;
        $time = 't'.NOW_TIME;
        $cookie_history = array($time => json_encode($dealinfo));  //设置cookie
        if (!cookie('history')){//cookie空，初始一个
            cookie('history',$cookie_history);
        }else{
            $new_history = array_merge(cookie('history'),$cookie_history);//添加新浏览数据
            uksort($new_history, "my_sort");//按照浏览时间排序
            $history = array_unique($new_history);
            if (count($history) > 4){
                $history = array_slice($history,0,4);
            }
            cookie('history',$history);
        }
    }
    /**
    +----------------------------------------------------------
     * 网页浏览记录读取
    +----------------------------------------------------------
     */
    function cookie_history_read(){
        $arr = cookie('history');
        foreach ((array)$arr as $k => $v){
            $list[$k] = json_decode($v,true);
        }
        return $list;
    }

    public function footprint(){

        $this->assign('history',$this->cookie_history_read());
        $this->display();
    }



}