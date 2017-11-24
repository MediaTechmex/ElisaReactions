<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MovieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Movies';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="movie-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>asd
        <?= Html::a('Create Movie', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?> -->

    
    <div class="reactions-wrapper">
        
    </div>
    <div class="timeline-wrapper">
        <input type="range" min="0" max="100" value="0" class="slider" id="timeline">
    </div>
    <button onClick="setEmoji('smile')">Smile motherfucker!</button>
    <button onClick="updateList()">update!</button>
    <ul id="templist">
        
    </ul>
</div>


<script>
    var movieTimeline = document.getElementById('timeline');
    var reactionsTimeline = document.getElementsByClassName('reactions-wrapper')[0];
    console.log(reactionsTimeline);
    

    var reactionList = [];
    var reaction = {
            'type': 'type',
            'pointOnTimeline': 'timeNow'
        };
    

    function setEmoji(type){
        console.log('Set emoji fired');
        var timeNow = movieTimeline.value;
        var time = '';
        var emoji = '<img style="left:' + timeNow + '%" src="images/emoji_5.png" class="timeline-emoji" />'

        reactionsTimeline.insertAdjacentHTML('beforeend', emoji);

        var reaction = {
            'type': type,
            'pointOnTimeline': timeNow
        };
        reactionList.push(reaction);

        
    }

    function updateList(){

        for(var i=0; i<reactionList.length; i++){
            // console.log(reactionList[i].type);
            document.getElementById('templist').insertAdjacentHTML('beforeend', '<li>' + reactionList[i].type + ', ' + reactionList[i].pointOnTimeline +'</li>');
        }
    }
    



</script>