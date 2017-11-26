
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
<div class="container">
    <div class="row padding-top">
        <div class="col-sm-8 video-container">
            <video id="video" width="640" height="360" crossOrigin="anonymous" controls class="video-js vjs-default-skin vjs-big-play-centered">
                Your browser does not support HTML5 video.
                
            </video>
            <div class="emoji-container2">
                <ul class="emojilist2">
                    <li>
                        <img src="<?= Url::to(['images/hammennys.png']) ?>" onClick="setEmoji('hammennys')" />
                    </li>
                    <li>
                        <img src="<?= Url::to(['images/hilpea.png']) ?>" onClick="setEmoji('hilpea')" />
                    </li>
                    <li>
                        <img src="<?= Url::to(['images/piina.png']) ?>" onClick="setEmoji('piina')" />
                    </li>
                    <li>
                        <img src="<?= Url::to(['images/liikuttava.png']) ?>" onClick="setEmoji('liikuttava')" />
                    </li>
                    <li>
                        <img src="<?= Url::to(['images/sydan.png']) ?>" onClick="setEmoji('sydan')" />
                    </li>
                </ul>
             </div>
            <!-- <div class="emoji-container">
            <ul class="emojilist">
                <li>
                    <img src="<?= Url::to(['images/hammennys.png']) ?>" onClick="setEmoji('hammennys')" />
                </li>
                <li>
                    <img src="<?= Url::to(['images/hilpea.png']) ?>" onClick="setEmoji('hilpea')" />
                </li>
                <li>
                    <img src="<?= Url::to(['images/piina.png']) ?>" onClick="setEmoji('piina')" />
                </li>
                <li>
                    <img src="<?= Url::to(['images/liikuttava.png']) ?>" onClick="setEmoji('liikuttava')" />
                </li>
                <li>
                    <img src="<?= Url::to(['images/sydan.png']) ?>" onClick="setEmoji('sydan')" />
                </li>
            </ul>
        </div> -->
            <!-- <div class="reactions-container">
                 <div class="reactions-wrapper"></div>
            </div> -->
        </div>
        <div class="col-sm-4">
            <h1><?= Html::encode($this->title) ?></h1>
            <div class="single-movie-reactions">
                <?php
                foreach($model->sortedReactions as $reaction => $percent){
                    echo '<div class="single-reaction top3">';
                    echo '<img src="'. Url::to(['images/'.$reaction.'.png']).'" /><span>'.$percent.'%</span>';
                    echo '</div>';
                }
                ?>
            </div>
            <p><?=$model->description ?></p>
            
        </div>
    </div>

    

    

</div>
</div>


<script>
    var movieTimeline = document.getElementById('timeline');
    var video = document.getElementsByClassName('video-js')[0];
    var reactionsTimeline = document.getElementsByClassName('reactions-wrapper')[0];

    
    // video.insertAdjacentHTML('beforeend', '');

    var reactionList = [];
    var reaction = {
            'type': 'type',
            'pointOnTimeline': 'timeNow'
        };
        // var timeline;
        var sliderHorizontal = document.getElementsByClassName('vjs-slider-horizontal')[1];
        

        var sliderContainer = document.createElement("div");
        sliderContainer.id = "slider-emoji-container";
        // document.body.insertBefore(sliderContainer, sliderHorizontal); 
        // sliderHorizontal.appendChild(sliderContainer);
document.addEventListener('DOMContentLoaded', function(){
    console.log('sasdasd; ' + document.getElementsByClassName('vjs-slider-horizontal').length);
    // sliderHorizontal.insertAdjacentHTML('beforeend', '<div id="slider-emoji-container"></div>');
});
      
    

    function setEmoji(type){
        console.log('Set emoji fired');
        // var slider = document.getElementById('slider-emoji-container');
        var sliderPercentage = document.getElementsByClassName('vjs-slider-horizontal')[1].getAttribute('aria-valuenow');
        console.log(sliderPercentage);
        var timeNow = sliderPercentage;

        
        

        var emoji = '<img style="left:' + timeNow + '%" src="../images/' + type + '.png" class="timeline-emoji" />'

        document.getElementsByClassName('vjs-slider-horizontal')[1].insertAdjacentHTML('beforeend', emoji);

        var reaction = {
            'type': type,
            'pointOnTimeline': timeNow
        };
        // reactionList.push(reaction);

        /** Testing */
        // updateList();
        
    }

    function updateList(){
        document.getElementById('templist').innerHTML = '';

        for(var i=0; i<reactionList.length; i++){
            // console.log(reactionList[i].type);
            document.getElementById('templist').insertAdjacentHTML('beforeend', '<li>' + reactionList[i].type + ', ' + reactionList[i].pointOnTimeline +'</li>');
        }
    }
    


// var sliderPercentage = document.getElementsByClassName('vsj-slider')[0].getAttribute('aria-valuenow');

</script>