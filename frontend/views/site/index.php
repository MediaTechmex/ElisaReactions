
<?php
use yii\helpers\Html;
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
                            <div class="slider-inner hilpea"></div>
                            <img src="images/hilpea.png" />
                            <p class="slider-value hilpea-val">50 %</p>
                            <p>Hilpeä</p>
                        </div>
                    </div>
                </div>
                <div class="emoji-slider">
                    <div class="slider-wrapper">
                        <div class="slider">
                            <div class="slider-inner hammennys"></div>
                            <img src="images/hammennys.png" />
                            <p class="slider-value hammennys-val">50 %</p>
                            <p>Hämmennys</p>
                        </div>
                    </div>
                </div>
                <div class="emoji-slider">
                    <div class="slider-wrapper">
                        <div class="slider">
                            <div class="slider-inner piina"></div>
                            <img src="images/piina.png" />
                            <p class="slider-value piina-val">50 %</p>
                            <p>Piina</p>
                        </div>
                    </div>
                </div>
                <div class="emoji-slider">
                    <div class="slider-wrapper">
                        <div class="slider">
                            <div class="slider-inner liikuttava"></div>
                            <img src="images/liikuttava.png" />
                            <p class="slider-value liikuttava-val">50 %</p>
                            <p>Liikuttava</p>
                        </div>
                    </div>
                </div>
                <div class="emoji-slider">
                    <div class="slider-wrapper">
                        <div class="slider">
                            <div class="slider-inner sydan"></div>
                            <img src="images/sydan.png" />
                            <p class="slider-value sydan-val">50 %</p>
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
                        echo '<div class="col-sm-4">';
                        
                        echo '<div class="result-inner">';
                        echo '<div class="result-reactions"><div class="result-reaction top3"><img src="images/hammennys.png" /><span>50%</span></div></div>';
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
        value: 50,
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
        value: 50,
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
        value: 50,
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
        value: 50,
        showTooltip: false,
        change: function(event, ui) { 
          $(".sydan-val").text(event.value + ' %');
        }
    });
    

</script>