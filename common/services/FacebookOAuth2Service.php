<?php
namespace common\services;

/**
* FacebookOAuth2Service
*/
class FacebookOAuth2Service extends \nodge\eauth\services\FacebookOAuth2Service
{
	protected $scopes = [self::SCOPE_EMAIL];

	protected function fetchAttributes()
	{
		$info = $this->makeSignedRequest('me');

		$this->attributes['id'] = $info['id'];
		$this->attributes['name'] = $info['name'];
		$this->attributes['url'] = $info['link'];
		$this->attributes['email'] = $info['email'] ? $info['email'] : $info['id'] . "@facebook.com";

		return true;
   }
}