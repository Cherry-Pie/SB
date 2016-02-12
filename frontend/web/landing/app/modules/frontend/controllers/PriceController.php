<?php

class PriceController extends IndexController
{

	public function actionIndex()
	{
		$this->view = 'price';

		$this->pageTitle = 'Price';
	}

}