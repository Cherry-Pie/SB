<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container form-container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <div class="panel panel-default panel-more-shadow">
                <div class="panel-body">
                    <div class="panel-desc">Recover password</div>
                    <hr>
                    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                        <?php if (!Yii::$app->user->identity->email): ?>
                            <?= $form->field($model, 'email')
                                ->label(false)
                                ->textInput([
                                    'placeholder'   => "username or e-mail", 
                                    'class'         => 'form-control input-lg',
                                ]);
                            ?>
                        <?php else: ?>
                            <?= $form->field($model, 'email')
                                ->label(false)
                                ->textInput([
                                    'placeholder'   => "username or e-mail", 
                                    'class'         => 'form-control input-lg',
                                    'value'         => Yii::$app->user->identity->email,
                                    'readonly'      => 'readonly'
                                ]);
                            ?>
                        <?php endif ?>
                       <!--  <div class="form-group has-error">
                            <input class="form-control input-lg" id="username" placeholder="username or e-mail" type="text">
                        </div> -->
                        <?= Html::submitButton('Recover password', ['class' => 'btn btn-lg btn-primary btn-block']) ?>
                        <div class="form-group m-top15">
                        <?php if (!Yii::$app->user->identity->email): ?>
                            <a href="<?=Url::to(['site/login']);?>">Sign in</a>
                        <?php endif ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>