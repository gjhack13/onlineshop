
<?php
/*untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('My account' => array('.'), Yii::app() -> user -> customerName, 'Pesanan saya');
?>
<hr>
<b><?php $this -> renderPartial('_myaccount_menu'); ?></b>

<div class="row-fluid">
           <div class="span9">
           		<h3 class="header">Informasi data order anda
                    <span class="header-line"></span> 
                </h3>
	<strong style="margin-left:4px;float:left;padding: 0 0 15px 0;">
		Hallo 
		<font color="green" style="text-transform: uppercase;"><?php echo $dataOrder['customer_name']; ?>,</font>
		<br>berikut data order anda dengan 
		Nomor Pemesanan <font color="green"><?php echo $dataOrder['order_code']; ?></font>, silahkan anda klik <i>"Konfirmasi pembayaran"</i> jika anda memang telah mentransfer sejumlah total harga kerekening onshop.</strong>
		<!--untuk informasi sudah dikonfirmasi atau belum-->
		<div style="float: right; margin:12px 0 0 0;">
			<?php
			if($dataOrder['payment_status']==0){
			?>
			<!--link untuk konfirmasi pembayaran-->
			<a title="click untuk konfirmasi pembayaran" href="<?php echo $this->createUrl('account/orders',array('confirm'=>$dataOrder['order_code']));?>" style="text-decoration: none;"><button class="btn btn-large btn-primary" type="button">Konfirmasi pembayaran</button></a>
			<?php }else{ ?>
			<span style="color:green;">Pembayaran telah dikonfirmasi</span>
			<?php } ?>	
		</div>
 		<!--/untuk informasi sudah dikonfirmasi atau belum-->
 <div style="clear: left;"></div>
	<!--data pemesan-->
	<table>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?php echo $dataOrder['customer_name']; ?></td>
		</tr>
		<tr>
			<td>Nomor Pemesanan</td>
			<td>:</td>
			<td><?php echo $dataOrder['order_code']; ?></td>
		</tr>
		
		<tr>
			<td>Tanggal Order</td>
			<td>:</td>
			<td><?php echo date('d F Y', strtotime($dataOrder['order_date'])); ?></td>
		</tr>
		<tr>
			<td>Bank Transfer</td>
			<td>:</td>
			<td><?php echo $dataOrder['bank_transfer']; ?></td>
		</tr>
	</table>	 
	<!--/data pemesan-->

	<div style="clear: both;">
		&nbsp;
	</div>
	<!--data detail order-->
	<div id="order-grid" class="grid-view">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th id="order-grid">Nama Produk</th>
					<th id="order-grid">Harga</th>
					<th id="order-grid">Jumlah</th>
					<th id="order-grid">Sub Total</th>
				</tr>
			</thead>
				<?php
				foreach($orderDetail as $key=>$detail):
				$class = ($key+1)%(2) ==0 ? 'even' : 'odd';
				$subtotal = $detail['price']*$detail['qty'];
				$grandtotal +=$subtotal; 
				?>
				<tbody>
                   <tr>
					<td><?php echo $detail['product_name']; ?></td>
					<td><?php echo number_format($detail['price'], 0, '', '.'); ?></td> 
					<td><?php echo $detail['qty']; ?></td>
					<td><?php echo number_format($subtotal, 0, '', '.'); ?></td>
				   </tr>
				<?php endforeach; ?>
				<tr>
					<td>Grand Total :</td>
					<td></td>
					<td></td>
					<td >IDR <?php echo number_format($grandtotal, 0, '', '.'); ?></td>
				</tr>
				</tbody>
		</table>
	</div>
	<!--/data detail order-->
</div>
</div>
