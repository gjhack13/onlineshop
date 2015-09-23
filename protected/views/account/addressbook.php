<?php
/*untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('My account' => array('.'), Yii::app()->user->customerName,'Buku alamat');
?>
<hr>
<b><?php $this->renderPartial('_myaccount_menu');?></b>
<?php
	/*untuk menampilkan setflash*/
	foreach(Yii::app()->user->getFlashes() as $key=>$message){
		echo "<div style='margin:5px 5px 0 5px;' class='flash-".$key."'>".$message."</div>";
	}
?>
	<h3 class="header">Buku alamat anda
        <span class="header-line"></span> 
    </h3>
	<div style="clear:left;margin:0 5px 0 5px;text-align: right">
		<a href="<?php echo $this->createUrl('account/addressbook',array('add'=>'addressbook'));?>"><button class="btn btn-small btn-primary" type="button">Tambah</button></a>
	</div>
	<?php 
		/*foreach data alamat dan ditampilkan*/
		$i=1;foreach($model as $address):
		/*untuk membuat class css buat clear left*/
		($i%3===0) ? $div ='<div style="clear:left;"></div>':$div='';
	?>
	<div style="float: left;margin:5px 0 0 5px;border:solid 1px #CCC;">
		<table width="166" height="100">
			<tr>
				<td valign="top">Nama</td>
				<td valign="top">:</td>
				<td valign="top"><?php echo $address->name;?></td>
			</tr>
			<tr>
				<td valign="top">Telp./Hp</td>
				<td valign="top">:</td>
				<td valign="top"><?php echo $address->phone_number;?></td>
			</tr>
			<tr>
				<td valign="top">Alamat</td>
				<td valign="top">:</td>
				<td valign="top"><?php echo $address->address;?></td>
			</tr>
			<tr>
				<td valign="top">Provinsi</td>
				<td valign="top">:</td>
				<td valign="top"><?php echo $address->province;?></td>
			</tr>
			<tr>
				<td valign="top">Kota</td>
				<td valign="top">:</td>
				<td valign="top"><?php echo $address->city;?></td>
			</tr>
			<tr>
				 
				<td colspan="3" align="right">
					<!--membuat link untuk update data alamat-->
					<a href="<?php echo $this->createUrl('account/addressbook',array('edit'=>$address->id_address));?>">Edit Alamat</a>
				</td>
			</tr>
		</table>
	</div>
	<?php 
	echo $div;
	$i++;
	endforeach;
	?>
	<div style="clear: both;">&nbsp;</div>