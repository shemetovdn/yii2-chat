<?php

namespace shemetovdn\chat\controllers;

use shemetovdn\chat\models\Users;
use Yii;
use yii\web\Controller;
use shemetovdn\chat\models\Comments;
use shemetovdn\chat\models\UsersComments;



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


    public function actionAddComment()
    {

        if (Yii::$app->request->post()) {
            $message = Yii::$app->request->post('message');
            $username = Yii::$app->request->post('username');
            $error = array();
            if (empty($username)) { $error[] = 0;}
            if (empty($message)) { $error[] = 1;}
            if (empty($error)) {
                $user_ip = $_SERVER['REMOTE_ADDR'];
                $user = Users::find()->where(['login' =>$username, 'ip' => $user_ip])->one();
                if (empty($user)) {
                    $user = new Users();
                    $user->login = $username;
                    $user->ip = $user_ip;
                    $user->save();

                }
                $comment = new Comments();
                $comment->comment = $message;
                $comment->save();

                $user_comment = new UsersComments();
                $user_comment->user_id = $user->id;
                $user_comment->comment_id = $comment->id;
                $user_comment->save();

                return json_encode(Comments::getComments());
            }else{
                return json_encode($error);
            }
        }
    }

    public function actionGetComments()
    {
        if (Yii::$app->request->post()) {

              return json_encode(Comments::getComments());
        }
    }
}

