<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Reaction */

$this->title = 'Create Reaction';
$this->params['breadcrumbs'][] = ['label' => 'Reactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reaction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
