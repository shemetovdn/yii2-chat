<?php

namespace shemetovdn\chat\models;

use Yii;
use yii\db\ActiveRecord;

class Users extends ActiveRecord
{
    public function rules()
    {
        return [
            [['comment'], 'safe'],
            [['ip'], 'ip'],

        ];
    }
}