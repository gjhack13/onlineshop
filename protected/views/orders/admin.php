<h3>Manage Orders</h3>
 

<?php 
/*gunakan data grid view*/
$this->widget('zii.widgets.grid.CGridView', array(
	/*id datagridview*/
	'id'=>'order-grid',
	/*data provider (data order)*/
	'dataProvider'=>$model->search(),
	/*untuk filter/pencarian*/
	'filter'=>$model,
	/*untuk menghilangkan 
	 *summary text paging*/
	'summaryText'=>'',
	'pager'=>array(
			'header'=>'',
	),
	/*data yang dampilkan*/
	'columns'=>array(
		/*id order*/
		'id',
		/*order kode/nomor pemesanan*/
		'order_code',
		/*tanggal pemesanan*/
		'order_date',
		/*bank transfer*/
		'bank_transfer',
		/*payment status*/
		array(
			'name' => "payment_status",
			'value'=>'$data->payment',
			'type'=>'html',
			/*untuk filter pembayaran (sudah bayar/belum)*/
			'filter' => CHtml::dropDownList('Order[payment_status]',$model->payment_status,array('1'=>'Paid','0'=>'Pending'),array('empty'=>'')),
		),
		
		array(
			'class'=>'CButtonColumn',
			/*template buttom aksi:
			 *menampilkan tombol view saja*/
			'template'=>'{view}'
		),
	),
)); ?>
