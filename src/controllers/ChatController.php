<?php

namespace shemetovdn\chat\controllers;

use Yii;
use yii\web\Controller;
use shemetovdn\chat\models\Comments;



class ChatController extends Controller
{

    public function actionIndex()
    {
        \shemetovdn\chat\ChatAssetsBundle::register($this->view);


        $comments = Comments::find()->all();

        return $this->render('index',[
            'comments' => $comments
        ]);
    }


    public function actionAddComment(){

        if (Yii::$app->request->post()) {
            echo 111111;
        }
    }

    public function actionGetComment(){

        if (Yii::$app->request->post()) {
            $comments = Comments::find()->all();
        }
    }
}

