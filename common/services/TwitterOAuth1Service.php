<?php
namespace common\services;

/**
* TwitterOAuth1Service
*/
class TwitterOAuth1Service extends \nodge\eauth\services\TwitterOAuth1Service
{
	/**
	 * @return bool
	 */
	protected function fetchAttributes()
	{
		$info = $this->makeSignedRequest('account/verify_credentials.json');


		$this->attributes['id'] = $info['id'];
		$this->attributes['name'] = $info['name'];
		$this->attributes['url'] = 'http://twitter.com/account/redirect_by_id?id=' . $info['id_str'];

		$this->attributes['username'] = $info['screen_name'];
		$this->attributes['language'] = $info['lang'];
		$this->attributes['timezone'] = timezone_name_from_abbr('', $info['utc_offset'], date('I'));
		$this->attributes['photo'] = $info['profile_image_url'];

		$this->attributes['email'] = $this->attributes['username'] . "@twitter.com";

		return true;
	}
}