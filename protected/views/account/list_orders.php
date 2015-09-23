<?php
/*untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('My account' => array('.'), Yii::app() -> user -> customerName, 'Pesanan saya');
?>
<hr>
<b><?php $this -> renderPartial('_myaccount_menu'); ?></b>
	<h3 class="header">List order anda
        <span class="header-line"></span> 
    </h3>
<?php
	/*buat code jquery untk search data order*/
	Yii::app() -> clientScript -> registerScript('search', "
		/*jika search form disumbit*/ 
		$('.search-form form').submit(function(){
			/*update order-grid*/	
			$.fn.yiiGridView.update('order-grid', {
			/*set data form menjadi serialize*/	
			data: $(this).serialize()
			});
		return false;
		});
	");
?>
	<!--form search-->
		<?php $form = $this -> beginWidget('CActiveForm', 
		    array('action' => Yii::app() -> createUrl($this -> route), 'method' => 'get', )); ?>
			<?php echo $form -> textField($model, 'order_code',array('placeholder'=>'cari berdasarkan order code','size'=>30)); ?><br>
		<?php echo CHtml::submitButton('Search'); ?>
		<?php $this -> endWidget(); ?>
	<!--/form search--> 
	
	<h5><b><i>* jika anda telah mentransfer sejumlah harga beli kepada rekening onshop, silahkan klik data kode yang tertera pada kolom "Nomor Pemesanan" untuk melakukan konfirmasi pembayaran yang telah sesuai dengan tanggal pemesanan anda.</i></b></h5>
	<?php $this -> widget('zii.widgets.grid.CGridView', array('id' => 'order-grid',
		'dataProvider' => $model -> search(),
		'summaryText'=>'',
		//'filter'=>$model,
		'columns' => array(
			'order_date', 
			array(
				'name'=>'order_code',
				'header'=>'Nomor Pemesanan',
				'type'=>'html',
				'value'=>'CHtml::link("$data->order_code", array("orders", "id"=>$data->id),array("title"=>"click untuk lihat order"))',
				 
			), 
			 
			'bank_transfer',
			)
		)
	);
	?>
</div>
