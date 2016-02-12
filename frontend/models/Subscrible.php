<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use frontend\models\SignupForm;

/**
 * Signup form
 */
class Subscrible extends Model
{
	public $name;
	public $email;

	public function rules()
    {
        return [
            ['name', 'filter', 'filter' => 'trim'],
            ['name', 'required'],
            ['name', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.']
        ];
    }

    public function subscrible() {
    	return true;
    }

    public static function exsits($email) {
    	$model = User::findByEmail($email);
    	if(isset($model->email)) {
    		return true;
    	}
    	else {
    		return false;
    	}
    }

    public function signAccount($user) {
    	$username 	= $this->generateUsername($user->email);
    	$email 		= $user->email;
    	$name 		= $user->name;
    	// user model 
    	$model 				= new SignupForm;
    	$model->username 	= $username;
    	$model->name 		= $name;
    	$model->email 		= $email;
    	$model->password 	= $this->generatePassword();
    	$model->agree 		= "Y";
    	if ($auth = $model->signup()) {
            if (Yii::$app->getUser()->login($auth)) {
                \Yii::$app->mailer->compose(['html' => 'regAccount-html', 'text' => 'regAccount-text'], ['user' => $model])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
                    ->setTo($model->email)
                    ->setSubject('Registration successful!')
                    ->send();
                return true;
            }
        }
        else {
        	return false;
        }
    }

    protected function generateUsername($email) {
    	$data = explode("@", $email);
    	if (trim(mb_strlen($data[0])) >= 3) {
    		return $data[0];		
    	}
    	else {
    		return implode($data);
    	}
    }

    protected function generatePassword() {
    	$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < 6; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    return implode($pass); //turn the array into a string
    }

}