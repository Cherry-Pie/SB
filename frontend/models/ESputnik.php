<?php
namespace frontend\models;

use Yii;

/**
* ESputnik
*/
class ESputnik
{
	private static $_instance;

	private $_user;
	private $_pass;
	private $_output;

	private $_responseType = 'object';

	const METHOD_GET = 'get';
	const METHOD_POST = 'post';

	const RESPONSE_TYPE_JSON = 'json';
	const RESPONSE_TYPE_OBJECT = 'object';

	const URL_ADDRBOOCKS = 'https://esputnik.com.ua/api/v1/addressbooks';
	const URL_CONTACT = 'https://esputnik.com.ua/api/v1/contact';

	public function __construct($user = null, $pass = null)
	{
		$this->_user = $user ? $user : Yii::$app->params['eSputnik_user'];
		$this->_pass = $pass ? $pass : Yii::$app->params['eSputnik_pass'];
	}

	public static function getInstance($user = null, $pass = null)
	{
		if (! self::$_instance)
			self::$_instance = new ESputnik($user, $pass);
		return self::$_instance;
	}

	public function response($url, $method = self::METHOD_GET, $fields = [], $headers = false)
	{
		$ch = curl_init();
		if ($method == self::METHOD_POST) {
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		}
		if ($headers) {
			curl_setopt($ch, CURLOPT_HEADER, 1);
		}
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json', 'Content-Type: application/json']);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERPWD, $this->_user.':'.$this->_pass);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$this->_output = curl_exec($ch);
		curl_close($ch);

		if ($this->_responseType == self::RESPONSE_TYPE_OBJECT) {
			return json_decode($this->_output);
		}
		
		return $this->_output;
	}

	public function asObject()
	{
		$this->_responseType = self::RESPONSE_TYPE_OBJECT;
		return $this;
	}

	public function asJson()
	{
		$this->_responseType = self::RESPONSE_TYPE_JSON;
		return $this;
	}

	public function getAddressBooks()
	{
		return $this->response(self::URL_ADDRBOOCKS);
	}

	public function addContact($first_name, $email, $addressBookId = null, $customFieldId = null, $customFieldValue = null, $groupName = null)
	{
		$contact = new \stdClass();
        $contact->addressBookId = $addressBookId;
        $contact->firstName = $first_name;
        $contact->channels = [['type' => 'email', 'value' => $email]];
        if ($customFieldId && $customFieldValue) {
        	$contact->fields = [['id' => $customFieldId, 'value' => $customFieldValue]];
        }
        if ($groupName) {
        	$contact->groups = [['name' => $groupName]];
        }

		return $this->response(self::URL_CONTACT, self::METHOD_POST, $contact);
	}
}