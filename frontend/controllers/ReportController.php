<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use frontend\models\LoginForm;
use frontend\models\ContactForm;
use frontend\models\Webmeup;
use frontend\models\PopularDomains;

class ReportController extends Controller
{

	public $type;

	public $url;

	public $page_title = 'Title';

	public $pages = ['backlinksdomain' => ['title' => 'Backlinks domain', 'ico_class' => 'fa fa-globe'],
					'anchortext' => ['title' => 'Anchor texts', 'ico_class' => 'fa fa-reorder'],
					'anchorurls' => ['title' => 'Anchor URLs', 'ico_class' => 'fa fa-star']
				];

	public function actionIndex()
	{
		return $this->render('empty_main');
	}

	public function actionCharts($url = false){
		$this->type = 'charts';
		if ($url && PopularDomains::checkPopular($url)) {
			$this->url = $url;

			Yii::$app->session->set('url' ,$url);
			$webmeup = new Webmeup;
			$webmeup->addCookie($url);
			$this->page_title = "Backlink profile report - " . $url.', '.$webmeup->get_title($url);
			$result = $webmeup->prepearResponce($webmeup->getResponce($url), $url);
			ksort($result['stock_market_index']['images']);
			ksort($result['stock_market_index']['nofollow']);
			ksort($result['stock_market_index']['dofollow']);
			if(count($result['stock_market_index']['images']) == 0 && count($result['stock_market_index']['nofollow']) == 0 && count($result['stock_market_index']['dofollow']) == 0) {
				$result = false;
			}
			return $this->render('main', [
				'result' => $result,
				'conclusion' => $this->renderPartial('conclusion', ['result' => $webmeup->conclusion($url)])
				]);
		}
		return $this->render('empty_main');
	}

	public function actionSendmail(){
		$webmeup = new Webmeup();
		echo $webmeup->sendmail(Yii::$app->request->post('email'), Yii::$app->request->post('href'));
	}

	public function actionExport($url = false){
		$this->type = 'export';
		if ($url) {
			$model = new Webmeup;
			Yii::$app->session->set('url' ,$url);
			$array = json_decode($model->export($url), true);
			$f = fopen('php://output', 'w');
			$firstLineKeys = false;
			foreach ($array as $line)
			{
				if (empty($firstLineKeys))
				{
					$firstLineKeys = array_keys($line);
					fputcsv($f, $firstLineKeys);
					$firstLineKeys = array_flip($firstLineKeys);
				}
				// Using array_merge is important to maintain the order of keys acording to the first element
				fputcsv($f, array_merge($firstLineKeys, $line));
			}
			echo $f;
			Yii::$app->end();
		}
		return $this->render('empty_main');
	}

	public function actionBacklinks($type, $url = false)
	{
		$this->type = $type;
		switch ($type) {
			case 'backlinksdomain':
				$this->page_title = 'Backlinks domain';
				break;
			case 'anchortext':
				$this->page_title = 'Anchor text';
				break;
			case 'anchorurls':
				$this->page_title = 'Anchors URLs';
				break;
		}
		$template = 'empty_main';
		$webmeup = new Webmeup;
		$webmeup->addCookie($url);
		if ($url){
			Yii::$app->session->set('url' ,$url);
			$model = new Webmeup;
			$this->page_title .= " - " . $url.', '.$model->get_title($url);
			$this->url = $url;
			$template = 'backlinks_domian';
		}
		$result = $webmeup->prepearResponce($webmeup->getResponce($url), $url);
		if(count($result['stock_market_index']['images']) == 0 && count($result['stock_market_index']['nofollow']) == 0 && count($result['stock_market_index']['dofollow']) == 0) {
			$result = false;
		}
		return $this->render($template, ['type' => $type, 'result' => $result]);
	}

	public function actionExporturls(){
		$url = Yii::$app->request->get('url');
		$search = Yii::$app->request->get('search');
		$type = Yii::$app->request->get('type');
		$model = new Webmeup;

		$array = $model->respone($url, $type, $search);
		$f = fopen('php://output', 'w');
		$firstLineKeys = false;
		$allArray = [];
		foreach ($array as $line)
		{
			$line = (array) $line;
			if (is_object(end($line))) {
				foreach ($line as $l) {
					$allArray[] = (array) $l;
				}
				break;
			}
			if (empty($firstLineKeys))
			{
				$firstLineKeys = array_keys($line);
				fputcsv($f, $firstLineKeys);
				$firstLineKeys = array_flip($firstLineKeys);
			}
			// Using array_merge is important to maintain the order of keys acording to the first element
			fputcsv($f, array_merge($firstLineKeys, $line));
		}

		if (!empty($allArray)) {
			foreach ($allArray as $line) {
				if (empty($firstLineKeys))
				{
					$firstLineKeys = array_keys($line);
					fputcsv($f, $firstLineKeys);
					$firstLineKeys = array_flip($firstLineKeys);
				}
				// Using array_merge is important to maintain the order of keys acording to the first element
				fputcsv($f, array_merge($firstLineKeys, $line));
			}
		}
		echo $f;

		Yii::$app->end();
	}

	public function actionAjaxresponse(){
		if ($filter = Yii::$app->request->post()) {
			parse_str($filter['params'], $filter);
			$webmeup = new Webmeup;
			$result = $webmeup->getResponceFilterd($filter, $filter['url']);
			$template = '';
			switch ($result['template']) {
				case 'backlinksdomain':
					$template = 'backlinksDomainsRenderTable';
					break;
				case 'anchortext':
					$template = 'anchorTextRenderTable';
					break;
				case 'anchorurls':
					$template = 'anchorUrlsRenderTable';
					break;
			}
			if($template == '' || empty($result['res'])) {
				return false;
			}
			return $this->renderPartial($template, ['result' => $result['res'], 'filter' => $filter]);
		}
	}

}