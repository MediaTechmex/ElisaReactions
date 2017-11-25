<?php

use yii\db\Migration;
use common\models\ConnectionClass;
/**
 * Class m171125_114919_populate_database
 */
class m171125_114919_populate_database extends Migration
{
    
    public function up()
    {
        ConnectionClass::establish();
        $url = 'https://rc-rest-api.elisaviihde.fi';
        $movies = ConnectionClass::get($url, '/rest/npvr/recordings/all');
        foreach ($movies->recordings->recorded as $movie){
            $movieUrl = ConnectionClass::get($url, "/rest/npvr/recordings/url/$movie->programId", '1.0');
            $data = [
                'name' => $movie->name,
                'length' => $movie->duration,
                'picture_url' => $movie->thumbnail,
                'stream_url' => $movieUrl->url,
                'description' => $movie->description,
            ];
            $this->insert('{{%movie}}',$data);
        }
    }

    public function down()
    {
        $this->truncateTeable('{{%movie}}');
    }
    
}
