<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TextLabels */

$this->title = 'Update Text Labels: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Text Labels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="text-labels-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
