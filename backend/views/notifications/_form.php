<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Notifications */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banners-form row">
    <div class="box box-primary">

        <?php $form = ActiveForm::begin(); ?>

            <div class="box-body">

			    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

			    <?= $form->field($model, 'text')->widget(CKEditor::className(), [
			        'options' => ['rows' => 4],
			        'preset' => 'full'
			    ]) ?>

			    <?= $form->field($model, 'type')->dropDownList(['info' => 'info', 'warning' => 'warning', 'danger' => 'danger', 'success' => 'success']); ?>

			    <?= $form->field($model, 'access')->textInput(['maxlength' => true]) ?>

			    <p>
			        Ask group members, separated by commas.
			    </p>
			    <ul>
			        <li>guest</li>
			        <li>trial</li>
			        <li>registered</li>
			        <li>losttrial</li>
			    </ul>
			    <hr>

			    <div class="form-group">
			        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			    </div>

   			</div>    
	    <?php ActiveForm::end(); ?>
    </div>
</div>
