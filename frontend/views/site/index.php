
<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Reaction;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
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
                            <div class="slider-inner hammennys"></div>
                            <img src="images/hammennys.png" />
                            <p>Hämmennys</p>
                        </div>
                    </div>
                </div>
                <div class="emoji-slider">
                    <div class="slider-wrapper">
                        <div class="slider">
                            <div class="slider-inner hilpea"></div>
                            <img src="images/hilpea.png" />
                            <p>Hilpeä</p>
                        </div>
                    </div>
                </div>
                <div class="emoji-slider">
                    <div class="slider-wrapper">
                        <div class="slider">
                            <div class="slider-inner piina"></div>
                            <img src="images/piina.png" />
                            <p>Piina</p>
                        </div>
                    </div>
                </div>
                <div class="emoji-slider">
                    <div class="slider-wrapper">
                        <div class="slider">
                            <div class="slider-inner liikuttava"></div>
                            <img src="images/liikuttava.png" />
                            <p>Liikuttava</p>
                        </div>
                    </div>
                </div>
                <div class="emoji-slider">
                    <div class="slider-wrapper">
                        <div class="slider">
                            <div class="slider-inner sydan"></div>
                            <img src="images/sydan.png" />
                            <p>Ihastuttava</p>

                        </div>
                    </div>
                </div>

                    </div>
                    
                    
                </div>
            </div>
        </div>
</div>
</div>
<div class="header-wrapper">
<h2>Tulokset</h2>
</div>
<div id="results" class="container-fluid results">
    <div class="container">
        <div class="results-row row">
            <div class="col-sm-12">
                

                <div class="row">
                    <?php
                    foreach ($models as $model){
                        $reactions = Reaction::countReactions($model->id);
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
        value: 50,
        showTooltip: true,
    });
    $(".hilpea").roundSlider({

        startAngle: 90,
        radius: 80,
        width: 8,
        handleSize: "+16",
        handleShape: "dot",
        sliderType: "min-range",
        value: 50,
        showTooltip: false,
    });

    $(".piina").roundSlider({

        startAngle: 90,
        radius: 80,
        width: 8,
        handleSize: "+16",
        handleShape: "dot",
        sliderType: "min-range",
        value: 50,
        showTooltip: false,
    });

    $(".liikuttava").roundSlider({

        startAngle: 90,
        radius: 80,
        width: 8,
        handleSize: "+16",
        handleShape: "dot",
        sliderType: "min-range",
        value: 50,
        showTooltip: false,
    });

    $(".sydan").roundSlider({

        startAngle: 90,
        radius: 80,
        width: 8,
        handleSize: "+16",
        handleShape: "dot",
        sliderType: "min-range",
        value: 50,
        showTooltip: false,
    });
    

</script>