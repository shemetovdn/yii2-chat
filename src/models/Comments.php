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
            [['ip'], 'ip'],
            [['comment'], 'required'],
        ];
    }
    public function getUser(){
        return $this->hasOne(Users::className(), ['id' => 'user_id'])
            ->viaTable('users_comments', ['comment_id' => 'id']);
    }

}