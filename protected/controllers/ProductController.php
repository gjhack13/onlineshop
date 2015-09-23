<?php
class ProductController extends YiishopController {

	public $layout = "admin_page";
	/*set folder untuk uploads
	 *(silahkan pastikan bahwa 
	 *anda telah membuat folder images/products pada yiishop/)*/
	const URLUPLOAD = '/../images/products/';
	
	/*untuk detail product*/
	public function actionReview($id) {
		IsAuth::Admin();
		$this -> render('review', 
				array('model' => $this -> loadModel($id), 
			)
		);
	}
	
	/*untuk create product*/
	public function actionCreate() {
		IsAuth::Admin();
		/*panggil model product*/
		$model = new Product;
		/*jika data dikirim*/
		if (isset($_POST['Product'])) {
			/*cek file / gambar produk*/	
			$cekfile = $model -> image = CUploadedFile::getInstance($model, 'image');
			/*set attributes product*/
			$model -> attributes = $_POST['Product'];
			/*ambil value / nama gambar*/
			$model -> image = CUploadedFile::getInstance($model, 'image');
			/*jika data product disimpan*/
			if ($model -> save()) {
				/*jika file ada*/
				if (!empty($cekfile)) {
					/*set value field image dengan nama gambar
					 *dan upload gambar ke folder images/products*/
					$model -> image -> saveAs(Yii::app() -> basePath . self::URLUPLOAD . $model -> image . '');
					/*copy file yang barusan diupload ke images/products ke images/products/thumbs*/
					copy(Yii::app() -> basePath . self::URLUPLOAD . $model -> image, Yii::app() -> basePath . self::URLUPLOAD . 'thumbs/' . $model -> image);
					/*ambil filenya*/
					$name = getcwd() . '/images/products/thumbs/' . $model -> image;
					/*panggil component image dengan param $image*/
					$image = Yii::app() -> image -> load($name);
					/*resize gambar/thumb gambar*/
					/*$image -> resize(93, 0);*/
					/*simpan thumb image kembali gambar ke 
					 *images/products/thumbs*/
					$image -> save();
				}
				/*direct ke halaman product/review*/
				$this->redirect(array('review','id'=>$model->id));
			}
		}
		/*tampilkan form create produk*/
		$this -> render('create', 
				array('model' => $model, 
			)
		);
	}
	
	/*untuk update produk*/
	public function actionUpdate($id) {
		IsAuth::Admin();
		/*find produk by pk*/
		$model = $this -> loadModel($id);
		/*ambil gambar*/
		$image = $model -> image;
		/*jika data perubahan dikirim*/
		if (isset($_POST['Product'])) {
			/*cek file / gambar produk*/
			$cekfile = $model -> image = CUploadedFile::getInstance($model, 'image');
			/*jika file tidak ada*/
			if (empty($cekfile)) {
				/*set value attribute*/	
				$model -> attributes = $_POST['Product'];
				/*set image dari yang sudah ada*/
				$model -> image = $image;
				/*simpan perubahan data*/
				if ($model -> save()) {
					/*direct ke product/view*/
					$this -> redirect(array('review', 'id' => $model -> id));
				}
			} else {/*jika file ada*/
				/*set value attribute*/
				$model -> attributes = $_POST['Product'];
				/*ambil value / nama gambar*/
				$model -> image = CUploadedFile::getInstance($model, 'image');
				/*simpan perubahan data produk*/
				if ($model -> save()) {
					/*set value field image dengan nama gambar
					 *dan upload gambar ke folder images/products*/
					$model -> image -> saveAs(Yii::app() -> basePath . '/../images/products/' . $model -> image . '');
					/*copy file yang barusan diupload ke images/products ke images/products/thumbs*/
					copy(Yii::app() -> basePath . self::URLUPLOAD . $model -> image, Yii::app() -> basePath . self::URLUPLOAD . 'thumbs/' . $model -> image);
					/*ambil filenya*/
					$name = getcwd() . '/images/products/thumbs/' . $model -> image;
					/*panggil component image dengan param $image*/
					$image = Yii::app() -> image -> load($name);
					/*resize gambar/thumb gambar*/
					/*$image -> resize(93, 0);*/
					/*simpan thumb image kembali gambar ke 
					 *images/products/thumbs*/
					$image -> save();
					/*direct ke product/view*/
					$this -> redirect(array('review', 'id' => $model -> id));
				}
			}
		}
		/*render form update product*/
		$this -> render('update', 
				array('model' => $model, 
			)
		);
	}

	/*untuk delete produk*/
	public function actionDelete($id) {
		IsAuth::Admin();
		if (Yii::app() -> request -> isPostRequest) {
			// delete produk
			$this -> loadModel($id) -> delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax']))
				$this -> redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		} else
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
	}

	

	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		
		IsAuth::Admin();
		
		$model = new Product('search');
		$model -> unsetAttributes();
		 

