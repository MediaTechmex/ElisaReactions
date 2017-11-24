<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%movie}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            
        ], $tableOptions);
        
        $this->createTable('{{%reaction}}',[
            'id'=>$this->primaryKey(),
            'movie_id'=>$this->integer()->notNull(),
            'time_stamp'=>$this->integer()->notNull(),
            'content'=>$this->string()->notNull(),
        ], $tableOptions);
        
    }

    public function down()
    {
        
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%reaction}}');

    }
}
