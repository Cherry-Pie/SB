<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Content container start -->
<div class="container form-container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <div class="panel panel-default panel-more-shadow">
                <div class="panel-body">
                    <div class="panel-desc">Contact Us</div>
                    <hr>
                    <?php $form = ActiveForm::begin(['id' => 'contact-form', 'options' => ["class" => "form-horizontal"]]); ?>
                        <?=$form->field($model, 'name', [
                                'labelOptions'  => ['class' => 'col-sm-2 control-label'],
                                'inputOptions'  => [
                                    'class'         => 'form-control', 
                                    'placeholder'   => $model->getAttributeLabel('name')
                                ],
                                'inputTemplate' => '<div class="col-sm-10">{input}</div>',
                                'errorOptions'   => ['class' => 'help-block help-block-error col-sm-offset-2 col-sm-10']
                           ]) ;
                        ?>
                        <?=$form->field($model, 'email', [
                                'labelOptions'  => ['class' => 'col-sm-2 control-label'],
                                'inputOptions'  => [
                                    'class'         => 'form-control', 
                                    'placeholder'   => $model->getAttributeLabel('email')
                                ],
                                'inputTemplate' => '<div class="col-sm-10">{input}</div>',
                                'errorOptions'   => ['class' => 'help-block help-block-error col-sm-offset-2 col-sm-10']
                           ])->textInput(['type'=> 'email']) ;
                        ?>
                        <?=$form->field($model, 'subject', [
                                'labelOptions'  => ['class' => 'col-sm-2 control-label'],
                                'inputOptions'  => [
                                    'class'         => 'form-control', 
                                    'placeholder'   => $model->getAttributeLabel('subject')
                                ],
                                'inputTemplate' => '<div class="col-sm-10">{input}</div>',
                                'errorOptions'   => ['class' => 'help-block help-block-error col-sm-offset-2 col-sm-10']
                           ]) ;
                        ?>
                        <?= $form->field($model, 'body', [
                                'labelOptions'  => ['class' => 'col-sm-2 control-label'],
                                'inputOptions'  => [
                                    'class'         => 'form-control', 
                                    'placeholder'   => $model->getAttributeLabel('body')
                                ],
                                'inputTemplate' => '<div class="col-sm-10">{input}</div>',
                                'errorOptions'   => ['class' => 'help-block help-block-error col-sm-offset-2 col-sm-10']
                           ])->textArea(['rows' => 3]); 
                        ?>
                        <?= $form->field($model, 'verifyCode',[
                                'labelOptions' => ['class' => 'col-sm-2 control-label'],
                                'errorOptions' => ['class' => 'help-block help-block-error col-sm-offset-2 col-sm-10']
                            ])->widget(Captcha::className(), [
                                'template' => '<div class="col-lg-3">{image}</div><div class="col-lg-7">{input}</div>',
                            ]);
                        ?>
                        <div class="text-right">
                            <?= Html::submitButton('Send', ['class' => 'btn btn-lg btn-primary', 'name' => 'contact-button']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content container end -->
