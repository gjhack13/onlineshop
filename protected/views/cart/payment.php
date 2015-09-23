<?php
/*untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('Keranjang' => array('.'), Yii::app() -> user -> customerName => array('account/'), 'Payment');
?>
<!--open form-->
	<form action="" method="post">
		<h3 class="header">Silahkan gunakan bank transfer :<span class="header-line"></span></h3>
		<div style="clear: left;"></div>

		<!-- buat pilihan bank transfer-->
		<div style="padding:5px 0 15px 0;float: left;margin:5px 0 0 5px;border:solid 1px #CCC;width:100%;">
			<table width="100%" height="66">
				<tr>
					<td>
					<input type="radio" checked="checked" name="Transfer[bank]" value="BCA 1234-567-890 a.n onshop">
					BCA 1234-567-890 a.n onshop</td>
				</tr>
				<tr>
					<td>
					<input type="radio" name="Transfer[bank]" value="MANDIRI 1234-5678-901 a.n onshop">
					MANDIRI 1234-5678-901 a.n onshop</td>
				</tr>
				<tr>
					<td>
					<input type="radio" name="Transfer[bank]" value="BRI 12345-6789-012 a.n onshop">
					BRI 12345-6789-012 a.n onshop</td>
				</tr>
			</table>
		</div>
		<!-- /buat pilihan bank transfer-->

		 
		<p style="float: right;margin-right: 5px;clear: left;">
			<input type="submit" value="Konfirmasi Pemesanan" />
		</p>
	</form>
	<div style="clear: both;"></div>