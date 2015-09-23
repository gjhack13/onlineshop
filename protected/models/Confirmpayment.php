<?php
class Confirmpayment extends CActiveRecord{
	
	public $nomerPemesanan; //nomerpemesanan
	public $bankAsal; // nama bank asal
	public $pemilikRekAsal; // nama pemilik rek asal
	public $bankTujuan; //nama bank tujuan transfer
	public $nominalTransfer; // nominal transfer / jumlah uang yang di transfer
	
	public $dataPaymentText;
	
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
	
	public function tableName(){
		return 'confirm_payment';
	}
	
	public function afterFind(){
		parent::afterFind();
		$this->dataPaymentText = explode('#',$this->text_detail); 
	}
	
	public function rules(){
		return array(
			array('order_code,text_detail','required'),
			array('nomerPemesanan,bankAsal,pemilikRekAsal,bankTujuan,nominalTransfer','required'),
		);
	}
	
	public function attributeLabels(){
		return array(
			'id'=>'ID Konfirmasi',
			'nomerPemesanan'=>'Nomer Pemesanan',
			'pemilikRekAsal'=>'Nama Pemilik Rekening Asal',
			'bankAsal'=>'Nama Bank Asal',
			'bankTujuan'=>'Bank Tujuan Transfer',
			'nominalTransfer'=>'Jumlah yang ditransfer',
		);
	}
	
}
