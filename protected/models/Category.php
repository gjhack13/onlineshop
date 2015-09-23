<?php
class Category extends CActiveRecord {

	public static function model($className = __CLASS__) {
		return parent::model($className);
	}
	/*tentukan tabel yang akan digunakan (
	 *model ini menggunakan tabel category)*/
	public function tableName() {
		return 'category';
	}
	
	/*set masing-masing rule pada tiap field 
	 *yang ada pada tabel category*/
	public function rules() {
		return array( 
		 	array('category_name', 'required'), 
			array('category_name', 'length', 'max' => 555), 
			array('id, category_name', 'safe', 'on' => 'search'), 
		);
	}
	
	/*set label 
	 *untuk masing-masing attribute atau field*/
	public function attributeLabels() {
		return array(
			'id' => 'ID', 
			'category_name' => 'Category Name', 
		);
	}

	/*untuk search data category*/
	public function search() {
		$criteria = new CDbCriteria;
		$criteria -> compare('id', $this -> id);
		$criteria -> compare('category_name', $this -> category_name, true);
		return new CActiveDataProvider($this, array('criteria' => $criteria, ));
	}
}
?>