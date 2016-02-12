<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container form-container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <div class="panel panel-default panel-more-shadow">
                <div class="panel-body">
                    <div class="panel-desc">Please choose your new password</div>
                    <hr>
                    <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                        <?= $form->field($model, 'password')
                            ->label(false)
                            ->passwordInput([
                                'placeholder' => "new password", 
                                'class' => 'form-control input-lg',
                            ]);
                        ?>
                       <!--  <div class="form-group has-error">
                            <input class="form-control input-lg" id="username" placeholder="username or e-mail" type="text">
                        </div> -->
                        <?= Html::submitButton('Save password', ['class' => 'btn btn-lg btn-primary btn-block']) ?>
                        <div class="form-group m-top15">
                            <a href="<?=Url::to(['site/login']);?>">Sign in</a>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
