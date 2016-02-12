<?php
use yii\helpers\Html;
?>
<div class="password-reset">
    <p>Hello <?= Html::encode($user->name) ?>!</p>

    <p>Your data access to your personal cabinet:</p>

    <ul>
    	<li>Name: <?= Html::encode($user->name) ?></li>
    	<li>Nickname: <?= Html::encode($user->username) ?></li>
    	<li>E-mail: <?= Html::encode($user->email) ?></li>
    	<li>Password: <?= Html::encode($user->password) ?></li>
    </ul>
</div>
