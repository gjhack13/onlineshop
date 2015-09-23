<?php
class AccountController extends Controller {
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = 'store';

	/**
	 * @return array action filters
	 */
	public function filters() {
		return array('accessControl', // perform access control for CRUD operations
		);
	}

	public function actionIndex() {
		if (!isset(Yii::app() -> user -> customerLogin)) {
			$model = new CustomerLoginForm;
			// jika ajax maka divalidasi dengan ajax
			if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
				/*tampilkan hasil validasi form*/
				echo CActiveForm::validate($model);
				/*end/exit/die*/
				Yii::app() -> end();
			}

			// ambil data yang diinput oleh user
			if (isset($_POST['CustomerLoginForm'])) {
				$model -> attributes = $_POST['CustomerLoginForm'];
				/*validaasi data yang diinput oleh user dan
				 *jika valid maka ...
				 */
				if ($model -> validate() && $model -> login()) {
					/*redirect ke halaman yang diinginkan
					 **/
					$this -> redirect(array('/account/'));
				}
			}
			$this -> render("login", array('model' => $model));
		} else {
			$this -> render("index");
		}
	}


	

	public function actionOrders($id = '') {
		IsAuth::Customer();
		/*untuk konfirmasi pembayaran*/
		if(isset($_GET['confirm'])){
			/*panggil model Confirmpayment*/
			$model = new Confirmpayment;
			/*jika data Confirmpayment dikirim dengan method POST*/
			if(isset($_POST['Confirmpayment'])){
				/*set value field*/	
				$order_code = $_POST['Confirmpayment']['nomerPemesanan'];
				$model->attributes = $_POST['Confirmpayment'];
				$model->order_code = $_POST['Confirmpayment']['nomerPemesanan'];
				$model->text_detail .= $_POST['Confirmpayment']['bankAsal'].'#';
				$model->text_detail .= $_POST['Confirmpayment']['pemilikRekAsal'].'#';
				$model->text_detail .= $_POST['Confirmpayment']['bankTujuan'].'#';
				$model->text_detail .=$_POST['Confirmpayment']['nominalTransfer'];
				/*jika data confirmpayment disimpan*/
				if($model->save()){
					/*find data order by attributes berdasarkan order code*/	
					$modelOrder = Order::model()->findByAttributes(array('order_code'=>$order_code));
					/*set field payment_status menjadi 1 
					 *yg artinya telah pembayaran telah dikonfirmasi*/
					$modelOrder->payment_status =1;
					/*simpan perubahan*/
					$modelOrder->save();
					/*setFlash untuk informasi sukses konfirmasi pesanan*/
					Yii::app()->user->setFlash('success', "Pesanan anda dengan nomor pemesanan #".$order_code." telah berhasil dikonfirmasi! Saat ini admin sedang melakukan pengecekan data anda, silahkan anda menunggu produk yang akan dikirim oleh kami. Terimakasih banyak atas belanja anda pada onshop. Belanja mudah dengan internet..."); 
					/*direct ke halaman orders*/
					$this->redirect(array('/account/'));
					return;
				}
			}
			/*render ke file account/confirmasi_payment*/
			$this->render('confirm_payment',array('model'=>$model));
			return;
		}
		
		/*untuk halaman list data pesanan*/
		if (empty($id)) {
			/*panggil model Order dan function search*/ 
			$model = new Order('search');
			// hapus default values pada attributes
			$model -> unsetAttributes();
			$model -> customer_id = Yii::app() -> user -> customerId;
			/*jika data order dikirim view get*/
			if (isset($_GET['Order'])){
				/*set attributes untuk pencarian*/
				$model -> attributes = $_GET['Order'];
			}
			/*render ke file account/list_orders*/
			$this -> render('list_orders', array('model' => $model, ));
			return;
		}
		
		/*untuk detail order*/
		if (!empty($id)) {
			/*join query untuk mendapatkan detail order*/
			$dataOrderDetail = Yii::app()->db->createCommand()
				->select('orders.*,orderdetail.*,product.*')
				->from('orders')
				->join('orderdetail','orderdetail.order_id = orders.id')
				->join('product','product.id = orderdetail.product_id')
				->where('orders.id=:id_order',array(':id_order'=>$id))
				->queryAll();
			/*join query untuk mendapatkan data order 
			 *dan customer/pelanggan*/
			$dataOrder = Yii::app()->db->createCommand()
				->select('orders.*,customer.customer_name')
				->from('orders')
				->join('customer','orders.customer_id = customer.customer_id')
				->where('orders.id=:id_order',array(':id_order'=>$id))
				->queryRow();
			/*render ke file account/detail_order*/	 
			$this->render('detail_order',array(
					'dataOrder'=>$dataOrder,
					'orderDetail'=>$dataOrderDetail,
					'subtotal'=>'',
					'grandtotal'=>'',
				)
			);
			return;
		}
	}
	
	
	/*untuk address book pelanggan*/
	public function actionAddressbook() {
		/*cek user login*/	
		IsAuth::Customer();
		/*jika add data address book*/
		if (isset($_GET['add'])) {
			$model = new Address;
			/*jika post addressbook*/
			if (isset($_POST['Address'])) {
				/*set attributes address book*/
				$model -> attributes = $_POST['Address'];
				/*ambil customer id*/
				$model -> customer_id = Yii::app() -> user -> customerId;
				/*ambil address nama*/
				$addressName = $_POST['Address']['name'];
				/*jika berhasil menyimpan data*/
				if ($model -> save()) {
					/*buat setflash*/
					Yii::app() -> user -> setFlash('success', 'Address book baru dengan nama <b>' . $addressName . '</b> berhasil ditambahkan');
					/*direct ke halaman addressbook awal*/
					$this -> redirect(array('account/addressbook'));
				}
			}
			/*render ke view form add addressbook dengan nama(add_addressbook.php)*/
			$this -> render('add_addressbook', array('model' => $model, ));
			return;
		}
		/*jika edit address book*/
		if (isset($_GET['edit'])) {
			/*ambil data addressbook berdasarkan pk*/
			$model = Address::model() -> findByPk($_GET['edit']);
			/*jika post Address*/
			if (isset($_POST['Address'])) {
				/*ambil nilai attributes nya*/
				$model -> attributes = $_POST['Address'];
				/*ambil customer id*/
				$model -> customer_id = Yii::app() -> user -> customerId;
				/*ambil address name*/
				$addressName = $_POST['Address']['name'];
				/*jika berhasil menyimpan data*/
				if ($model -> save()) {
					/*buat Setflash*/
					Yii::app() -> user -> setFlash('success', 'Address book dengan nama <b>' . $addressName . '</b>  berhasil dirubah');
					/*direct ke halaman address book awal*/
					$this -> redirect(array('account/addressbook'));
				}
			}
			/*render ke view form edit address book dengan nama(add_addressbook.php)*/
			$this -> render('add_addressbook', array('model' => $model, ));
			return;
		}
		
		/*untuk menampilkan list data address book*/
		$model = Address::model() -> findAll('customer_id=:customer_id', array(':customer_id' => Yii::app() -> user -> customerId));
		/*render ke view addressbook*/
		$this -> render('addressbook', array('model' => $model, ));
	}

	/**
	 * Log out, dan akan didirect ke halaman homepage.
	 */
	public function actionLogout() {
		/*logout user*/
		Yii::app() -> user -> clearStates();
		/*direct ke halaman yang diinginkan*/
		$this -> redirect(array('/'));
	}

	public function actionRegister() {
		$model = new Customer;
		if (isset($_POST['Customer'])) {
			$model -> attributes = $_POST['Customer'];
			if($model -> save()){
				$this->redirect(array('account/'));
			}
		}
		$this -> render('register', array("model" => $model));
	}

	public function actionChangepassword() {
		/*untuk cek apakah user telah login atau belum*/
		IsAuth::Customer();
		/*findbyPK data user yang login*/
		$model = CustomerChangePassword::model() -> findByPk(Yii::app() -> user -> customerId);
		/*jika POST maka
		 *ubahpassword*/
		if (isset($_POST['CustomerChangePassword'])) {
			$model -> setAttributes($_POST['CustomerChangePassword']);
			$model -> password = $_POST['CustomerChangePassword']['newPassword'];
			/*jika changepassword maka direct ke halaman success*/
			if ($model -> save()) {
				$this -> redirect(array('changepasswordsuccess'));
			}
		}
		/*render ke view ubah password*/
		$this -> render('changepassword', array('model' => $model));
	}

	public function actionChangepasswordsuccess() {
		/*untuk cek apakah user telah login atau belum*/
		IsAuth::Customer();
		/*untuk setflash berhasil ubah password*/
		Yii::app() -> user -> setFlash('success', 'Password anda berhasil dirubah dengan passwod yang baru');
		/*render ke file view*/
		$this -> render('changePasswordSuccess');
	}

	public function actionInfo() {
		IsAuth::Customer();
		$this -> render('info');
	}


	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		IsAuth::Admin();
		$model = new Customer('search');
		$model -> unsetAttributes();
		// clear any default values
		if (isset($_GET['Customer']))
			$model -> attributes = $_GET['Customer'];

		$this -> render('admin', array('model' => $model, ));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id) {
		$model = Customer::model() -> findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'customer-form') {
			echo CActiveForm::validate($model);
			Yii::app() -> end();
		}
	}

}
