<?php

namespace shemetovdn\chat;

use yii\web\AssetBundle;

class ChatAssetsBundle extends AssetBundle
{

    public $sourcePath = '@vendor/shemetovdn/yii2-chat/assets';

    public $css = [
        'css/style.css'
    ];

    public $js = [
        'js/angular.min.js',
        'js/angular-route.min.js',
        'js/chat.js'
    ];
}