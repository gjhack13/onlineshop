<?php
class Product extends CActiveRecord{
	/*untuk menampung format harga produk 
	 *yg akan dikonvert ke bentuk mata uang*/
	public $price_product;
	
	public static function model($className=__CLASS__){
		return parent::model($className);
	}

	/*kembalikan ke tabel product 
	 *(maksudnya model ini akan menggunakan tabel product)*/
	public function tableName(){
		return 'product';
	}
	/*ini digunakan untuk memformat mata uang produk
	 *yang akan ditampilkan*/
	protected function afterFind(){
		parent::afterFind();
		$this->price_product=number_format($this->price,0,',','.');
		return TRUE;       
	}
	
	/*ini digunakan untuk mreplace tanda titik(.) yang ada di mata uang
	 *seperti (100.000) menjadi (100000)*/
	protected function beforeSave(){
		parent::afterFind();
		$this->price = str_replace('.','',$this->price);
		return TRUE;       
	}

	/*ini digunakan untuk rules dari masing-masing field 
	 *yang ada pada tabel product*/
	public function rules(){
		return array(
			array('product_name, category_id, price,description', 'required'),
			array('image', 'file', 'types'=>'jpg, gif, png','allowEmpty'=>true),
			array('category_id, price', 'numerical', 'integerOnly'=>true),
			array('product_name,image', 'length', 'max'=>555),
			array('id, product_name, category_id, price,image', 'safe', 'on'=>'search'),
		);
	}

	/*relasi tabel*/
	public function relations(){
		return array(
			/*merelasikan ketabel category*/
			'category'=>array(self::BELONGS_TO,'category','category_id')
		);
	}

	/*set attributes*/
	public function attributeLabels(){
		return array(
			'id' => 'ID',
			'product_name' => 'Product Name',
			'category_id' => 'Category',
			'price' => 'Price',
			'image' => 'Image',
		);
	}

	/*untuk search*/
	public function search(){
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('product_name',$this->product_name,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('price',$this->price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
?>