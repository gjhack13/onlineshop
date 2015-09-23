<?php
/*untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('My account' => array('.'), Yii::app()->user->customerName,'Info Akun');
?>
<hr>
<b><?php $this->renderPartial('_myaccount_menu');?></b>
	<h3 class="header">Informasi akun anda
        <span class="header-line"></span> 
    </h3>
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?php echo Yii::app()->user->customerName;?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td>:</td>
			<td><?php echo Yii::app()->user->customerEmail;?></td>
		</tr>
	</table>