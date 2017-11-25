<?php

use yii\db\Migration;
use common\models\ConnectionClass;
/**
 * Class m171125_142237_re_populate_database
 */
class m171125_142237_re_populate_database extends Migration
{
    
    public function up()
    {
        $this->dropForeignKey(
            'fk-reaction-movie_id',
            '{{%reaction}}'
        );
        $this->truncateTable('{{%movie}}');
        $this->addForeignKey(
            'fk-reaction-movie_id',
            '{{%reaction}}',
            'movie_id',
            '{{%movie}}',
            'id',
            'CASCADE'
        );
        $this->dropColumn('{{%movie}}','stream_url');
        $this->dropColumn('{{%movie}}','description');
        $this->addColumn('{{%movie}}', 'program_id', $this->integer()->notNull());
        $this->addColumn('{{%movie}}', 'description', $this->text()->notNull());
        
        ConnectionClass::establish();
        $url = 'https://rc-rest-api.elisaviihde.fi';
        $movies = ConnectionClass::get($url, '/rest/npvr/recordings/all');
        foreach ($movies->recordings->recorded as $movie){
            $data = [
                'name' => $movie->name,
                'length' => $movie->duration,
                'picture_url' => $movie->thumbnail,
                'description' => $movie->description,
                'program_id' => $movie->programId
            ];
            $this->insert('{{%movie}}',$data);
        }
    }

    public function down()
    {
        echo "m171125_142237_re_populate_database cannot be reverted.\n";

        return false;
    }
}
