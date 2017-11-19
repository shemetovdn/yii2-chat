<?php

use yii\db\Migration;

class m170306_083010_users_comments extends Migration
{

    public function safeUp()
    {
		$tableOptions = null;
		//Опции для mysql
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }


		$this->createTable('{{%users_comments}}', [
			'id' => $this->primaryKey(),
			'comment_id' => $this->integer(11),
            'user_id' => $this->integer(11)
		], $tableOptions);

    }

    public function safeDown()
    {
			$this->dropTable('{{%users_comments}}');
    }
}
