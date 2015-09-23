<?php
/*untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('Cart' => array('.'),Yii::app() -> user -> customerName,'Check out', 'Use new address');
?>
<div style="padding:5px 10px 0 0;margin:5px 5px 15px 5px; border:1px solid #CCC;text-align: justify;">
	<div class="form" style="margin-left:15px;">
	<?php
	$this->renderPartial('/account/_formAddAddress',array(
	 	'model'=>$model,
	 ));
?>
	 </div>
</div>