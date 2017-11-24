<?php

use yii\db\Migration;

/**
 * Class m171124_171916_index_for_tables
 */
class m171124_171916_index_for_tables extends Migration
{
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        // creates index for column `author_id`
        $this->createIndex(
            'idx-reaction-movie_id',
            '{{%reaction}}',
            'movie_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-reaction-movie_id',
            '{{%reaction}}',
            'movie_id',
            '{{%movie}}',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-reaction-movie_id',
            '{{%reaction}}'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-reaction-movie_id',
            '{{%reaction}}'
        );
    }
}
