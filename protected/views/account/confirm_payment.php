<?php
/*untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('My account' => array('.'), Yii::app() -> user -> customerName, 'Konfirmasi Pembayaran');
?>
<hr>
<b><?php $this -> renderPartial('_myaccount_menu'); ?></b>
<style>
	form .errorSummary {
    background: none repeat scroll 0 0 #FFEEEE;
    border: 2px solid #CC0000;
    font-size: 0.9em;
    margin: 0 0 20px 3px;
    padding: 7px 7px 12px;
    text-align: justify;
}
form .errorSummary ul{
	padding: 0 0 0 20px;
}
</style>
<div class="row-fluid">
           <div class="span9">
           		<h3 class="header">Demi kelancaran proses pengiriman silahkan anda isi kembali data dibawah ini 
                    <span class="header-line"></span> 
                </h3>
 	<?php echo CHtml::beginForm();?>
 	<?php echo CHtml::errorSummary($model); ?>
	<table>
		<tr>
			<td><?php echo CHtml::activeLabel($model, 'nomerPemesanan'); ?></td>
			<td>:</td>
			<td><b><?php echo $_GET['confirm'];?></b>
				 <?php echo CHtml::activeHiddenField($model,'nomerPemesanan',array('value'=>$_GET['confirm']));?> 
			</td>
		</tr>
		<tr>
			<td><?php echo CHtml::activeLabel($model, 'bankAsal'); ?></td>
			<td>:</td>
			<td>
				 <?php echo CHtml::activeTextField($model,'bankAsal');?> 
			</td>
		</tr>
		<tr>
			<td><?php echo CHtml::activeLabel($model, 'pemilikRekAsal'); ?></td>
			<td>:</td>
			<td>
				 <?php echo CHtml::activeTextField($model,'pemilikRekAsal');?> 
			</td>
		</tr>
		<tr>
			<td colspan="3"><hr style="color:pink;"></td>
		</tr>
		<tr>
			<td><?php echo CHtml::activeLabel($model, 'bankTujuan'); ?></td>
			<td>:</td>
			<td>
				<select name="Confirmpayment[bankTujuan]">
					<option value="BCA 1234-567-890 a.n onshop">BCA 1234-567-890 a.n onshop</option>
					<option value="MANDIRI 1234-5678-901 a.n onshop">MANDIRI 1234-5678-901 a.n onshop</option>
					<option value="BRI 12345-6789-012 a.n onshop">BRI 12345-6789-012 a.n onshop</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo CHtml::activeLabel($model, 'nominalTransfer'); ?></td>
			<td>:</td>
			<td><?php echo CHtml::activeTextField($model,'nominalTransfer');?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><?php echo CHtml::submitButton('Confirm');?></td>
		</tr>
		
		 
	</table>
	<?php echo CHtml::endForm();?>	 
	 

	<div style="clear: both;">
		&nbsp;
	</div>
	 
</div>
