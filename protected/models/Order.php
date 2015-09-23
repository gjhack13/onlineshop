<?php
/*Class untuk keperluan Order
 *Author : Kuuga Sharive
 **/
class Order extends CActiveRecord{
	
	public $payment;
	
	
	public static function model($className=__CLASS__){
		return parent::model($className);
	}

	
	public function tableName(){
		return 'orders';
	}
	
	protected function afterFind(){
		parent::afterFind();
		$this->order_date=date('d F, Y', strtotime(str_replace("-", "", $this->order_date)));
		$this->payment = $this->payment_status == 0 ? 'Pending' : 'Paid';
	}
	
	protected function beforeSave(){
    	if(parent::beforeSave()){
        	$this->order_date=date('Y-m-d', strtotime(str_replace(",", "", $this->order_date)));
        	return TRUE;
    	}else{
    		return FALSE;
    	}
    		 
	}
	
	public function rules(){
		return array(
			array('id,order_code,bank_transfer,payment_status','safe','on'=>'search'),
		);
	}
	 

	/**
	 * relational rules.
	 */
	public function relations()
	{
		 
		return array(
			/*relasi ke tabel customer*/
			'customer'=>array(self::BELONGS_TO,'Customer','customer_id'),
			/*relasi ke tabel confirmpayment*/
			'confirmpayment'=>array(self::BELONGS_TO,'confirmpayment','order_code'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels(){
		return array(
			'id' => 'ID Order',
			'order_code'=>'Nomor Pemesanan',
			'order_date'=>'Tanggal Pemesanan',
			'payment_status' =>'Payment Status',
		);
	}

	/*untuk pencarian*/
	public function search(){
		/*panggil class CDbCriteria*/
		$criteria=new CDbCriteria;
		/*set attributes*/
		$criteria->compare('id',$this->id);
		$criteria->compare('order_code',$this->order_code,true);
		$criteria->compare('bank_transfer',$this->bank_transfer,true);
		$criteria->compare('payment_status',$this->payment_status,true);
		$criteria->compare('customer_id',$this->customer_id,true);
		
		/*kebalikan ke CActiveDataProvider*/
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}