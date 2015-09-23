<?php
/**
 * Class ini digunakan untuk mendata user yang login.
 * dan class ini menge-extends CUserIdentity 
 * yang telah disediakan yii
 */
class CustomerLogin extends CUserIdentity {
	private $_id;
	 
	/**
	 * Authenticates user dengan menggunakan user model (Admin.php)
	 */
	public function authenticate() {
		/*find data dengan atribut email
		 * menggunakan model Admin*/
		$user = Customer::model() -> findByAttributes(array('email' => $this -> username));
		/*jika user hasilnya null maka
		 * kasih error invalid email*/
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
				$this -> _id = $user -> customer_id;
				
				/*set state email agar dapat ditampilkan 
				 *sebagai data user yang login
				 */
				$this -> setState('customerLogin', TRUE); 
				$this -> setState('customerName', $user->customer_name);
				$this -> setState('customerId',$user->customer_id);
				$this -> setState('customerPassword',$user->password);
				$this ->setState('customerEmail',$user->email);
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