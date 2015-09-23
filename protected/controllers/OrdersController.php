<?php
/*Class untuk manage data order pada halaman admin
 *Author : Kuuga Sharive
 **/
class OrdersController extends Controller{
	/*set layout admin*/
	public $layout='//layouts/admin_page';

	/**
	 * view data order / detail data order
	 */
	public function actionView($id){
		/*untuk cek login admin*/
		IsAuth::Admin();
		/*panggil function loadModel() 
		 *dan ditampung ke $dataOrder*/
		$dataOrder = $this->loadModel($id);
		/*find data confirmpayment berdasarkan order_code*/
		$dataConfirmPayment = Confirmpayment::model()->findByAttributes(array('order_code'=>$dataOrder->order_code));
		/*find data alamat pengiriman berdasarkan id_address*/
		$dataShippingAddress = Address::model()->findByPk($dataOrder->id_address);
		/*panggil model Orderdetail dan function search*/
		$model=new Orderdetail('search');
		/*clear any default values*/
		$model->unsetAttributes();  
		/*set select data order_detail berdasarkan order_code*/
		$model->order_code =$dataOrder->order_code;
		/*render ke file views/orders/view*/	
		$this->render('view',array(
			'model'=>$dataOrder,//data order
			'ordet'=>$model, //data order detail
			'dataPayment'=>$dataConfirmPayment,//data konfirmasi pembayaran
			'shippingAddress'=>$dataShippingAddress,//data alamat pengiriman
		));
	}

	/**
	 * list data order
	 */
	public function actionAdmin(){
		/*untuk cek login admin*/
		IsAuth::Admin();
		/*panggil model order dan function search*/
		$model=new Order('search');
		/*clear semua default value attributes*/
		$model->unsetAttributes();
		/*jika data order dikirim
		 *sebagai kriteria pencarian*/
		if(isset($_GET['Order'])){
			/*set nilai attributes 
			 *untuk pencarian data order*/
			$model->attributes=$_GET['Order'];
		}
		/*render file views/orders/admin*/
		$this->render('admin',array(
			'model'=>$model,//data orders
		));
	}

	/**
	 *function untuk findByPk untuk data order
	 */
	public function loadModel($id){
		/*untuk cek login admin*/
		IsAuth::Admin();
		/*findbyPk data order*/
		$model=Order::model()->findByPk($id);
		/*jika datanya tidak ada maka
		 *alihkan ke error 404*/
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
		}
		/*kembalikan nilai ke $model*/
		return $model;
	}
	
}
?>