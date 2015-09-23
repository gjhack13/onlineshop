<?php
/**
 * Class ini digunakan untuk mendata user yang login.
 * dan class ini menge-extends CUserIdentity 
 * yang telah disediakan yii
 */
class AdminLogin extends CUserIdentity {
	private $_id;
	/**
	 * Authenticates user dengan menggunakan user model (Admin.php)
	 */
	public function authenticate() {
		/*find data dengan atribut username
		 * menggunakan model Admin*/
		$user = Admin::model() -> findByAttributes(array('username' => $this -> username));
		/*jika user hasilnya null maka
		 * kasih error invalid username*/
		if ($user === null) {
			$this -> errorCode = self::ERROR_USERNAME_INVALID;
		/*jika tidak null*/
		} else {
			/*cek jika password yang ada didalam database
			 *tidak sama dengan password yang dienkrip maka
			 * kasih error password invalid*/
			if ($user -> password !== $user -> encrypt($this -> password)) {
				$this -> errorCode = self::ERROR_PASSWORD_INVALID;
			/*jika sama password_database==password_enkrip*/
			} else {
				/*jika password yang dienkrip sama dengan 
			 	* yang ada di dalam database maka*/
			 	
			 	/*ambil data user id dan 
				 *ditampung oleh variable _id*/
				$this -> _id = $user -> id;
				
				/*set state username agar dapat ditampilkan 
				 *sebagai data user yang login
				 */
				$this -> setState('username', $user -> username); 
				$this -> setState('rule', $user -> rule);
				$this -> setState('adminLogin', TRUE); 
				/*kasih error none pada variable errorCode*/
				$this -> errorCode = self::ERROR_NONE;
			}
		}
		/*kembalikan bukan error code*/
		return !$this -> errorCode;
	}

	/*untuk mendapatkan user id yang login
	 *agar dapat ditampilkan
	 *sebagai user id yang login*/
	public function getId() {
		return $this -> _id;
	}

}
?>