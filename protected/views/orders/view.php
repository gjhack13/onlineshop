<style>
	.summary{
		display: none;
	}
	table.detail-view{
		width: 400px;
	}
</style>
<h3 style="border-bottom: solid 1px;margin:0 0 20px 0;">View Order #<?php echo $model->order_code; ?></h3>
<div style="float: left;">
	<h3>Data Order</h3>
	<?php 
	/*untuk menampilkan data pemesan
	 *dengan Cdetailview*/
	$this->widget('zii.widgets.CDetailView', array(
		/*data order*/
		'data'=>$model,
		'attributes'=>array(
			/*id pesan*/
			'id',
			/*nomor pemesanan*/
			array(
				'type'=>'HTML',
				'name'=>'Nomor Pemesanan',
				'value'=>$model->order_code,
			),
			/*nama pelanggan*/
			array(
				'type'=>'HTML',
				'name'=>'Nama Pelanggan',
				'value'=>$model->customer->customer_name,
			),
		),
	)); ?>
	<h3 style="margin: 20px 0 0 0;">Alamat Pengiriman</h3>
	<?php 
	/*untuk menampilkan data alamat pengiriman
	 *menggunakan Cdetailview*/
	$this->widget('zii.widgets.CDetailView', array(
		/*data alamat pengiriman*/
		'data'=>$shippingAddress,
		'attributes'=>array(
			/*id_address*/
			array(
				'type'=>'HTML',
				'name'=>'id_address',
				'value'=>$shippingAddress->id_address,
			),
			/*nama penerima / nama alamat*/
			array(
				'type'=>'HTML',
				'name'=>'name',
				'value'=>$shippingAddress->name,
			),
			/*alamat lengkap pengiriman*/
			array(
				'type'=>'HTML',
				'name'=>'address',
				'value'=>$shippingAddress->address.
				'<br>Telp/Hp : '.$shippingAddress->phone_number.
				'<br>'.$shippingAddress->city.', '.$shippingAddress->province,
			),
		),
	)); ?>
</div>
<div style="float: right;">
	<?php 
	/*untuk data pembayaran/data konfirmasi pembayaran*/
	if(empty($dataPayment)){?>
	<h3 style="color:red;">Data Konfirmasi Pembayaran Belum Ada</h3>
	<?php }else{?>
	<h3>Data Konfirmasi Pembayaran</h3>
	<?php $this->widget('zii.widgets.CDetailView', array(
		/*data konfirmasi pembayaran*/
		'data'=>$dataPayment,
		'attributes'=>array(
			/*id konfirmasi*/
			'id',
			/*nomor pemesanan*/
			array(
				'type'=>'HTML',
				'name'=>'Nomor Pemesanan',
				'value'=>$dataPayment->order_code,
			),
			/*nama bank asal*/
			array(
				'type'=>'HTML',
				'name'=>'bankAsal',
				'value'=>$dataPayment->dataPaymentText[0],
			),
			/*nama pemilik rekening asal*/
			array(
				'type'=>'HTML',
				'name'=>'pemilikRekAsal',
				'value'=>$dataPayment->dataPaymentText[1],
			),
			/*nama bank tujuan transfer*/
			array(
				'type'=>'HTML',
				'name'=>'bankTujuan',
				'value'=>$dataPayment->dataPaymentText[2],
			),
			/*jumlah yang di transfer*/
			array(
				'type'=>'HTML',
				'name'=>'nominalTransfer',
				'value'=>'IDR '.number_format($dataPayment->dataPaymentText[3],0,'','.'),
			),
		),
	)); ?>
	<?php } ?>
</div>
<div style="clear: both;"></div>
<br><br>
<h3>Order Detail</h3>
<?php 
/*untuk menampilkan data detail order*/
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'order-grid',
	/*data order detail*/
	'dataProvider'=>$ordet->search(),
	/*menghilangkan summary text*/
	'summaryText'=>'',
	'columns'=>array(
		/*id*/
		'id',
		/*nomor pemesanan*/
		array(
			'name'=>'order_code',
			'value'=>'$data->order_code',
			'sortable'=>TRUE,
		),
		/*nama produk*/
		array(
			'type'=>'html',
			'name'=>'product_name',
			'value'=>'$data->product->product_name',
			'sortable'=>TRUE,
		),
		/*quantity*/
		array(
			'type'=>'html',
			'name'=>'Quantity',
			'value'=>'$data->qty','sortable'=>true,
		),
		/*subtotal*/
		array(
			'type'=>'html',
			'name'=>'Subtotal',
			'value'=>'$data->subtotal','sortable'=>true,
		),
	),
)); ?>