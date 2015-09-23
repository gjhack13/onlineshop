<?php
class Address extends CActiveRecord{
	
	public static function model($className=__CLASS__){
		return parent::model($className);
	}
	
	public function tableName(){
		return 'addressbook';
	}
	
	public function rules(){
		return array(
			array('name,phone_number,address,province,city','required'),
			array('phone_number','numerical','integerOnly'=>TRUE),
		);
	}
	
	public function attributeLabels(){
		return array(
			'id_address'=>'ID Address',
			'name'=>'Nama',
			'phone_number'=>'No. Telephone/Hp',
			'address'=>'Alamat',
			'province'=>'Provinsi',
			'city'=>'Kota/Desa/Kecamatan',
		);
	}
}