<?php
/**
 * Created by Abu Dzunnuraini.
 * e-mail: almprokdr@gmail.com
 * Date: 10/04/2013
 * Time: 7:41 PM
 */

class elfinderWidget extends CWidget{

	/**
	 * Client settings.
	 * @var array
	 *
	 $this->Widget('ext.elfinder.elfinderWidget', array('tinymcepopup'=>false, )); 
	 */
	public $tinymcepopup	= false;
	public $assetsDir;
	
	public function init(){
		$dir = dirname(__FILE__) . '/assets';
		$this->assetsDir = Yii::app()->assetManager->publish($dir);
	}

	public function run(){
		$id=$this->getId();
		$cs=Yii::app()->getClientScript();
		$uc=Yii::app()->getbaseUrl();	
		$cs->registerCssFile($cs->getCoreScriptUrl(). '/jui/css/base/jquery-ui.css');
		$cs->registerScriptFile($cs->getCoreScriptUrl(). '/jquery.min.js');
		$cs->registerScriptFile($cs->getCoreScriptUrl() . '/jui/js/jquery-ui.min.js');		
		$cs->registerCssFile($this->assetsDir . '/css/elfinder.min.css');
		$cs->registerCssFile($this->assetsDir . '/css/theme.css');
		$cs->registerScriptFile($this->assetsDir . '/js/elfinder.min.js');
		if($this->tinymcepopup) $cs->registerScriptFile($this->assetsDir . '/js/tiny_mce_popup.js');
	}

}
