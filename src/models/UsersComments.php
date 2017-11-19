<?php

namespace shemetovdn\chat\models;

use Yii;
use yii\db\ActiveRecord;

class UsersComments extends ActiveRecord
{
    public function rules()
    {
        return [
            [['comment_id', 'user_id'], 'safe']

        ];
    }

}