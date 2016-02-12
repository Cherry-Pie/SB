<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Login';
?>
<div class="container form-container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <div class="panel panel-default panel-more-shadow">

                <div class="panel-heading text-center">
                    <img src="images/Scanbacklinks-Logo1.png" alt="App logo" width="225px">
                </div>

                <div class="panel-body">

                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_login" data-toggle="tab">Login</a></li>
                        <li><a href="#tab_signin" data-toggle="tab">Sign Up</a></li>
                    </ul>



                    <!-- <div class="panel-desc">Sign in</div> -->
                    <!-- <hr> $model -->
                    <div class="panel panel-defaul m-bot0">
                        <div class="panel-body tab-content">
                            <div id="tab_login" class="tab-pane active">
                                <?php 
                                    $form = ActiveForm::begin([
                                        'id' => 'main-login-form',
                                    ]); 
                                ?>

                                    <?= $form->field($login, 'username')
                                        ->label(false)
                                        ->textInput([
                                            'placeholder' => $login->getAttributeLabel( 'email' ), 
                                            'class' => 'form-control input-lg',
                                        ]);
                                    ?>
                                    <?= $form->field($login, 'password')
                                        ->label(false)
                                        ->passwordInput([
                                            'placeholder' => $login->getAttributeLabel( 'password' ), 
                                            'class' => 'form-control input-lg',
                                        ]);
                                    ?>
                                    <div class="checkbox m-bot15">
                                        <label>
                                            <input name="LoginForm[rememberMe]" type="checkbox"> Keep me logged in.
                                        </label>
                                    </div>
                                    <small class="help-block text-danger" data-bv-validator-for="email" data-bv-validator="emailAddress" style="display: none;">Invalid e-mail or password. Please try again</small>
                                    <?= Html::submitButton('Login', ['class' => 'btn btn-lg btn-primary btn-block']) ?>
                                    <div class="form-group m-top15">
                                        <a href="#tab_signin" data-toggle="tab" id="createAcc">Create an account</a>
                                        <a href="<?=Url::to(['site/requestpassword']);?>" class="pull-right">Recover password</a>
                                    </div>
                                <?php ActiveForm::end(); ?>
                            </div>

                            <div id="tab_signin" class="tab-pane">
                                <?php 
                                    $form = ActiveForm::begin([
                                        'id' => 'main-signup-form', 
                                        'enableAjaxValidation' => true,
                                    ]);
                                ?>
                                    <?= $form->field($signup, 'username')
                                        ->label(false)
                                        ->textInput([
                                            'placeholder' => $signup->getAttributeLabel( 'username' ), 
                                            'class' => 'form-control input-lg',
                                        ]);
                                    ?>
                                    <?= $form->field($signup, 'email')
                                        ->label(false)
                                        ->textInput([
                                            'placeholder' => $signup->getAttributeLabel( 'email' ), 
                                            'class' => 'form-control input-lg',
                                        ]);
                                    ?>
                                    <?= $form->field($signup, 'password')
                                        ->label(false)
                                        ->passwordInput([
                                            'placeholder' => $signup->getAttributeLabel( 'password' ), 
                                            'class' => 'form-control input-lg',
                                        ]);
                                    ?>
                                    <div class="checkbox m-bot15">
                                        <?= $form->field($signup, 'agree')->checkbox(['value' => 'Y', 'label' => Yii::t('app', 'I agree to <a href="#termsofuse">Terms of Use</a>.')]);?>
                                    </div>
                                    <?= Html::submitButton('Create account', ['class' => 'btn btn-lg btn-primary btn-block']) ?>
                                    <div class="form-group m-top15">
                                        <a href="#tab_login" data-toggle="tab" id="alreadySighned">Already signed up?</a>
                                    </div>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-center">
                    <?= \common\widgets\SocialAuth::widget(['action' => 'site/login']); ?>
                </div>
            </div>
        </div>
    </div>
</div>