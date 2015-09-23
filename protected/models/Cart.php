<?php
/*class untuk keranjang belanja
 *Author Kuuga Sharive*/
class Cart extends CActiveRecord{
	public static function model($className=__CLASS__){
		return parent::model($className);
	}

	//tentukan tabel yang digunakan
	public function tableName(){
		return 'cart';
	}

	
	public function rules(){
		
		return array(
			array('product_id, qty, cart_code', 'required'),
			array('product_id, qty', 'numerical', 'integerOnly'=>true),
			array('cart_code', 'length', 'max'=>555),
			
			array('id, product_id, qty, cart_code', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations(){
		 
		return array(
			'product' => array(self::BELONGS_TO, 'product', 'product_id'),
		);
	}
	
}