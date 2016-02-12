<?php

use yii\helpers\Html;
use yii\web\View;

/** @var $this View */
/** @var $id string */
/** @var $services stdClass[] See EAuth::getServices() */
/** @var $action string */
/** @var $popup bool */
/** @var $assetBundle string Alias to AssetBundle */

Yii::createObject(['class' => $assetBundle])->register($this);

// Open the authorization dilalog in popup window.
if ($popup) {
	$options = [];
	foreach ($services as $name => $service) {
		$options[$service->id] = $service->jsArguments;
	}
	$this->registerJs('$("#' . $id . '").eauth(' . json_encode($options) . ');');
}

?>
<p>or Signin with:</p>
<?php
foreach ($services as $name => $service) {
	$className = "";
	$subClassName = "";
	switch ($service->id) {
		case 'google_oauth':
			$className = 'google-plus';
			break;
		case 'facebook':
			$className = 'facebook';
			$subClassName = "m-left10";
			break;
		case 'twitter':
			$className = 'twitter';
			$subClassName = "m-left10";
			break;
	}
	echo Html::a("<i class=\"fa fa-$className\"></i>", [$action, 'service' => $name], [
		'class' => "btn btn-sm btn-social-icon btn-$className $subClassName",
		'data-eauth-service' => $service->id,
	]);
}
?>
