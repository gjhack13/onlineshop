<?php
class Admin extends CActiveRecord {
	
	/*digunakan untuk meng-engkrip password dengan dengan md5*/
	protected function beforeSave() {
		if(parent::beforeSave()){
			$this -> password = $this -> encrypt($this -> password);
			return TRUE;
		}else{
			return FALSE;
		}
	}

	/*membuat fungsi untuk engkrip data*/
	public function encrypt($value) {
		return md5($value);
	}
	
	/*menyatakan model name*/
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/*tentukan tabel apa yang digunakan*/
	public function tableName() {
		return 'admin';
	}


	public function rules() {
		
		return array( array('email,username,password,rule', 'required'), 
		array('email, username, password', 'length', 'max' => 256),
		/*buat minimal karakter*/ 
		array('username', 'length','min'=>6),
		array('password', 'length','min'=>8),
		
		array('id, email, username, password,rule, last_login_time', 'safe', 'on' => 'search'), );
	}

	/*attributes label*/
	public function attributeLabels() {
		return array(
			'id' => 'ID', 
			'email' => 'Email', 
			'username' => 'Username', 
			'password' => 'Password', 
			'rule' => 'Rule'
		);
	}

	/*untuk search data*/
	public function search() {
		$criteria = new CDbCriteria;

		$criteria -> compare('id', $this -> id);
		$criteria -> compare('email', $this -> email, true);
		$criteria -> compare('username', $this -> username, true);
		$criteria -> compare('password', $this -> password, true);
		$criteria -> compare('rule', $this -> password, true);
		$criteria -> compare('last_login_time', $this -> last_login_time, true);

		return new CActiveDataProvider($this, array('criteria' => $criteria, ));
	}

}