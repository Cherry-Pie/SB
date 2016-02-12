<?php

namespace frontend\models;

use Yii;
use yii\base\Model;


class Webmeup extends Model
{

	const CACHE_TIME = 840000;

	public $api_url = 'http://webmeup.com/partners/backlinks-api/request/1.0/get-backlinks';

	public $params = ['fields' => 'url,urlTitle,anchorUrl,anchorText,isText,isNoFollow,ip,country,dateFound',
					  'partnerAPIKey' => '4fd7428f-bc7f-49f9-85bc-7282bfaс',
					  'limit' => 2000,
					  'format' => 'json'
					];

	public function getResponce($url)
	{
		// Yii::$app->cache->flush();
		if (!$this->cacheChecker($url, 'responce')){
			$s = json_decode($this->curlResponce($this->api_url.'?'.http_build_query($this->params, '', '&').'&url='.$url));
			$this->cacheSeter($url, 'responce', $s);
		}else
			$s = $this->cacheGetter($url, 'responce');
		return $s;
	}

	public function addCookie($url){
		$arr = Yii::$app->request->cookies->getValue('urls');
		if (!$arr)
			Yii::$app->response->cookies->add(new \yii\web\Cookie([ 'name' => 'urls', 'value' => array() ]));
		$arr[$url] = $url;
		Yii::$app->response->cookies->add(new \yii\web\Cookie([ 'name' => 'urls', 'value' => $arr ]));
	}


