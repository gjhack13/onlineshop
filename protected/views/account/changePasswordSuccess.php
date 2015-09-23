<?php
/*untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('My account' => array('.'), Yii::app()->user->customerName,'Change password success' );
?>
<hr>
<div style="margin: 0 0 0 5px;;">
	<?php $this->renderPartial('_myaccount_menu');?>
</div>
<div style="padding:15px 10px 0 0;margin:5px 5px 15px 5px; border:1px solid #CCC;text-align: justify;">
	<?php
	foreach(Yii::app()->user->getFlashes() as $key=>$message){
		echo "<div style='margin-left:5px;' class='flash-".$key."'>".$message;
		echo ", <a href='".$this->createUrl('account/logout')."'>untuk mencoba silahkan login kembali!</a>";
		echo "</div>";
	}
?>
</div>	