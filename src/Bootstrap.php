<?php

namespace shemetovdn\chat;

use Yii;
use yii\base\BootstrapInterface;



class Bootstrap implements BootstrapInterface{

    //Метод, который вызывается автоматически при каждом запросе
    public function bootstrap($app)
    {

        //Правила маршрутизации
        $app->getUrlManager()->addRules([
            'chat' => 'chat/chat/index',
            'chat/add-comment' => 'chat/chat/add-comment',
        ], false);

        /*
         * Регистрация модуля в приложении
         * (вместо указания в файле frontend/config/main.php
         */
         $app->setModule('chat', 'shemetovdn\chat\Module');

    }
}