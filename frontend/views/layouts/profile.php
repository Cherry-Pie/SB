<?php
use yii\helpers\Url;
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
                    <div class="container" id="nav-container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button class="navbar-toggle navbar-toggle-settings" data-target="#top-navbar" data-toggle="collapse" type="button">
                                <span class="sr-only">Toggle navigation</span>
                                <i class="ion ion-ios7-gear-outline"></i>
                            </button>
                            <a class="navbar-brand logo" href="#">
                                <img src="/images/Scanbacklinks-Logo1.png" alt="App logo" width="175" style="margin-top: 6px;">
                            </a>
                            <div class="navbar-side-menu-toggle">
                                <button class="toggle-btn" type="button">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="top-navbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="/">Home</a></li>
                                <li><a href="<?=Url::toRoute('/site/contact')?>">Contact Us</a></li>
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
                                    <li><a href="<?=Url::toRoute('/site/login')?>">Login / Sign up</a></li>
                                <?php endif ?>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
                <!-- Top navbar end -->
            </header>
            <!-- Content container start -->
            <div class="container" id="content-container">
                <div class="content-wrapper">
                    <div class="row">
                        <!-- Side menu + Content start -->
                        <div class="side-nav-content">
                            <!-- Side menu start -->
                            <div class="left-side-wrapper">
                                <!-- left side start-->
                                <div class="left-side sticky-left-side">
                                    <div class="left-side-inner">
                                                                            <!--sidebar nav start-->
                                        <ul class="nav nav-pills nav-stacked custom-nav">
                                            <li class="nav-header">General</li>
                                            <li class="menu-list nav-active">
                                                <ul class="sub-menu-list">
                                                    <li>
                                                        <a href="/report/charts/<?=$url?>">
                                                            <i class="fa fa-bold"></i>
                                                            Main Report
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/report/backlinks/backlinksdomain/<?=$url?>">
                                                            <i class="fa fa-globe"></i>
                                                            Backlink domains
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/report/backlinks/anchortext/<?=$url?>">
                                                            <i class="fa fa-reorder"></i>
                                                            Anchor texts
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/report/backlinks/anchorurls/<?=$url?>">
                                                            <i class="fa fa-star"></i>
                                                            Anchor URLs
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a <?php if($url): ?>download="export_<?=date("d-m-Y_H:i:s")?>.json" <?php endif ?> href="/report/export/<?=$url?>">
                                                            <i class="fa fa-download"></i>
                                                            Export
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <!--sidebar nav end-->

                                    </div>
                                </div>
                                <!-- left side end-->
                            </div>
                            <!-- Side menu end -->
                            <!-- Main content wrapper start -->
                            <div class="main-content-wrapper">
                                <!-- Main content start -->
                                <div class="main-content">
                                    <?= $content ?>
                                </div>
                            <!-- Main content end -->
                        </div>
                        <!-- Main content wrapper end -->
                    </div>
                    <!-- Side menu + Content end -->
                </div>
            </div>
        </div>
        <!-- Content container end -->
        <!-- Footer container start -->
        <footer class="main--footer main--footer_with-margin">
            <div class="container">
              <div class="row m-bot10">
                <div class="col-sm-12 col-md-6 col-md-offset-2 col-lg-7 col-lg-offset-1 text-center" style="padding-top: 20px;">
                  <img src="http://www.linksmanagement.com/wp-content/themes/theme1907/images/credit-cards.png" alt="">
                </div>
                <div class="col-sm-12 col-md-4 text-center">
                  <img src="http://www.linksmanagement.com/wp-content/themes/theme1907/images/viriied-icons.png" alt="">
                </div>
              </div>
            </div>
            <div class="container">
                <div class="row">
                    
                        <ul class="list-inline text-center">
                            <li><small>Copyright &copy; 2015</small></li>
                            <li><small><a href="#">All rights reserved</a></small></li>
                        </ul>
                  
                </div>
            </div>
        </footer>
        <!-- Footer container end -->
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>