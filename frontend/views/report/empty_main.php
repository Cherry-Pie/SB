<?php 
use yii\helpers\Html;
use common\models\Pages;

$page = false;
if (Yii::$app->options->get(3)->value != 'error') {
	$page = Pages::findOne(Yii::$app->options->get(3)->value);
}
?>
<?php if ($page !== false): ?>
<div class="col-md-12 banner-section" id="alertSection"> <!-- START "please register banner" -->
  <div class="row">
    <div class="col-md-12 box">
      
    </div>
  </div>
</div> <!-- col end --> <!-- end .banner-section -->
<div class="col-md-12">
  <h1 align="center">
    <?=$page->title?>
  </h1>
  <hr>
  <div class="textBody">
    <?=$page->text?>
  </div>
</div>
<?php else: ?>
<h2>Введите желаемый URL для его анализа</h2>
<?php endif ?>