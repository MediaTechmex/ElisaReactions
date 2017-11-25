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


    <div class="movie-content row">
        <div class="col-sm-6">
            <img src="https://placeimg.com/640/480/tech" />
        </div>
        <div class="col-sm-6">
            <h1>Start Wars V</h1>
            <div class="emotions-view">
                <p>emotions</p>
            </div>
            <a href="#" onClick="openVideo()" class="btn">Katso</a>
        </div>
    </div>

<div id="video">

    <div class="reactions-wrapper">
        
    </div>
    <div class="timeline-wrapper">
        <input type="range" min="0" max="100" value="0" class="slider" id="timeline">
    </div>


    <div class="emoji-container">
        <ul class="emojilist">
            <li>
                <img src="images/smile.png" onClick="setEmoji('smile')" />
            </li>
            <li>
                <img src="images/cry.png" onClick="setEmoji('cry')" />
            </li>
            <li>
                <img src="images/love.png" onClick="setEmoji('love')" />
            </li>
            <li>
                <img src="images/wow.png" onClick="setEmoji('wow')" />
            </li>
            <li>
                <img src="images/hate.png" onClick="setEmoji('hate')" />
            </li>
        </ul>
    </div>
    <ul id="templist">
        
    </ul>

</div>
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
        var emoji = '<img style="left:' + timeNow + '%" src="images/' + type + '.png" class="timeline-emoji" />'

        reactionsTimeline.insertAdjacentHTML('beforeend', emoji);

        var reaction = {
            'type': type,
            'pointOnTimeline': timeNow
        };
        reactionList.push(reaction);

        /** Testing */
        updateList();
        
    }

    function updateList(){
        document.getElementById('templist').innerHTML = '';

        for(var i=0; i<reactionList.length; i++){
            // console.log(reactionList[i].type);
            document.getElementById('templist').insertAdjacentHTML('beforeend', '<li>' + reactionList[i].type + ', ' + reactionList[i].pointOnTimeline +'</li>');
        }
    }
    



</script>