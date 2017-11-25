<?php

use yii\db\Migration;

/**
 * Class m171125_113832_add_data_columns
 */
class m171125_113832_add_data_columns extends Migration
{
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('{{%movie}}', 'length', $this->integer()->notNull());
        $this->addColumn('{{%movie}}', 'picture_url', $this->string()->notNull());
        $this->addColumn('{{%movie}}', 'stream_url', $this->string()->notNull());
        $this->addColumn('{{%movie}}', 'description', $this->string()->notNull());

    }

    public function down()
    {
        $this->dropColumn('{{%movie}}', 'length');
        $this->dropColumn('{{%movie}}', 'picture_url');
        $this->dropColumn('{{%movie}}', 'stream_url');
        $this->dropColumn('{{%movie}}', 'description');

    }
}
