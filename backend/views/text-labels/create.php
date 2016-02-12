<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TextLabels */

$this->title = 'Create Text Labels';
$this->params['breadcrumbs'][] = ['label' => 'Text Labels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="text-labels-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