		if (isset($_GET['Product'])) {
			$model -> attributes = $_GET['Product'];
		}
		$this -> render('admin', array('model' => $model, ));

	}

	public function loadModel($id) {
		$model = Product::model() -> findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'product-form') {
			echo CActiveForm::validate($model);
			Yii::app() -> end();
		}
	}
	
	public function actionIndex() {
		/*gunakan layout store*/
		$this -> layout = 'store';
		/*order by id desc*/
		$criteria = new CDbCriteria( array('order' => 'id DESC', ));
		/*count data product*/
		$count = Product::model() -> count($criteria);
		/*panggil class paging*/
		$pages = new CPagination($count);
		/*elements per page*/
		$pages -> pageSize = 9;
		/*terapkan limit page*/
		$pages -> applyLimit($criteria);

		/*select data product
		 *cache(1000) digunakan untuk men cache data,
		 * 1000 = 10menit*/
		$models = Product::model() -> cache(1000) -> findAll($criteria);

		/*render ke file index yang ada di views/product
		 *dengan membawa data pada $models dan
		 *data pada $pages
		 **/
		$this -> render('index', array('models' => $models, 'pages' => $pages, ));
	}

	/*untuk search prouk*/
	public function actionSearch() {
		/*gunakan layout store*/
		$this -> layout = 'store';
		if (isset($_POST['Search'])) {
			$keyword = $_POST['Search']['keyword'];
			$category = $_POST['Search']['category'];
			//$this->redirect(array('product/search','c'=>$category,'key'=>$key));

			//$criteria = new CDbCriteria( array('order' => 'id DESC', ));
			if ($category == 'all-categories' && empty($keyword)) {
				$this -> redirect(array('product/'));
			}
			if ($category != 'all-categories' && empty($keyword)) {
				$criteria = new CDbCriteria( array('order' => 'id DESC', 'condition' => 'category_id=' . $category . ''));
			}
			if ($category == 'all-categories' && !empty($keyword)) {
				$criteria = new CDbCriteria( array('order' => 'id DESC', 'condition' => 'product_name like"%' . trim($keyword) . '%"', ));
			}
			if ($category != 'all-categories' && !empty($keyword)) {
				$criteria = new CDbCriteria( array('order' => 'id DESC', 'condition' => 'category_id=' . $category . ' AND product_name like"%' . trim($keyword) . '%"', ));
			}

			/*count data product*/
			$count = Product::model() -> count($criteria);
			/*panggil class paging*/
			$pages = new CPagination($count);
			/*elements per page*/
			$pages -> pageSize = 8;
			/*terapkan limit page*/
			$pages -> applyLimit($criteria);

			/*select data product
			 *cache(1000) digunakan untuk men cache data,
			 * 1000 = 10menit*/
			$models = Product::model() -> cache(1000) -> findAll($criteria);

			/*render ke file index yang ada di views/product
			 *dengan membawa data pada $models dan
			 *data pada $pages
			 **/
			$this -> render('index', array('models' => $models, 'pages' => $pages, ));
		} else {
			$this -> redirect(array('product/'));
		}
	}

	public function actionView($id) {
		/*gunakan layout store*/
		$this -> layout = 'store';

		/*select data berdasarkan primaryKey.
		 *cache(1000) untuk men cache data, 1000 = 10 menit
		 **/
		$model = Product::model() -> cache(1000) -> findByPk($id);
		/*jika data tidak ada akan dilempar ke 404*/
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
		}
		/*render ke file view.php dengan membawa
		 *data yang ditampung $model*/
		$this -> render('view', array('data' => $model));
	}
	
	
	/*untuk menambahkan product ke keranjang belanja*/
	public function actionAddtocart($id) {
		/*gunakan layout store*/
		$this -> layout = 'store';
		/*panggil model Cart*/
		$model = new Cart;
		/*set data ke masing masing field*/
		/*product_id*/
		$_POST['Cart']['product_id'] = $id;
		/*qty*/
		$_POST['Cart']['qty'] = 1;
		/*cart_code*/
		$_POST['Cart']['cart_code'] = Yii::app()->session['cart_code'];
		/*set ke attribut2*/
		$model -> attributes = $_POST['Cart'];
		
		/*update qty-nya jika produk sudah ada di dalam keranjang belanja
		 *menjadi +1*/
		if ($this -> addQuantity($id, Yii::app()->session['cart_code'], 1)) {
			/*direct ke halaman cart*/	
			$this -> redirect(array('cart/'));
		/*add ke keranjang belanja jika produk belum ada di keranjang*/	
		} elseif ($model -> save()) {
			/*direct ke halaman cart*/ 
			$this -> redirect(array('cart/'));
		} else {
			/*produk tidak ada di dalam data product kasih error 404*/
			throw new CHttpException(404, 'The requested id invalid.');
		}

	}
	
	/*function untuk update QTY produk di keranjang belanja*/
	private function addQuantity($product_id, $cart_code = '', $qty = '') {
		/*model Cart findBy attributes product_id dan cart_code*/
		$modelCart = Cart::model() -> findByAttributes(array('product_id' => $product_id, 'cart_code' => $cart_code));
		/*jika ada didalam keranjang belanja*/
		if (count($modelCart) > 0) {
			/*maka update qty nya*/
			$modelCart -> qty += $qty;
			/*simpan dan return true*/
			$modelCart -> save();
			return TRUE;
		} else {
			/*lain dari itu return false*/
			return FALSE;
		}
	}

	public function actionCategory($id) {
		/*gunakan layout store*/
		$this -> layout = "store";

		/*menyatakan criteria bahwa
		 *select data akan difilter berdasarkan
		 *categori_id dan diorder berdasarkan
		 *id DESC*/
		$criteria = new CDbCriteria( array('condition' => 'category_id=' . $id, 'order' => 'id DESC', ));

		/*hitung jumlah data produk*/
		$count = Product::model() -> count($criteria);

		/*panggil class paging*/
		$pages = new CPagination($count);

		/*tentukan jumlah nomer paging/page*/
		$pages -> pageSize = 9;

		/*terapkan limit page dan criteria*/
		$pages -> applyLimit($criteria);

		/*select data produk berdasarkan criteria tertentu
		 *dan cache(1000) untuk men cache data
		 *dan 1000=10 menit*/
		$models = Product::model() -> cache(1000) -> findAll($criteria);
		//,'category_id=:category_id', array(':category_id'=>$id)

		/*render ke file view category.php
		 *dengan membawa data dari $models, dan $pages*/
		$this -> render('category', array('models' => $models, 'pages' => $pages, ));
	}

}
