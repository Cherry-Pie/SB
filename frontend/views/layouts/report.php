<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="favicon1.ico" rel="icon" type="image/x-icon" />

    <!-- ===== STYLESHEETS START ===== -->
    <!-- Bootstrap style sheet -->
    <link rel="stylesheet" href="css/lib/bootstrap/bootstrap.css" />

    <!-- Perfect Scrollbar style sheet -->
    <link rel="stylesheet" href="css/lib/perfectscrollbar/perfect-scrollbar.css" />

    <!-- Font Awesome style sheet -->
    <link rel="stylesheet" href="css/lib/font-awesome/font-awesome.min.css">

    <!-- Ionicons style sheet -->
    <link rel="stylesheet" href="css/lib/ionicons/ionicons.min.css">

    <!-- Page specific style sheet -->
    <link rel="stylesheet" href="css/lib/datatables/datatables.css">

    <!-- Date range picker style sheet -->
    <link rel="stylesheet" href="css/lib/daterangepicker/daterangepicker-bs3.css" />

    <!-- Page specific style sheet -->
    <!-- JQ Vector map style sheet -->
    <link rel="stylesheet" href="css/lib/jqvmap/jqvmap.css">

    <!-- Tab drop style sheets -->
    <link rel="stylesheet" href="css/lib/tabdrop/tabdrop.css" />

    <!-- Theme specific style sheets -->
    <link rel="stylesheet" href="css/styles.css" id="theme-css" />

    <!-- User specific style sheets -->
    <link rel="stylesheet" href="css/custom-styles.css" />

    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
