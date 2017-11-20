<?php

namespace shemetovdn\chat\models;

use Yii;
use yii\db\ActiveRecord;

class Users extends ActiveRecord
{
    public function rules()
    {
        return [
            [['login', 'ip', 'city'], 'safe'],
            [['ip'], 'ip'],

        ];
    }

    public static function getUsers(){
        $users = Users::find()->all();
        $users_array = array();

        foreach ($users as $user) {
            $users_array[] = array(
                "city" => $user->city,
                "usernsme" => $user->login,
                "ip" => $user->ip,
            );
        }
        return $users_array;
    }
}