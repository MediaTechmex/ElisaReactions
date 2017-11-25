<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\ConnectionClass;

$url = 'https://rc-rest-api.elisaviihde.fi';
ConnectionClass::establish();
$movieUrl = ConnectionClass::get($url, "/rest/npvr/recordings/url/$model->program_id", '1.0',2,'agnes');

/* @var $this yii\web\View */
/* @var $searchModel common\models\MovieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->name;
// $this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.3/require.min.js');
$this->registerJs('requirejs.config({
    paths: {

      /*
        Choose the flavour of the core component:
        - all in one (scripts and styles): "./clpp.withstyles.min"
        - minimal (scripts): "./clpp.min"
       */
      clpp: "'.Url::to(['js/clpp.withstyles.min']).'"
      //clpp: "./clpp.min"
    }
  });

  requirejs(["clpp", "'.Url::to(['js/clpp_html5_mse_hls.plugin.min.js']).'" /* relative paths to other plugins */], function(clpp) {

    // window.player is used to testing purposes
    var player = window.player = clpp.init("#video", {
      autoplay: true,
      license: "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJ0eXBlIjoiV2ViIiwidXJscyI6WyJjYXN0bGFicy5jb20iLCJjYXN0bGFicy1jaHJvbWVjYXN0LnMzLWV1LXdlc3QtMS5hbWF6b25hd3MuY29tIiwiY2xwcC5zMy1ldS13ZXN0LTEuYW1hem9uYXdzLmNvbSIsImxvY2FsaG9zdCIsIjEyNy4wLjAuMSJdLCJraWQiOjQ0MX0.Awa33txsCNArKMZ6cL4ESs90BNmHJ4l3rbTXNJnjgwtmqgVaoDF_C7W7nBiheuH7zBEePHoinr7f3jpld50mQ10yhLWoCFgvOu-qNCcI5jReXAsnspaHwMPONTp3STDTgPEulNOnsNBMyJnmPN0ftbSQhbvTK52yshp0NI11e15TSNAhm1bHB5kjzNAcBj98xR0nzSIAmuxvYLs9HJhlb-cNMb1wB82faD2jR6iPjQK1Jjw5MjxqnxEr5wJ9LFv0Jax0VNqwsu46-3PkMft2rrFMlLYLrl9QZNa-tQCDdFMm-9I6IUhO6jYtzkcuCnnB6NtMtfMrMpaEcaZgOpUm_g",
      drmtoday: {
        userId: "purchase",
        sessionId: "p0",
        merchant: "six",
        environment: clpp.statics.drmtoday.STAGING
      }
    });

    player.load([
      {src: "'.$movieUrl->url.'", drmProtected: false,type: clpp.statics.types.HLS}
    ]).then(function() {
      console.log("Player is ready");
    });
  });'
);
?>
<div class="movie-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div><?=$model->description ?></div>
    <div><image src="<?= $model->picture_url ?>"/></div>
    <div>
        <video id="video" width="640" height="360" crossOrigin="anonymous" controls class="video-js vjs-default-skin vjs-big-play-centered">
            Your browser does not support HTML5 video.
        </video>
    </div>
    
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