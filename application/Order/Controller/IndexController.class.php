<?php

namespace Order\Controller;

use Common\Controller\HomebaseController;

class IndexController extends HomebaseController {

    public function index(){
        echo sp_password('123456');
        exit;
        $this->display(":index");
    }
}