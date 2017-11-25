<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Search for movies!</h1>

        <p class="lead">Use the sliders below to set your current feelings.</p>

    </div>

    <div class="body-content">

        <div class="slider-row row">
            <div class="col-sm-12">
                <div id="sliders" class="search-sliders">

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="slider-wrapper">
                                <div class="slider">
                                    <div class="slider-inner happy"></div>
                                    <img src="images/confusing.png" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="slider-wrapper">
                                <div class="slider">
                                    <div class="slider-inner angry"></div>
                                    <img src="images/touching.png" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="slider-wrapper">
                                <div class="slider">
                                    <div class="slider-inner yay"></div>
                                    <img src="images/emoji_7.png" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="slider-wrapper">
                                <div class="slider">
                                    <div class="slider-inner love"></div>
                                    <img src="images/emoji_3.png" />
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    
                </div>
            </div>
        </div>

        <div class="results-row row">
            <div class="col-sm-12">
                <h2>Tulokset</h2>

                <div class="row">
                    <?php
                    foreach ($models as $model){
                        echo '<div class="col-sm-3">';
                        echo '<div class="result-inner">';
                        echo "<img src=\"$model->picture_url\" />";
                        echo "<h3>$model->name</h3>";
                        echo "<p>$model->description</p>";
                        echo Html::a('Katso','movie/view',['class'=>'btn']);
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                    
                </div>
            </div>
        </div>

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/jquery.roundslider/1.3/roundslider.min.js"></script>
<script>
    $(".happy").roundSlider({
        startAngle: 90,
        radius: 80,
        width: 8,
        handleSize: "+16",
        handleShape: "dot",
        sliderType: "min-range",
        value: 50,
        showTooltip: false,
    });
    $(".angry").roundSlider({
        startAngle: 90,
        radius: 80,
        width: 8,
        handleSize: "+16",
        handleShape: "dot",
        sliderType: "min-range",
        value: 50,
        showTooltip: false,
    });
    $(".yay").roundSlider({
        startAngle: 90,
        radius: 80,
        width: 8,
        handleSize: "+16",
        handleShape: "dot",
        sliderType: "min-range",
        value: 50,
        showTooltip: false,
    });
    $(".love").roundSlider({
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