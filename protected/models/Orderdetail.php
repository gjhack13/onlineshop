<?php
/*Class untuk keperluan order detail
 *Author : Kuuga Sharive
 **/
class Orderdetail extends CActiveRecord{
	
	public static function model($className=__CLASS__){
		return parent::model($className);
	}
	
	protected function afterFind(){
		parent::afterFind();
		$this->subtotal=number_format($this->subtotal,0,',','.');
		return TRUE;       
	}

	/*tentukan tabel yang digunakan*/
	public function tableName(){
		return 'orderdetail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		return array(
			array('product_id, qty, subtotal', 'required'),
			array('product_id, qty, subtotal', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('order_code, product_id, qty, subtotal', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * untuk relasi
	 */
	public function relations()
	{
		
		return array(
			/*relasi ke tabel produk*/
			'product'=>array(self::BELONGS_TO,'Product','product_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'order_code' => 'Nomor Pemesanan',
			'product_id' => 'Product',
			'qty' => 'Qty',
			'subtotal' => 'Subtotal',
		);
	}

	/**
	 * untuk search produk detail
	 */
	public function search()
	{
		 
		$criteria=new CDbCriteria;

		$criteria->compare('order_code',$this->order_code);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('qty',$this->qty);
		$criteria->compare('subtotal',$this->subtotal);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}