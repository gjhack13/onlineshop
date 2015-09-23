<?php
class CustomerLoginForm extends CFormModel {
	
	/*deklarasi public variabel*/
	public $email;
	public $password;
	public $rememberMe;
	/*deklarasi private variabel*/
	private $_identity;

	/**
	 * deklarasi validatasi
	 * yang menyatakan email dan password harus diisi.
	 */
	public function rules() {
		return array(
			// email dan password dibutuhkan
			array('email, password', 'required'),
			array('email','email'),
			// untuk rememberMe dan harus sebuah boolean
			array('rememberMe', 'boolean'),
			// password akan diauthenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * deklarasi atribut labels.
	 */
	public function attributeLabels() {
		return array(
			'rememberMe' => 'Remember me next time',
		);
	}

	/**
	 * buat auth password.
	 */
	public function authenticate($attribute, $params) {
		/*jika tidak hasErrors maka*/
		if (!$this -> hasErrors()) {
			/*panggil component CustomerLogin dengan param
			 *email, dan password
			 *dan ditampung oleh variabel _identity
			 */
			$this -> _identity = new CustomerLogin($this -> email, $this -> password);
			/*jika tidak authenticate/authenticate==failed maka*/
			if (!$this -> _identity -> authenticate()){
				/*kasih error*/
				$this -> addError('password', 'Incorrect email or password.');
			}
		}
	}

	/**
	 * admin login, dengan meng-input email dan password
	 */
	public function login() {
		/*jika _indentity null maka*/
		if ($this -> _identity === null) {
			/*panggil component CustomerLogin dengan param
			 *email, dan password
			 *dan ditampung oleh variabel _identity
			 */
			$this -> _identity = new CustomerLogin($this -> email, $this -> password);
			/*panggil fungsi authenticate()
			 *yang ada di component CustomerLogin
			 *yang akan memvalidasi email dan password*/
			$this -> _identity -> authenticate();
		}
		/*jika errorCode/error email dan password benar maka*/
		if ($this -> _identity -> errorCode === CustomerLogin::ERROR_NONE) {
			//membuat remember me durasi 30 hari
			$duration = $this -> rememberMe ? 3600 * 24 * 30 : 0;
			// 30 days
			Yii::app() -> user -> login($this -> _identity, $duration);
			//update last_login_time admin
			Admin::model() -> updateByPk($this -> _identity -> id, array('last_login_time' => new CDbExpression('NOW()')));
			return true;
		} else {
			return false;
		}

	}

}
?>