<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\models\PopularDomains;

/* @var $this \yii\web\View */
/* @var $content string */



$url = "";
if(isset($this->context->url) && !empty($this->context->url))
    $url = $this->context->url;
if(isset($this->context->page_title) && !empty($this->context->page_title)) {
    $this->title = $this->context->page_title;
}
else {
    $this->title = "Main Report";
}

AppAsset::register($this);

if(Yii::$app->user->isGuest || !Yii::$app->people->isTrial()) {
    $trial = "Y";
}
else {
    $trial = "N";
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <base href="http://<?= Yii::$app->request->getServerName() ?>">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="favicon.ico" rel="icon" type="image/x-icon" />

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body data-trial="<?=$trial?>">



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
                <a class="navbar-brand logo" href="/">
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
                <?=Yii::$app->menu->show("T")?>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!-- Top navbar end -->
</header>
<div class="type" hidden>
<?php
//if($u = Yii::$app->controller->type):
?>
    <?//=($u != 'charts') ? "backlinks/".Html::encode($u) : Html::encode($u);?>

<?//php endif; ?>
</div>
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
                                        <li <?=($this->context->type == "charts")? 'class="active"':""; ?>>
                                            <a href="/report/charts/<?=$url?>">
                                                <i class="fa fa-bold"></i>
                                                Main Report
                                            </a>
                                        </li>
                                        <li <?=($this->context->type == "backlinksdomain")? 'class="active"':""; ?>>
                                            <a href="/report/backlinks/backlinksdomain/<?=$url?>">
                                                <i class="fa fa-globe"></i>
                                                Backlink domains
                                            </a>
                                        </li>
                                        <li <?=($this->context->type == "anchortext")? 'class="active"':""; ?>>
                                            <a href="/report/backlinks/anchortext/<?=$url?>">
                                                <i class="fa fa-reorder"></i>
                                                Anchor texts
                                            </a>
                                        </li>
                                        <li <?=($this->context->type == "anchorurls")? 'class="active"':""; ?>>
                                            <a href="/report/backlinks/anchorurls/<?=$url?>">
                                                <i class="fa fa-star"></i>
                                                Anchor URLs
                                            </a>
                                        </li>
                                        <li>
                                            <a <?php if($url): ?>download="export_<?=$url?>_<?=date("d-m-Y_H:i:s")?>.csv" <?php endif ?> href="/report/export/<?=$url?>">
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

                  <!-- section container start -->
                  <div class="container-fluid container-padded">
                    <div class="row custom-table">
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="panel panel-default panel-more-shadow margin-lr--30">
                              <div class="panel-body panel-body-primary">
                                <div class="input-group input-group-lg">
                                  <label for="" class="control-label custom-label">Site Explorer</label>
                                  <input id="domain-search-imput" type="text" class="form-control index_search_input" value='<?=$url?>' placeholder="Search for specific question, answer or topic...">
                                  <div class="input-group-btn">
                                    <span for="" class="select-custom">
                                      <select name="" id="visites" class="form-control input-lg">
                                        <option value="">Popular</option>
                                        <?php foreach (PopularDomains::get() as $domain): ?>
                                            <option <?=($url != "" && $url == $domain->domain)? "selected" : ""; ?> value="<?=$domain->domain?>"><?=$domain->domain?></option>
                                        <?php endforeach ?>
                                      </select>
                                    </span>
                                  </div>
                                  <div class="input-group-btn">
                                    <button class="btn btn-danger margin-left-10 b-radius-4 index_search_button" type="button">Get report</button>
                                  </div>
                                </div>
                              </div> <!-- panel body end -->
                            </div> <!-- panel end -->
                          </div> <!-- col end --> <!-- end main-searcher -->

                        <?= $content ?>


                        </div>
                      </div>
                    </div>
                  </div>

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
          <img src="/images/credit-cards.png" alt="">
        </div>
        <div class="col-sm-12 col-md-4 text-center">
          <img src="/images/viriied-icons.png" alt="">
        </div>
      </div>
    </div>
    <div class="container">
        <div class="row">
           
                <ul class="list-inline text-center">
                    <li><small>Copyright © <?=date("Y")?></small></li>
                    <li><small><a href="#">All rights reserved</a></small></li>
                </ul>
           </div>
    </div>
</footer>


<?php $this->endBody() ?>

<?php if (Yii::$app->controller->type == 'charts' && Yii::$app->controller->url): ?>
    <script src="/js/drawing-charts.js"></script>
<?php endif ?>
</body>
</html>
<?php $this->endPage() ?>
