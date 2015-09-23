<?php
/*untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('Keranjang' => array('.'),Yii::app() -> user -> customerName=>array('account/'),'Pilih alamat');
?>


	<h3 class="header">Gunakan 'Alamat' yang sudah ada dibawah ini:<span class="header-line"></span></h3>
	 
	<form action="" method="post">
	<?php
		$i=1;foreach($addressBooks as $address):
		($i%3===0) ? $div ='<div style="clear:left;"></div>':$div='';
		($i===1) ? $checked ='checked="checked"' : $checked='';
	?>
		
			<table class="table table-striped table-bordered table-hover">
				<tr>
					<td><input type="radio" <?php echo $checked;?> name="ChooseAddress[id_address]" value="<?php echo $address->id_address;?>" /></td>
					<td>
						<strong><?php echo $address->name;?></strong>
						<h3><?php echo $address->address;?>,
						<?php echo $address->city;?>,
						<?php echo $address->province;?>.</h3>
						Telp./Hp : 
						<?php echo $address->phone_number;?>
					</td>
				</tr>
			</table>
		<?php
		echo $div;
		$i++;
		endforeach;
		?>
	<div style="clear:left;"></div>
	<div class="flash-notice" style="margin:15px 0 0 5px;">
	<p style="margin-left: 5px;">Atau
		<strong><a href="<?php echo $this->createUrl('cart/finishshop',array('addNewAddress'=>'and use it'));?>">Buat alamat baru dan gunakan sebagai alamat pengiriman</a>. Jika sudah, silahkan lanjutkan.</strong>
	</p>
	</div>
	<?php
	foreach(Yii::app()->user->getFlashes() as $key=>$message){
		echo "<div style='margin-left:5px;' class='flash-".$key."'>".$message."'</div>";
	}
	?>
	<p style="float: right;margin-right: 5px;">
		<input type="submit" value="Lanjutkan" onclick="return confirm('periksa kembali, apakah alamat kirim sudah benar?')" />
	</p>
	</form>
	<div style="clear: both;"></div>
</div>