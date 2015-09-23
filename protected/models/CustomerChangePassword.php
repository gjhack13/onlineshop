<?php
class CustomerChangePassword extends CActiveRecord {
	/*untuk membuat field 'new password' 
	 *pada form ubah password*/	
	public $newPassword;
	
	/*untuk membuat field 'old/current password' 
	 *pada form ubah password*/
	public $oldPassword;
	
	
	/*untuk membuat field 'confirm password' 
	 *pada formubahpassword*/
	public $compareNewPassword;
	
	/*digunakan untuk meng-engkrip password dengan dengan md5*/
	protected function beforeSave() {
		if (parent::beforeSave()) {
			$this -> password = $this -> encrypt($this -> password);
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/*membuat fungsi untuk engkrip data*/
	public function encrypt($value) {
		return md5($value);
	}

	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'customer';
	}
	
	public function rules()
	{
		/*buat validate form ubah password*/
		return array(
			/*set field old/current password,new password, 
			 *confirm password tidak boleh kosong*/
			array('oldPassword, newPassword, compareNewPassword', 'required'),
			/*set min length password*/
			array('oldPassword,newPassword,compareNewPassword','length','min'=>8),
			/*set max length password*/
			array('oldPassword,newPassword,compareNewPassword', 'length', 'max'=>35),
			/*bandingkan atau confirm password*/
			array('compareNewPassword','compare','compareAttribute'=>'newPassword'),
			/*validate old password/current password 
			 *dengan function validateCurrentPassword*/
			array('oldPassword','validateCurrentPassword'),
		);
	}
	
	public function attributeLabels(){
		return array(
			'oldPassword'=>'Current Password',
			'newPassword'=>'New Password',
			'compareNewPassword'=>'Confirm New Password',
		);
	}
	
	/*function untuk validate current password*/
	public function validateCurrentPassword(){
		/*jika current password tidak sama dengan yang diinputkan maka*/	
        if($this->encrypt($this->oldPassword) != Yii::app()->user->customerPassword){
        	/*set error dengan message 'current password . . . .*/	
        	$this -> addError('oldPassword', 'Current Password harus diketik dengan tepat');
        }else{
        	/*jika benar return TRUE*/
        	return TRUE;
        }
    }
}