	public function get_title($url){
		if (!is_numeric(strripos($url, 'http://')))
			$url = 'http://'.$url;
		$str = file_get_contents($url);
		if(strlen($str)>0){
			$str = trim(preg_replace('/\s+/', ' ', $str));
			preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title);
			return (isset($title[1]) && !empty($title[1])) ? $title[1] : 'title';
		}
	}

	public function curlResponce($url) {
	    $options = array(
	        CURLOPT_RETURNTRANSFER => true,
	        CURLOPT_HEADER         => false,
	        CURLOPT_FOLLOWLOCATION => true,
	        CURLOPT_MAXREDIRS      => 10,
	        CURLOPT_ENCODING       => "utf-8",
	        CURLOPT_USERAGENT      => "test",
	        CURLOPT_AUTOREFERER    => true,
	        CURLOPT_CONNECTTIMEOUT => 120,
	        CURLOPT_TIMEOUT        => 120,
	    );

	    $ch = curl_init($url);
	    curl_setopt_array($ch, $options);

	    $content  = curl_exec($ch);

	    curl_close($ch);

	    return $content;
	}

	public function export($url){
		return json_encode($this->getResponce($url)->backlinks);
		Yii::$app->end();
	}

	public function prepearResponce($responce, $url){

		//Metrics

		if (!$this->cacheChecker($url, 'metrics')) {
			$metrics = ['unique_backlinks' => false,
			'to_home_page_balcklinks' => false,
			'to_other_page_balcklinks' => false,
			'nofollow_backlinks' => false,
			'image_backlinks' => false
			];
			foreach ($responce->backlinks as $key => $value) {
				$metrics['unique_backlinks'][$value->anchorUrl] = 1;
				empty(explode('/', $value->anchorUrl)[3]) ? $metrics['to_home_page_balcklinks'][] = 1 : $metrics['to_other_page_balcklinks'][] = +1;
				if ( $value->isNoFollow == 'nofollow' ) $metrics['nofollow_backlinks'][] = 1;
				if ( $value->isText == 'Image' ) $metrics['image_backlinks'][] = 1;
			}
			$metrics = ['unique_backlinks' => count($metrics['unique_backlinks']),
			'to_home_page_balcklinks' => count($metrics['to_home_page_balcklinks']),
			'to_other_page_balcklinks' => count($metrics['to_other_page_balcklinks']),
			'nofollow_backlinks' => count($metrics['nofollow_backlinks']),
			'image_backlinks' => count($metrics['image_backlinks'])
			];
			$sum = array_sum($metrics);
			foreach ($metrics as $key => $value)
				$result['metrics'][$key] = ['procent' => ceil(($value * 100) / $sum), 'value' => $value];
			$this->cacheSeter($url, 'metrics', $result['metrics']);
		}else
			$result['metrics'] = $this->cacheGetter($url, 'metrics');

		//Text and links pictures

		if (!$this->cacheChecker($url, 'text_and_links_pictures')) {
			$res_s = ['image' => [], 'text' => []];
			foreach ($responce->backlinks as $key => $value)
				$value->isText == 'Image' ? $res_s['image'][] = 1 : $res_s['text'][] = 1 ;
			$result['text_and_links_pictures'] = ['image' => ['val' => count( $res_s['image']), 'procent' => ceil((count($res_s['image']) * 100) / count($responce->backlinks)) ], 'text' => ['val' => count( $res_s['text']), 'procent' => ceil((count($res_s['text']) * 100) / count($responce->backlinks)) ]];
			$this->cacheSeter($url, 'text_and_links_pictures', $result['text_and_links_pictures']);
		}else
			$result['text_and_links_pictures'] = $this->cacheGetter($url, 'text_and_links_pictures');

		//Nofollow and dofollow links

		if (!$this->cacheChecker($url, 'nofollow_and_dofollow_links')) {
			$res_s = ['nofollow' => [], 'dofollow' => []];
			foreach ($responce->backlinks as $key => $value)
				$value->isNoFollow == 'dofollow' ? $res_s['dofollow'][] = 1 : $res_s['nofollow'][] = 1 ;
			$result['nofollow_and_dofollow_links'] = ['dofollow' => ['val' => count( $res_s['dofollow']), 'procent' => ceil((count($res_s['dofollow']) * 100) / count($responce->backlinks)) ], 'nofollow' => ['val' => count( $res_s['nofollow']), 'procent' => ceil((count($res_s['nofollow']) * 100) / count($responce->backlinks)) ]];
			$this->cacheSeter($url, 'nofollow_and_dofollow_links', $result['nofollow_and_dofollow_links']);
		}else
			$result['nofollow_and_dofollow_links'] = $this->cacheGetter($url, 'nofollow_and_dofollow_links');

		//Natural and not natural anchors

		if (!$this->cacheChecker($url, 'natural_and_not_naturl_anchors')) {
			$result['natural_and_not_naturl_anchors'] = $this->naturalNotNaturalAnchors($responce->backlinks, $url);
			$this->cacheSeter($url, 'natural_and_not_naturl_anchors', $result['natural_and_not_naturl_anchors']);
		}else
			$result['natural_and_not_naturl_anchors'] = $this->cacheGetter($url, 'natural_and_not_naturl_anchors');

		//Stock market index

		if (!$this->cacheChecker($url, 'stock_market_index')) {
			$result['stock_market_index'] = $this->stockMarketIndex($responce->backlinks);
			$this->cacheSeter($url, 'stock_market_index', $result['stock_market_index']);
		}else
			$result['stock_market_index'] = $this->cacheGetter($url, 'stock_market_index');


		// if (!$this->cacheChecker($url, 'referingAndTotal')) {
			$result['referingAndTotal'] =  $this->referingAndTotal($responce->backlinks, $url);
			// $this->cacheSeter($url, 'referingAndTotal', $result['referingAndTotal']);
		// }else
			// $result['referingAndTotal'] = $this->cacheGetter($url, 'referingAndTotal');

		if (!$this->cacheChecker($url, 'byMapData')) {
			$result['byMapData'] = $this->byMapData($responce->backlinks, $url);
			$this->cacheSeter($url, 'byMapData', $result['byMapData']);
		}else
			$result['byMapData'] = $this->cacheGetter($url, 'byMapData');
		return $result;
	}

	public function byMapData($backlinks, $url = false){
		$total = count($backlinks);
		$res = [];
		foreach ($backlinks as $key => $value){
			(!isset($res[$value->country])) ? $res[$value->country] = 0 : false;
			$res[$value->country] = $res[$value->country] + 1;
		}
		foreach ($res as $key => $value)
			$tmp[] = ['code' => strtoupper($key), 'name' => 'test', 'value' => $value];
		foreach ($tmp as $key => $value)
			$popular[$value['value'].' / '.$value['code']] = ['procent' => ceil(($value['value'] / $total) * 100), 'code' => $value['code'], 'value' => $value['value']];
		$my_country_code = $this->getMyCountryCode();
		arsort($popular);
		$popular = array_chunk($popular, 5)[0];
		$my_region_count = 0;
		foreach ($tmp as $key => $value){
			if( $value['code'] == $my_country_code ){
				$my_region_count = $value['value'];
				break;
			}
		}
		$m = ceil(($my_region_count / $total) * 100);
		$t = ['my_region' => ['procent' => $m, 'value' => $my_region_count], 'other_region' => ['procent' => 100 - $m, 'value' => $total - $my_region_count]];
		$zones = $this->topDomain($backlinks);
		$total_zones_count = 0;
		if ($zones)
			$total_zones_count = array_sum($zones);

		$z = [];
		$zones_procent = [];
		if ($zones) {
			foreach ($zones as $key => $value)
				$zones_procent[str_replace('/', '', $key)] = ceil(($value / $total_zones_count) * 100);
			foreach ($zones as $key => $value)
				$z[str_replace('/', '', $key)] = $value;
		}



		return ['popular_countries' => $popular, 'my_other_regions' => $t, 'map_data' => $tmp, 'zones' => $z, 'zones_procent' => $zones_procent];
	}

	public function topDomain($backlinks){
		$result = false;
		foreach ($backlinks as $value_domain){
			if (!filter_var($value_domain->url, FILTER_VALIDATE_IP)) {
				$domain = explode('.', $value_domain->url);
				unset($domain[0]);
				$str = implode('.', $domain);
				if (strlen($str) < 8) {
					$zones[] = $str;
					unset($domain);
				}

			}
		}
		if (!empty($zones)) {
			$count_zones = array_count_values($zones);
			arsort($count_zones);
			$tpm = array_chunk($count_zones, 5, TRUE);
			$result = $tpm[0];
		}

		return $result;
	}

	public function getMyCountryCode(){
		return json_decode(explode(')', explode('(', file_get_contents('http://www.telize.com/geoip?callback=getgeoip'))[1])[0])->country_code;
	}

	public function naturalNotNaturalAnchors($refpages, $url){
			$i = 0;
			foreach ($refpages as $key => $value)
				$tmp_array[$value->anchorText][] = 1;

			foreach ($refpages as $key => &$value)
				$value->refdomains = count($tmp_array[$value->anchorText]);
			$notnatural_keywords_str = "have a peek at this web-site|Source|have a peek here|Check This Out|this contact form|navigate here|his comment is here|weblink|check over here|this content|have a peek at these guys|check my blog|news|More about the author|click site|navigate to this website|my review here|get redirected here|useful reference|this page|Get More Info|see here|this website|great post to read|my company|imp source|click to read more|find more info|see it here|Homepage|a fantastic read|find this|Bonuses|read this article|click here now|browse this site|check here|original site|my response|pop over to these guys|my site|dig this|i thought about this|check this link right here now|his explanation|why not try these out|more info here|official site|look at this site|check it out|visit|click for more info|check these guys out|view publisher site|Get More Information|you can try this out|see this|learn this here now|directory|why not find out more|navigate to these guys|see this here|check my site|anchor|other|additional hints|look at this web-site|their explanation|internet|find more|Read More Here|here|Visit Website|hop over to this website|click|her latest blog|This Site|read review|try here|Clicking Here|page|read this post here|More Bonuses|recommended you read|go to this web-site|this|check that|Go Here|More hints|you could check here|Continued|More Help|try this|you could try here|website here|useful source|read the full info here|Discover More|click resources|over here|like this|Learn More|site web|navigate to this web-site|pop over to this website|Get the facts|our website|great site|try this out|visit the website|you could look here|content|go to this site|website link|read this|official statement|reference|check out the post right here|additional info|my link|additional reading|important source|you can check here|this link|see post|next|click reference|visit site|look here|try this web-site|Going Here|click to read|check this site out|go to website|you can look here|read more|more|explanation|use this link|a knockout post|best site|blog here|her explanation|discover this info here|he has a good point|check my source|straight from the source|anonymous|go to my blog|hop over to these guys|find here|article|click to investigate|look at here now|here are the findings|view|click to find out more|important site|click here to investigate|browse around this site|click for more|why not try here|important link|address|hop over to this web-site|my website|browse around here|Recommended Site|Your Domain Name|Web Site|click this site|hop over to this site|i was reading this|click here to read|read here|i loved this|my blog|click now|you can try these out|informative post|top article|useful site|click this over here now|moved here|resource|about his|navigate to this site|click this|click here for more info|investigate this site|more helpful hints|read|over at this website|find|go to the website|try this site|look at more info|look what i found|Full Report|websites|Extra resources|get more|like it|click here for more|find out here now|this hyperlink|home|site here|discover here|click here for info|try this website|go|look at here|Visit Your URL|see this website|visit this page|Click Here|check this|browse around these guys|redirected here|visit this site right here|review|have a peek at this website|right here|why not try this out|article source|visite site|web link|you could try this out|description|my latest blog post|find out this here|wikipedia reference|find more information|continue reading this|this post|index|official website|go to these guys|learn the facts here now|Related Site|Click This Link|Visit This Link|you can try here|linked here|visit homepage|web|YOURURL.com|you can find out more|see this site|additional resources|Website|pop over to this site|view it now|their website|special info|you could try these out|site|Check Out Your URL|my explanation|helpful site|More Info|go right here|this article|visit their website|check out here|he said|official source|Look At This|see page|find out here|look these up|Find Out More|go now|that site|image source|useful content|sites|view it|Full Article|click over here now|visit this web-site|see|Our site|read the article|next page|look at this now|find out|Read Full Report|see here now|visit here|click here to find out more|why not check here|her response|published here|check|discover this|from this source|basics|read what he said|visit the site|browse around this web-site|visit this site|link|click for source|click this link now|blog|why not look here|more information|look at these guys|site link|helpful hints|pop over to this web-site|go to my site|see this page|browse around this website|view website|my sources|webpage|Discover More Here|Learn More Here|company website|click for info|Read Full Article|his response|click over here|take a look at the site here|more tips here|helpful resources|check out this site|look at this website|have a peek at this site|the original source|Continue|visit our website|visit this website|go to this website|pop over here|Home Page|Recommended Reading|these details|advice|try these out|check my reference|her comment is here|useful link|Resources|hop over to here|click this link here now|blog link|Continue Reading";
			$notnatural_keywords = explode('|', $notnatural_keywords_str);
			$name = explode('.', $url)[0];
			$total = 0;
			foreach ( $refpages as $key => $value )
				$total = $total + $value->refdomains;

			foreach ($refpages as $key => $value) {
				$tmpo[$value->anchorText] = $value;
			}
			unset($refpages);
			foreach ($tmpo as $key => $value)
				$refpages[] = $value;
			$notnatural_count = 0;
			$total_anchor = 0;
			foreach ( $refpages as $key => &$value ){
				if ($value->anchorText) {
					$total_anchor++;
					if (!substr_count($value->anchorText, 'http') && !substr_count(strtolower($value->anchorText), strtolower($url)) && !substr_count($value->anchorText, 'www')) {
						$i = 0;
						foreach ($notnatural_keywords as $keyword)
							if ($keyword == $value->anchorText)
								$i++;
						if (!$i) {
							$s_tmp[$key] = $value;
							$s_tmp[$key]->procent = ceil(($value->refdomains * 100) / $total);
						}
						unset($i);
					}
				}
			}
			foreach ($s_tmp as $key => $value)
				$dirt_anchor[$key] = $value->anchorText;
			unset($tmp);
			$clear_ancors = array_unique($dirt_anchor);
			foreach ($clear_ancors as $key => $value)
				$tmp[$key] = $s_tmp[$key];
			$total_links = $total_anchor;
			$natural_count = count($tmp);
			$notnatural_count = $total_anchor - $natural_count;
			$total = 0;
			$procent['natural'] = ceil(($natural_count * 100) / $total_links);
			$procent['not_natural'] = ceil(($notnatural_count * 100) / $total_links);
			$top_tmp = [];
			foreach ($tmp as $key => $value)
				if ($value->refdomains >= 10)
					$top_tmp[$value->refdomains] = $value;
			krsort($top_tmp);
			$re = [];
			if ($re = array_chunk($top_tmp, 5))
				$top_five = $re[0];
			else
				$top_five = [];
			foreach ($top_five as $key => $value)
				$total = $total + $value->refdomains;
			foreach ($top_five as &$value)
				$value->procent = ceil(($value->refdomains * 100) / $total);
			if ($notnatural_count < 55){
				$findings = 'Часть ваших ссылок имеет не естественный анкор лист. Такое распределение анкоров значительно повышает риски попадания сайта под фильтр из-за неестественной ссылочной массы';
				$solution = 'Продолжайте наращивать безанкорные ссылки, что бы в дальнейшем обезопасить ваш сайт от санкций поисковых систем';
			}
			else{
				$findings = 'Часть ваших ссылок имеет не естественный анкор лист. Такое распределение анкоров значительно повышает риски попадания сайта под фильтр из-за неестественной ссылочной массы';
				$solution = 'Необходимо как можно скорее отказаться от части спамных ссылок, заменив их естественными. Также рекомендуем расширить семантическое ядро, что бы сделать продвижение отдельных ключевых слов не таким агрессивным';
			}
			 return [
							'total_links' => $total_links,
							'natural_count' => $natural_count,
							'not_natural' => $notnatural_count,
							'top_five' => $top_five,
							'findings' => $findings,
							'solution' => $solution,
							'procent' => $procent
						];
	}


	public function stockMarketIndex($res){
		$time_arr = ['images' => [], 'nofollow' => [], 'dofollow' => []];
		foreach ($res as $key => $value) {
			$value->isText == 'Image' ? $time_arr['images'][$value->dateFound][] = $value : false;
			$value->isNoFollow == 'dofollow' ? $time_arr['dofollow'][$value->dateFound][] = $value : $time_arr['nofollow'][$value->dateFound][] = $value;
		}
		return $time_arr;
	}

	public function referingAndTotal($res, $url){
		$total = count($res);
		$pages = ['total_links' => [], 'reffering_domain' => []];
		foreach ($res as $key => $value)
			$pages['total_links'][$value->anchorUrl][] =  $value;
		foreach ($pages['total_links'] as $key => $value)
			foreach ($value as $k_trast => $trast)
				$pages['reffering_domain'][$key][$trast->url] = $trast;

		$to_home_page = ['reffering_domain' => 0, 'total_links' => 0];

		foreach ($pages as $pak => $pav){
			foreach ($pav as $key => $value){
				$pages[$pak][$key]['count'] = count($value);
				$pages[$pak][$key]['procent'] = ceil((count($value) * 100) / $total);
				foreach ($value as $k_trast => $trast){
					if (!parse_url($k_trast)['path'] || parse_url($k_trast)['path'] == '/'){
						($pak == 'reffering_domain') ? $to_home_page['reffering_domain']++ : $to_home_page['total_links']++;
					}
				}
			}
		}

		foreach ($pages['total_links'] as $key => $value)
			$tot_arr[$value['procent']][] = [$value[0], 'count' => $value['count'], 'procent' => $value['procent']];

		krsort($tot_arr);

		$i = 0;
		foreach ($tot_arr as $key => $value) {
			foreach ($value as $key_m => $value_m) {
				if ($i >= 5)
					break;
				$tot_arr_top[] = $value_m;
				$i++;
			}
		}

		$pages['total_links'] = $tot_arr_top;


		foreach ($pages['reffering_domain'] as $key => $value)
			$ref_arr[$value['procent']][] = $value;

		krsort($ref_arr);

		$i = 0;
		foreach ($ref_arr as $key => $value) {
			if ($i >= 5)
				break;
				foreach ($value as $key_m => $value_m) {
					$ref_arr_top[] = [current($value_m), 'procent' => $value_m['procent'], 'count' => $value_m['count']];
						break;
				}
			$i++;
		}

		$pages['reffering_domain'] = $ref_arr_top;

		$p = ['total_links' =>
					['homepage_val' => $to_home_page['total_links'] ,
					 'procent' => ['other' => (100 - ceil(($to_home_page['total_links'] * 100) / count($res))),
					 			   'home' => ceil(($to_home_page['total_links'] * 100) / count($res))
					 			  ]
					],
			  'reffering_domain' =>
					['homepage_val' => $to_home_page['reffering_domain'] ,
					 'procent' => ['other' => (100 - ceil(($to_home_page['reffering_domain'] * 100) / count($res))),
					 			   'home' => ceil(($to_home_page['reffering_domain'] * 100) / count($res))
					 			  ]
					]
			];
		if ($p['total_links']['procent']['home'] > 55)
			$color = 'red';
		else
			$color = 'green';
		$text['total_links'] = "Более <span style='color: ".$color.";'>".$p['total_links']['procent']['home']."% (".$p['total_links']['homepage_val']." links)</span> всех ссылок ссылаються на главную страницу, и ".$p['total_links']['procent']['other']." % на другие страници сайта";
		$text['reffering_domain'] = "Более  <span style='color: ".$color.";'>".$p['reffering_domain']['procent']['home']."% (".$p['reffering_domain']['homepage_val']." links)</span> всех ссылок ссылаються на главную страницу, и ".$p['total_links']['procent']['other']." % на другие страници сайта";


		if ($p['total_links']['procent']['home'] > 55){
			$findings['total_links'] = 'Большинство ваших ссылок ссылаются на главную страницу вашего сайта, что говорит о неестественности ссылочного профиля';
			$solution['total_links'] = 'Такое распределение ссылок, говорит о неестественности ссылочного профиля. Наращивайте ссылки на внутренние страницы вашего сайта';
		}
		else{
			$findings['total_links'] = 'Большинство ваших ссылок распределенны равномерно по всем страницам сайта';
			$solution['total_links'] = 'Продолжайте наращивать ссылки на внутренние страницы вашего сайта';
		}

		if ($p['reffering_domain']['procent']['home'] > 55){
			$findings['reffering_domain'] = 'Большинство ваших ссылок ссылаются на главную страницу вашего сайта, что говорит о неестественности ссылочного профиля';
			$solution['reffering_domain'] = 'Такое распределение ссылок, говорит о неестественности ссылочного профиля. Наращивайте ссылки на внутренние страницы вашего сайта';
		}
		else{
			$findings['reffering_domain'] = 'Большинство ваших ссылок распределенны равномерно по всем страницам сайта';
			$solution['reffering_domain'] = 'Продолжайте наращивать ссылки на внутренние страницы вашего сайта';
		}

		return ['findings' => $findings, 'solution' => $solution, 'text' => $text, 'pages' => $pages, 'stats' => $p];

	}

	public function sendmail( $email , $url ){
		return mail($email, 'Scanbacklinks Report', $url);
	}

	public function getLastEffectiveUrl($url){
		$headers = get_headers($url);

		foreach ($headers as $value)
			$tmp[explode(':', $value)[0]] = $value;


		if (isset($tmp['Location'])){
			$location = explode(':', $tmp['Location']);
			unset($location[0]);
			$location = implode(':', $location);
		}
		else
			$location = $url;



	    return $location;
	}

	public function respone($url, $type = false, $search = false){
		$backlinks = $this->getResponce($url)->backlinks;
		$res = [];
		switch ($type) {
			case 'anchortext':
				foreach ($backlinks as $key => $value)
					if ($value->anchorText == $search)
						$res[] = $value;
				break;
			case 'backlinksdomain':
				foreach ($backlinks as $key => $value)
					if (parse_url($value->url)['host'] == $search)
						$res[] = $value;
				break;
			case 'anchorurls':
				foreach ($backlinks as $key => $value)
					if ($value->anchorUrl == $search)
						$res[] = $value;
				break;
			case 'all':
				$res[] = $backlinks;
				break;
		}
		return $res;
	}


	public function getResponceFilterd($filter, $url){


		$backlinks = $this->getResponce($url)->backlinks;

		if ($filter['filter']['type'] == 'backlinksdomain'){
			foreach ($backlinks as $key => $value)
				$tmp[parse_url($value->url)['host']][] = $value;

			foreach ($tmp as $key => $value) {
				foreach ($value as $key_v => $value_v) {

					// done
					if ($filter['filter']['nofollowDofollow'] != 'all'){
						if ($filter['filter']['nofollowDofollow'] == 'dofollow' && $value_v->isNoFollow == 'nofollow') {

							unset($tmp[$key][$key_v]);
						}
						if ($filter['filter']['nofollowDofollow'] == 'nofollow' && $value_v->isNoFollow == 'dofollow') {
							unset($tmp[$key][$key_v]);
						}
					}
					// done
					if ($filter['filter']['image'] != 'all') {
						if ($filter['filter']['image'] == 'noImage' && $value_v->isText == 'Image') {
							unset($tmp[$key][$key_v]);
						}
						if ($filter['filter']['image'] == 'image' && $value_v->isText == 'Text') {
							unset($tmp[$key][$key_v]);
						}
					}
					// done
					if ($filter['filter']['dateStart']) {
						if ( strtotime( $filter['filter']['dateStart'] ) >= strtotime( $value_v->dateFound ) ) {
							unset($tmp[$key][$key_v]);
						}
					}
					// done
					if ($filter['filter']['dateLimit']) {
						if ( strtotime( $filter['filter']['dateLimit'] ) <= strtotime( $value_v->dateFound ) ) {
							unset($tmp[$key][$key_v]);
						}
					}
					
					// if ($filter['filter']['text']) {
					// 	if ($filter['filter']['anchorDomain'] == 'anchor') {
					// 		if ($value_v->anchorText != $filter['filter']['text']) {
					// 			unset($tmp[$key][$key_v]);
					// 		}
					// 	}else{
					// 		if (parse_url($value_v->url)['host'] != $filter['filter']['text']) {
					// 			unset($tmp[$key][$key_v]);
					// 		}
					// 	}
					// }

					if (count($filter['filter']['text']) > 0 && $filter['filter']['text'][0]) {
						
						foreach ($filter['filter']['anchorDomain'] as $indextype => $typevalue) {
							$issetText = -1;
							$issetUrl  = -1;
							if ($typevalue == 'anchor') {
								foreach ($filter['filter']['text'] as $indextext => $textvalue) {
									if(stristr($value_v->anchorText, $textvalue)) {
										$nodell['text'][] = $value_v->anchorText;
										break;
									}
								}
							}
							else
							{
								foreach ($filter['filter']['text'] as $indextext => $textvalue) {
									if(stristr($value_v->url, $textvalue)) {
										$nodell['url'][] = $value_v->url;
										break;
									}
								}
							}
						}
						if(!in_array($value_v->url, $nodell['url']) && !in_array($value_v->anchorText, $nodell['text'])) {
							unset($tmp[$key][$key_v]);
						}
					}
				}
			}
		}
		if ($filter['filter']['type'] == 'anchortext') {
			foreach ($backlinks as $key => $value)
				$tmp[$value->anchorText][parse_url($value->url)['host']][] = $value;
		}

		if ($filter['filter']['type'] == 'anchorurls') {
			foreach ($backlinks as $key => $value)
				$tmp[$value->anchorUrl][parse_url($value->url)['host']][] = $value;
		}
		if ($filter['filter']['type'] != 'backlinksdomain') {
			foreach ($tmp as $key => $value) {
				foreach ($value as $ptk => $ptv) {
					foreach ($ptv as $key_v => $value_v) {

						if ($filter['filter']['nofollowDofollow'] != 'all'){

							if ($filter['filter']['nofollowDofollow'] == 'dofollow' && $value_v->isNoFollow == 'nofollow') {
								unset($tmp[$key][$ptk][$key_v]);
							}
							if ($filter['filter']['nofollowDofollow'] == 'nofollow' && $value_v->isNoFollow == 'dofollow') {
								unset($tmp[$key][$ptk][$key_v]);
							}
						}
						if ($filter['filter']['image'] != 'all') {
							if ($filter['filter']['image'] == 'noImage' && $value_v->isText == 'Image') {
								unset($tmp[$key][$ptk][$key_v]);
							}
							if ($filter['filter']['image'] == 'image' && $value_v->isText == 'Text') {
								unset($tmp[$key][$ptk][$key_v]);
							}
						}
						if ($filter['filter']['dateStart']) {
							if ( strtotime( $filter['filter']['dateStart'] ) >= strtotime( $value_v->dateFound ) ) {
								unset($tmp[$key][$ptk][$key_v]);
							}
						}
						if ($filter['filter']['dateLimit']) {
							if ( strtotime( $filter['filter']['dateLimit'] ) <= strtotime( $value_v->dateFound ) ) {
								unset($tmp[$key][$ptk][$key_v]);
							}
						}
						if ($filter['filter']['text'] && $filter['filter']['type'] == 'anchortext') {
							$nodell['text'] = [];
							$nodell['url'] = [];
							// if ($filter['filter']['anchorDomain'] == 'anchor') {
							// 	if (trim($key) != trim($filter['filter']['text'])) {
							// 		unset($tmp[$key]);
							// 	}
							// }else{
							// 	if (trim(parse_url($value_v->url)['host']) != trim($filter['filter']['text'])) {
							// 		unset($tmp[$key][$ptk][$key_v]);
							// 	}
							// }
							if (count($filter['filter']['text']) > 0 && $filter['filter']['text'][0]) {
								$gotext = -1;
								$gourl  = -1;
								foreach ($filter['filter']['anchorDomain'] as $indextype => $typevalue) {
									if ($typevalue == 'anchor') {
										foreach ($filter['filter']['text'] as $indextext => $textvalue) {
											$gotext++;
											if(stristr($key, $textvalue)) {
												$nodell['text'][] = $key;
												break;
											}
										}
									}
									else
									{
										foreach ($filter['filter']['text'] as $indextext => $textvalue) {
											$gourl++;
											if(stristr($value_v->url, $textvalue)) {
												$nodell['url'][] = $value_v->url;
												break;
											}
										}
									}
								}
								if(!in_array($key, $nodell['text']) && $gotext >= 0) {
									unset($tmp[$key]);
								}
								if(!in_array($value_v->url, $nodell['url']) && $gourl >= 0) {
									unset($tmp[$key][$ptk][$key_v]);
								}
							}
						}elseif ($filter['filter']['text'] && $filter['filter']['type'] == 'anchorurls') {
							// if ($filter['filter']['anchorDomain'] == 'anchor') {
							// 	if (trim($value_v->anchorText) != trim($filter['filter']['text'])) {
							// 		unset($tmp[$key][$ptk][$key_v]);
							// 	}
							// }else{
							// 	if (trim(parse_url($value_v->url)['host']) != trim($filter['filter']['text'])) {
							// 		unset($tmp[$key][$ptk][$key_v]);
							// 	}
							// }
							if (count($filter['filter']['text']) > 0 && $filter['filter']['text'][0]) {
								$gotext = -1;
								$gourl  = -1;
								foreach ($filter['filter']['anchorDomain'] as $indextype => $typevalue) {
									if ($typevalue == 'anchor') {
										foreach ($filter['filter']['text'] as $indextext => $textvalue) {
											$gotext++;
											if(stristr($key, $textvalue)) {
												$nodell['text'][] = $key;
												break;
											}
										}
									}
									else
									{
										foreach ($filter['filter']['text'] as $indextext => $textvalue) {
											$gourl++;
											if(stristr($value_v->url, $textvalue)) {
												$nodell['url'][] = $value_v->url;
												break;
											}
										}
									}
								}
								if(!in_array($key, $nodell['text']) && $gotext >= 0) {
									unset($tmp[$key]);
								}
								if(!in_array($value_v->url, $nodell['url']) && $gourl >= 0) {
									unset($tmp[$key][$ptk][$key_v]);
								}
							}
						}
					}
				}
			}
		}
		if ($filter['filter']['type'] == 'anchortext' || $filter['filter']['type'] == 'anchorurls') {
			// foreach ($tmp as $key => $value) {
			// 	foreach ($value as $key_p => $value_p) {
			// 		if (empty($value_p)) {
			// 			unset($tmp[$key][$key_p]);
			// 		}
			// 	}
			// 	if (empty($tmp[$key])) {
			// 		unset($tmp[$key]);
			// 	}
			// }
		}

		return ['res' => $tmp, 'template' => $filter['filter']['type']];
	}

	public function conclusion($url){

		if (! ($conclusion = $this->cacheGetter($url, 'conclusion'))) {

			$metrics = $this->cacheGetter($url, 'metrics');
			$map = $this->cacheGetter($url, 'byMapData');
			$anchor_urls = $this->cacheGetter($url, 'referingAndTotal');
			$conclusion['good'] = [];
			$conclusion['bad'] = []; 
			$conclusion['averages'] =[];


			// complete !
			if ($metrics['image_backlinks']['procent'] > 10)
				$conclusion['good']['img_hrefs'] = 'Количество ссылок картинок';
			elseif($metrics['image_backlinks']['procent'] >= 8 && $metrics['image_backlinks']['procent'] < 10)
				$conclusion['averages']['img_hrefs'] = 'Количество ссылок картинок';
			else
				$conclusion['bad']['img_hrefs'] = 'Количество ссылок картинок';
			// ---
			if ($metrics['nofollow_backlinks']['procent'] > 12)
				$conclusion['good']['noffolow'] = 'количество nofollow ссылок';
			elseif($metrics['nofollow_backlinks']['procent'] >= 8 && $metrics['nofollow_backlinks']['procent'] < 12)
				$conclusion['averages']['noffolow'] = 'Количество ссылок картинок';
			else
				$conclusion['bad']['noffolow'] = 'количество nofollow ссылок';
			// ---
			if ($map['my_other_regions']['my_region']['procent'] > 60)
				$conclusion['good']['map'] = 'Количество ссылок с вашего региона';
			elseif($map['my_other_regions']['my_region']['procent'] >= 50 && $map['my_other_regions']['my_region']['procent'] < 60)
				$conclusion['averages']['map'] = 'Количество ссылок с вашего региона';
			else
				$conclusion['bad']['map'] = 'Количество ссылок с вашего региона';
			// ---
			if ($anchor_urls['stats']['reffering_domain']['procent']['home'] < 35)
				$conclusion['bad']['anchor_urls_type'] = 'Количество ссылок с разными анкором';
			elseif($anchor_urls['stats']['reffering_domain']['procent']['home'] >= 25 && $anchor_urls['stats']['reffering_domain']['procent']['home'] < 35)
				$conclusion['averages']['anchor_urls_type'] = 'Количество ссылок с прямым анкором';
			else
				$conclusion['good']['anchor_urls_type'] = 'Количество ссылок с прямым анкором';
			// ---
			if ($anchor_urls['stats']['total_links']['procent']['home'] < 40)
				$conclusion['bad']['anchor_urls'] = 'Количество ссылок на внутренние страницы (Total links)';
			elseif ($anchor_urls['stats']['total_links']['procent']['home'] >= 30 && $anchor_urls['stats']['total_links']['procent']['home'] < 40)
				$conclusion['averages']['anchor_urls'] = 'Количество ссылок на внутренние страницы (Total links)';
			else
				$conclusion['good']['anchor_urls'] = 'Количество ссылок на внутренние страницы (Total links)';
			//!

			$this->cacheSeter($url, 'conclusion', $conclusion);
		}

		return $conclusion;

	}


	public function cacheSeter($url, $key, $data) {
	    Yii::$app->cache->set($url . $key, $data, self::CACHE_TIME);
	}

	public function cacheGetter($url, $key = '') {
	   return Yii::$app->cache->get($url . $key);
	}

	public function cacheChecker($url, $key = '') {
		return !empty(Yii::$app->cache->get($url . $key));
	}


	public static function countsItem($url,$type,$all = false) {
        $webmeup = new Webmeup;
        if($all === false) {
	        $filter = [
	            "filter"    => [
	                "type" => $type
	            ],
	            "url"       => $url
	        ];

	        $result = $webmeup->getResponceFilterd($filter,$filter['url']);
	        
	        return count($result['res']);
        }
        else {
        	$result = $webmeup->getResponce($url);
        	return count($result->backlinks);
        }
    }

    public static function getAnchorType($item) {
    	if($item->isText == 'Image') {
    		$class = 'image';
    	}
    	else {
    		if ( $value_cs->isNoFollow == 'nofollow' ) 
    			$class = "nofollow"; 
    		else 
    			$class = "dofollow";
    	}
    	return '<span class="'.$class.'"></span>';
    }
}