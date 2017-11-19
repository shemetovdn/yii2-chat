<?php

use yii\db\Migration;

class m170306_083010_users extends Migration
{

    public function safeUp()
    {
		$tableOptions = null;
		//Опции для mysql
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }


		$this->createTable('{{%users}}', [
			'id' => $this->primaryKey(),
			'ip' => $this->string(15)->notNull(),
			'login' => $this->string(255),
		], $tableOptions);

    }

    public function safeDown()
    {
			$this->dropTable('{{%users}}');
    }
}
