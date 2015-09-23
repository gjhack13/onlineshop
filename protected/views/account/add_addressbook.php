<?php
/*untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('My account' => array('.'), Yii::app() -> user -> customerName, 'Buku alamat');
?>
<hr>
<div style="margin: 0 0 0 5px;;">
	<!--render partial untuk menu my account-->
	<?php $this -> renderPartial('_myaccount_menu'); ?>
</div>
<div style="padding:5px 10px 0 0;margin:5px 5px 15px 5px; border:1px solid #CCC;text-align: justify;">
	<div class="form" style="margin-left: 15px;">
		<?php
			/*rendr partial ke _formAddAddress*/
			$this->renderPartial('_formAddAddress',array('model'=>$model));
		?>
		
	</div>
</div>
