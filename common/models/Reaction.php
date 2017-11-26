<?php
namespace common\models;


class Reaction extends BaseReaction{
    const REACTIONS = [
        'hammennys',
        'hilpea',
        'piina',
        'liikuttava',
        'sydan'
    ]; 
    
    static public function countReactions($movieId){
        $totalCount = self::find()->where(['movie_id'=>$movieId])->count();
        
        $seperateCounts = [];
        
        foreach (static::REACTIONS as $reaction){
            $count = self::find()->where(
                    ['movie_id'=>$movieId,'content'=>$reaction])->count();
            
            if ($totalCount > 0){
                $percent = ($count / $totalCount) * 100;
                $seperateCounts[$reaction] = number_format($percent, 0, ',','');
            } else {
                $seperateCounts[$reaction] = 0;
            }
        }
        arsort($seperateCounts);
        return $seperateCounts;
    }
}
