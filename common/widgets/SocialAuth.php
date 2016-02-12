<?php
/**
 * @link http://evnedevelopers.com/
 * @copyright Copyright (c) 2015 Evne Developers
 */

namespace common\widgets;

/**
 * @author Andrey Dabich <dabich@evne.com.ua>
 */
class SocialAuth extends \nodge\eauth\Widget
{
	public function init()
	{
		parent::init();
	}

	public function run()
	{
		// parent::run();
		echo $this->render('social-auth/widget', [
			'id' => $this->getId(),
			'services' => $this->services,
			'action' => $this->action,
			'popup' => $this->popup,
			'assetBundle' => $this->assetBundle,
		]);
	}
}
