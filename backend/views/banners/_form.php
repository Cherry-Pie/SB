<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Banners */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banners-form row">
    <div class="box box-primary">

        <?php $form = ActiveForm::begin(); ?>

            <div class="box-body">

                <?= $form->field($model, 'active')->checkbox(['option' => ['value' => 1]]); ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'subname')->textInput(['maxlength' => true]) ?>

                <?php if($model->isNewRecord): ?>   
                    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
                <?php else: ?>                 
                    <?= $form->field($model, 'code')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                <?php endif ?>

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

                <?= $form->field($model, 'text')->widget(CKEditor::className(), [
                    'options' => ['rows' => 6],
                    'preset' => 'full'
                ]) ?>

                <?= $form->field($model, 'button')->textInput() ?>
                
                <?= $form->field($model, 'after_button_a')->textInput() ?>

                <?= $form->field($model, 'after_button_href')->textInput() ?>

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>    
        <?php ActiveForm::end(); ?>
    </div>
</div>
