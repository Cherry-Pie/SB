<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<ul class="nav navbar-nav navbar-right">
    <?php foreach ($items as $title => $url): ?>
        <li><a href="<?=$url?>"><?=$title?></a></li>
    <?php endforeach ?>
    <?php if (isset(Yii::$app->user->identity->username)): ?>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?=Yii::$app->user->identity->username?> <i class="fa fa-angle-down"></i></a>

            <ul class="dropdown-menu">
                <li><a href="<?=Url::toRoute('/user/profile')?>">My Profile</a></li>
                <li><a href="<?=Url::toRoute('/site/')?>">Account Settings</a></li>
                <li class="divider"></li>
                <li><a href="<?=Url::toRoute('/site/logout')?>">Logout</a></li>
            </ul>
        </li>
    <?php else: ?>
        <li>
            <span>
                <a href="<?=Url::toRoute('/site/login')?>" class="btn btn-success btn-sm m-top10">Login</a>
            </span>
        </li>
    <?php endif ?>
</ul>