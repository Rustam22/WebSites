<?php

	class SiteUsersModel extends CRUDModel {
		
		public $name;
		public $surName;
		public $avatar;
		public $email;
		public $password;
		public $sex;
		public $birthDay;
		public $interests;
		public $lpwToken;
		
		public function __construct() {
			$messages = Application::$messages['model_site_users'];
			
			$this->name = new ModelTextField("name", $messages['field_name'], true, false);
			$this->name->required = false;
			
			$this->surName = new ModelTextField("surName", $messages['field_surname'], true, false);
			$this->surName->required = false;
			
			$this->email = new ModelTextField("email", $messages['field_email'], true, false);
			$this->email->required = false;
			
			$this->password = new ModelPasswordField("password", $messages['field_password'], true, false);
			$this->password->required = false;
			
			$this->avatar = new ModelFMImageField("avatar", $messages['field_avatar'], false, true, false);
			$this->avatar->required = false;
			
			$this->sex = new ModelSelectField("sex", $messages['field_sex'], Array(0 => 'man', 1 => 'woman'), true, true);
			$this->sex->required = false;
			
			$this->birthDay = new ModelDateField("birthDay", $messages['field_birthday'], true, true);
			$this->birthDay->required = false;
			
			$interests = CategoryModel::getAsKeyVal('r_id', 'categoryItemTitle', Application::$settings['default_language']);
			$this->interests = new ModelCheckBoxField("interests", $messages['field_interests'], $interests, true, false);
			$this->interests->required = false;
			
			$this->lpwToken = new ModelTextField("lpwToken", $messages['field_surname'], true, false);
			$this->lpwToken->hidden = true;
			$this->lpwToken->required = false;
		}
		
		public static function initialize() {
			self::$multiLang = false;
			self::$title = Application::$messages['model_site_users']['title'];
			self::$iconPath = 'users.png';
			self::$useOwnViewUrl = false;
			self::$displayFields = Array('avatar', 'name', 'surName', 'email', 'sex', 'birthDay');
		}
		
		public static function getUser($email, $password) {
			return self::find(" WHERE `email` = '{#1}' AND `password` = '{#2}'", Array($email, md5($password)));
		}
		
		public static function getByLPWToken($token) {
			return self::find(" WHERE `lpwToken` = '{#1}'", Array($token));
		}
		
		public static function userExists($email) {
			$r = self::find(" WHERE `email` = '{#1}'", Array($email));
			if (count($r)) return $r[0];
			else return false;
		}
		
	}

?>