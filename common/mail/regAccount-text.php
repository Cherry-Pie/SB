<?php
use yii\helpers\Html;
?>
Hello <?= Html::encode($user->name) ?>!

Your data access to your personal cabinet:
\n\n
- Name: <?= Html::encode($user->name) ?>\n
- Nickname: <?= Html::encode($user->username) ?>\n
- E-mail: <?= Html::encode($user->email) ?>\n
- Password: <?= Html::encode($user->password) ?>\n
