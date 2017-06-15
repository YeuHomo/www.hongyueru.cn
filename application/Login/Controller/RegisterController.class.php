<?php

namespace Login\Controller;
use Common\Controller\HomebaseController;

class RegisterController extends HomebaseController {

    public function index(){
        $this->display();
    }

    public function register()
    {
        /*引入短信接口*/
        vendor('SMS.SendSMS');
        $sendSMS = new \SendSMS();
        $sendSMS->sendTemplateSMS('15715848363',array(1234,5),1);

    }

}