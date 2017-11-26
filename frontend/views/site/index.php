
<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Reaction;
/* @var $this yii\web\View */

$this->title = 'Elisa Fiilis';
?>
<div class="container">
<div class="intro">
    <div class="jumbotron">
    <span class="aboveHeading">Elokuva-</span>
    <h1>Fiilis</h1>

    <p class="lead">Mitä haluat tuntea?</p>

    </div>

    <!-- <div class="body-content"> -->

        <div class="slider-row row">
            <div class="col-sm-12">
                <div id="sliders" class="search-sliders">

                    <div class="row">
                    <div class="emoji-slider">
                    <div class="slider-wrapper">
                        <div class="slider">
                            <div class="slider-inner hilpea"></div>
                            <img src="<?= Url::to(['images/hilpea.png']) ?>" />
                            <p class="slider-value hilpea-val"><?= $hilpea ?> %</p>
                            <p>Hilpeä</p>
                        </div>
                    </div>
                </div>
                <div class="emoji-slider">
                    <div class="slider-wrapper">
                        <div class="slider">
                            <div class="slider-inner hammennys"></div>
                            <img src="<?= Url::to(['images/hammennys.png']) ?>" />
                            <p class="slider-value hammennys-val"><?= $hammennys ?> %</p>
                            <p>Hämmennys</p>
                        </div>
                    </div>
                </div>
                <div class="emoji-slider">
                    <div class="slider-wrapper">
                        <div class="slider">
                            <div class="slider-inner piina"></div>
                            <img src="<?= Url::to(['images/piina.png']) ?>" />
                            <p class="slider-value piina-val"><?= $piina ?> %</p>
                            <p>Piina</p>
                        </div>
                    </div>
                </div>
                <div class="emoji-slider">
                    <div class="slider-wrapper">
                        <div class="slider">
                            <div class="slider-inner liikuttava"></div>
                            <img src="<?= Url::to(['images/liikuttava.png']) ?>" />
                            <p class="slider-value liikuttava-val"><?= $liikuttava ?> %</p>
                            <p>Liikuttava</p>
                        </div>
                    </div>
                </div>
                <div class="emoji-slider">
                    <div class="slider-wrapper">
                        <div class="slider">
                            <div class="slider-inner sydan"></div>
                            <img src="<?= Url::to(['images/sydan.png']) ?>" />
                            <p class="slider-value sydan-val"><?= $sydan ?> %</p>
                            <p>Ihastuttava</p>

                        </div>
                    </div>
                </div>

                    </div>
                    
                </div>
                <div class="button-wrapper">
                    <button class='btn btn-orange btn-center btn-feel' onclick="valueGet();">Fiilis!</button>
                </div>
            </div>
        </div>
</div>
</div>

<div id="results" class="container-fluid results">
    <div class="header-wrapper">
        <h2>Tunteisiin sopivat elokuvat</h2>
    </div>
    <div class="container">
        <div class="results-row row">
            <div class="col-sm-12">
                

                <div class="row">
                    <?php
                    foreach ($models as $model){
                        $reactions = $model->sortedReactions;
                        echo '<div class="col-sm-4">';
                        echo '<div class="result-inner">';
                        echo '<div class="result-reactions">'
                        . '<div class="result-reaction top3">';
                        foreach ($reactions as $reaction => $percent){
                            echo '<img src="'.Url::to(['images/'.$reaction.'.png']).'" />';
                            echo "<span>$percent%</span>";
                        }
                        echo '</div>'
                        . '</div>';
                        echo '<div class="result-wrapper">';
                        echo "<img src=\"$model->picture_url\" />";
                        echo "<h3>$model->name</h3>";
                        echo "<p>$model->description</p>";
                        echo Html::a('Katso',['movie/index','id'=>$model->id],['class'=>'btn btn-orange btn-fw']);
                        echo '</div></div>';
                        echo '</div>';
                    }
                    ?>
                   
                    
                </div>
            </div>
        </div>
        </div>
</div>
    <!-- </div> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/jquery.roundslider/1.3/roundslider.min.js"></script>
<script>
    $(".hammennys").roundSlider({
        startAngle: 90,
        radius: 80,
        width: 8,
        handleSize: "+16",
        handleShape: "dot",
        sliderType: "min-range",
        value: <?=$hammennys ?>,
        showTooltip: true,
        change: function(event, ui) { 
          $(".hammennys-val").text(event.value + ' %');
        }
    });
    $(".hilpea").roundSlider({

        startAngle: 90,
        radius: 80,
        width: 8,
        handleSize: "+16",
        handleShape: "dot",
        sliderType: "min-range",
        value: <?=$hilpea  ?>,
        showTooltip: false,
        change: function(event, ui) { 
          $(".hilpea-val").text(event.value + ' %');
        }
    });

    $(".piina").roundSlider({

        startAngle: 90,
        radius: 80,
        width: 8,
        handleSize: "+16",
        handleShape: "dot",
        sliderType: "min-range",
        value: <?= $piina ?>,
        showTooltip: false,
        change: function(event, ui) { 
          $(".piina-val").text(event.value + ' %');
        }
    });

    $(".liikuttava").roundSlider({

        startAngle: 90,
        radius: 80,
        width: 8,
        handleSize: "+16",
        handleShape: "dot",
        sliderType: "min-range",
        value: <?= $liikuttava ?>,
        showTooltip: false,
        change: function(event, ui) { 
          $(".liikuttava-val").text(event.value + ' %');
        }
    });

    $(".sydan").roundSlider({

        startAngle: 90,
        radius: 80,
        width: 8,
        handleSize: "+16",
        handleShape: "dot",
        sliderType: "min-range",
        value: <?= $sydan ?>,
        showTooltip: false,
        change: function(event, ui) { 
          $(".sydan-val").text(event.value + ' %');
        }
    });
    
    function valueGet(){
        window.location.href = '<?= Url::to(['site/index',]) ?>'+'\
?hammennys='+$('.hammennys > input').attr('value')+ '\
&hilpea='+ $('.hilpea > input').attr('value')+ '\
&piina='+$('.piina > input').attr('value')+ '\
&liikuttava='+$('.piina > input').attr('value')+ '\
&sydan='+$('.sydan > input').attr('value');
    }

</script>