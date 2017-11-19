<?php

namespace shemetovdn\chat\models;

use Yii;
use yii\db\ActiveRecord;
use shemetovdn\chat\models\Users;

class Comments extends ActiveRecord
{


    public function rules()
    {
        return [
            [['comment'], 'safe']
        ];
    }
    public function getUser(){
        return $this->hasOne(Users::className(), ['id' => 'user_id'])
            ->viaTable('users_comments', ['comment_id' => 'id']);
    }

    public static function getComments(){
        $comments = Comments::find()->all();
        $comments_array = array();

        foreach ($comments as $comment) {
            $comments_array[] = array(
                "comment" => $comment->comment,
                "usernsme" => $comment->user->login,
                "ip" => $comment->user->ip,
            );
        }
        return $comments_array;
    }

}