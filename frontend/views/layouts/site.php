<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\SiteAsset;

/* @var $this \yii\web\View */
/* @var $content string */

SiteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <?= Html::csrfMetaTags() ?>

        <title><?= Html::encode($this->title) ?></title>

        <?php $this->head() ?>
    </head>

    <style>
        #see-more {display: none;}
    </style>

    <body>
        <?php $this->beginBody() ?>
            <!-- ===== PAGE START ===== -->
            <header>
                <!-- Top navbar start -->
                <nav class="navbar navbar-default navbar-transparent">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button class="navbar-toggle" data-target="#top-navbar" data-toggle="collapse" type="button">
                                <span class="sr-only">Toggle navigation</span>
                                <i class="ion ion-ios7-gear-outline"></i>
                            </button>
                            <a class="navbar-brand logo" href="/">
                                <img src="/images/Scanbacklinks-Logo1.png" alt="App logo" width="175" style="margin-top: 6px;">
                            </a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="top-navbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="/"><i class="fa fa-angle-left"></i> Back to Home</a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
                <!-- Top navbar end -->
            </header>
            <?= $content ?>
            <!-- Content container start -->
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>