<?php
/**
 * Created by Abu Dzunnuraini.
 * e-mail: almprokdr@gmail.com
 * Date: 10/04/2013
 * Time: 7:41 PM
 */

class tinymceWidget extends CWidget{

	/**
	 * Client settings.
	 * @var array
	 *
	 $this->Widget('ext.tinymce.tinymceWidget', array(
			'elfinder'=>$this->createUrl('/elfinder'), 
			'element'=>'Post_content',
			'width'=>700,
			'height'=>450,
			'skin'=>'o2k7',	 
		)); 
	 */
	
	public $assetsDir;
	
	/**
	 Template 
	*/
	public $mceTemplate="
tinyMCE.init({
	mode: 'exact',
	elements: '{element}',
	theme: 'advanced',
	width: '{width}',
	height: '{height}',
	skin:'{skin}',
	convert_urls : false,
	plugins : 'autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave',
	theme_advanced_buttons1 : 'save,newdocument,|,undo,redo,|,bold,italic,underline,strikethrough,|,blockquote,|,justifyleft,justifycenter,justifyright,justifyfull,|,sub,sup,|,bullist,numlist,|,link,unlink,|,image,media,inserttime',
	theme_advanced_buttons2 : 'cut,copy,paste,|,forecolor,|,backcolor,fontselect,fontsizeselect,|,search,replace,|,syntaxhl,charmap,|,wp_more,hr,|,advcode,code,|,fullscreen,|',
	theme_advanced_buttons3 : '',
	theme_advanced_toolbar_location : 'top',
	theme_advanced_toolbar_align : 'left',
	theme_advanced_statusbar_location : 'bottom',
	file_browser_callback : 'elFinderBrowser',
	theme_advanced_resizing : true
});

function elFinderBrowser (field_name, url, type, win) {
	var tth=window.innerHeight-60; 
	var cmsURL = '{elfinder}?tinymce&height='+tth;
	if (cmsURL.indexOf('?') < 0) {
		cmsURL = cmsURL + '?type=' + type;
	}else {
		cmsURL = cmsURL + '&type=' + type;
	}

	tinyMCE.activeEditor.windowManager.open({
		file : cmsURL,
		title : 'File Browser',
		width : window.innerWidth-60, 
		height : tth,
		resizable : 'yes',
		inline : 'yes',
		popup_css : false, 
		close_previous : 'no'
		},{
			window : win,
			input : field_name
		});
	return false;
}";

	/**
	 Name of element 
	*/
	public $element='';
	
	/**
	 Elfinder directory 
	*/
	public $elfinder='';
	
	public $height=450;
	
	public $width=650;
	
	public $skin='default';
	
	public function init(){
		$dir = dirname(__FILE__) . '/assets';
		$this->assetsDir = Yii::app()->assetManager->publish($dir);
	}

	public function run(){
		$id=$this->getId();
		$cs=Yii::app()->getClientScript();
		$cs->registerScriptFile($this->assetsDir . '/tiny_mce.js');
		$js=strtr($this->mceTemplate, 
			array(
				'{element}'=>$this->element,
				'{elfinder}'=>$this->elfinder, 
				'{width}'=>$this->width,
				'{height}'=>$this->height,
				'{skin}'=>$this->skin,
				));
		$cs->registerScript(__CLASS__, $js, CClientScript::POS_HEAD);
	}

}
