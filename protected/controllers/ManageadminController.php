<?php

class ManageadminController extends Controller {
	
	/*menggunakan layout testing*/
	public $layout = 'admin_page';

	
	public function actionView($id) {
		IsAuth::Admin();
		$this -> render('view', array('model' => $this -> loadModel($id), ));
	}

	
	public function actionCreate() {
		IsAuth::Admin();
		$model = new Admin;


		if (isset($_POST['Admin'])) {
			$model -> attributes = $_POST['Admin'];
			if ($model -> save())
				$this -> redirect(array('view', 'id' => $model -> id));
		}

		$this -> render('create', array('model' => $model, ));
	}


	public function actionUpdate($id) {
		IsAuth::Admin();
		$model = $this -> loadModel($id);

		if (isset($_POST['Admin'])) {
			$model -> attributes = $_POST['Admin'];
			if ($model -> save())
				$this -> redirect(array('view', 'id' => $model -> id));
		}

		$this -> render('update', array('model' => $model, ));
	}

	
	public function actionDelete($id) {
		IsAuth::Admin();
		if (Yii::app() -> request -> isPostRequest) {
			$this -> loadModel($id) -> delete();
			if (!isset($_GET['ajax']))
				$this -> redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		} else
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
	}

	 
	public function actionIndex() {
		IsAuth::Admin();
		$dataProvider = new CActiveDataProvider('Admin');
		$this -> render('index', array('dataProvider' => $dataProvider, ));
	}

	 
	public function actionAdmin() {
		IsAuth::Admin();
		$model = new Admin('search');
		$model -> unsetAttributes();
		 
		if (isset($_GET['Admin']))
			$model -> attributes = $_GET['Admin'];

		$this -> render('admin', array('model' => $model, ));
	}

	 
	public function loadModel($id) {
		$model = Admin::model() -> findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	 
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'admin-form') {
			echo CActiveForm::validate($model);
			Yii::app() -> end();
		}
	}

}
