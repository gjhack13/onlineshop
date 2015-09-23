<?php
/*untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('My account' => array('.'), Yii::app() -> user -> customerName, 'Konfirmasi Pembayaran');
?>
<hr>
<div style="margin: 0 0 0 5px;;">
	<?php $this -> renderPartial('_myaccount_menu'); ?>
</div>
<div style="padding:5px 10px 0 0;margin:5px 5px 15px 5px; border:1px solid #CCC;text-align: justify;">
 <div style="clear: left;"></div>
 <center>
	<h1 style="font-size:12px; margin: 5px 0 0 5px;">
		Pembayaran pemesanan anda dengan nomor #<?php echo $_GET['confirm'];?><br><br>
		<a style="text-decoration: none;color:green;" href="/yiishop/product">Telah success di konfirmasi</a>
		<br><br>
		Terima Kasih.
	</h1>	
</center>
	 

	<div style="clear: both;">
		&nbsp;
	</div>
	 
</div>