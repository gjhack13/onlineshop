<?php

class CategoryController extends Controller{
	 
	public $layout='admin_page';


	public function actionView($id){
		IsAuth::Admin();
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

 	/*create kategori*/
	public function actionCreate(){
		IsAuth::Admin();
		/*panggil model Category*/	
		$model=new Category;
		/*jika data kategori dikirim*/
		if(isset($_POST['Category'])){
			/*set attributes*/	
			$model->attributes=$_POST['Category'];
			/*simpan data kategori*/
			if($model->save()){
				/*direct ke actionView*/
				$this->redirect(array('view','id'=>$model->id));
			}
				
		}
		/*menampilkan form create*/
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/*update category*/
	public function actionUpdate($id){
		IsAuth::Admin();
		/*find data by pk*/	
		$model=$this->loadModel($id);
		/*jika data dikirim*/
		if(isset($_POST['Category'])){
			/*set attributes*/	
			$model->attributes=$_POST['Category'];
			/*simpan perubahan*/
			if($model->save()){
				/*direct ke function actionView*/	
				$this->redirect(array('view','id'=>$model->id));
			}
		}
		/*menampilkan form update*/
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/*untuk delete category*/
	public function actionDelete($id){
		IsAuth::Admin();
		if(Yii::app()->request->isPostRequest){
			$this->loadModel($id)->delete();
			if(!isset($_GET['ajax'])){
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		}else{
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}

	 

	/*untuk list data category*/
	public function actionAdmin(){
		IsAuth::Admin();
		/*panggil mpdel category->search*/	
		$model=new Category('search');
		$model->unsetAttributes();  // clear any default values
		/*jika data kategory dikirim*/
		if(isset($_GET['Category'])){
			/*maka set attributes/criteria untuk pencarian*/
			$model->attributes=$_GET['Category'];
		}
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/*untuk find data by pk*/
	public function loadModel($id){
		$model=Category::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/*melakukan ajax validation*/
	protected function performAjaxValidation($model){
		if(isset($_POST['ajax']) && $_POST['ajax']==='category-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
?>