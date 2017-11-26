<?php

use yii\db\Migration;
use common\models\Reaction;
use common\models\Movie;

/**
 * Class m171125_211851_seed_reactions
 */
class m171125_211851_seed_reactions extends Migration
{
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $movies = Movie::find()->all();
        foreach($movies as $movie){
            for($i = 0; $i < 20; $i++){
                $data = [
                    'movie_id' => $movie->id,
                    'time_stamp' => rand(0,100),
                    'content' => Reaction::REACTIONS[rand(0,4)],
                ];
                $this->insert('{{%reaction}}',$data);
            }
        }
    }

    public function down()
    {
        $this->truncateTeable('{{%reaction}}');
    }
}
