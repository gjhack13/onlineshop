<?php
/*untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('My account', );
?>
<div class="row-fluid">

<div class="span6">
           		<h3 class="header">Daftar
                    <span class="header-line"></span> 
                </h3>
	<h3>Silahkan buat account, jika anda belum memiliki account </h3>

		<a href="<?php echo $this->createUrl('account/register');?>">
			<button class="btn btn-large btn-primary" type="button">
				Daftar
			</button>
		</a>

</div>
           <div class="span6">
           		<h3 class="header">Login
                    <span class="header-line"></span> 
                </h3>
	<h3>Silahkan login, jika anda sudah memiliki account </h3>

		<?php
		$this -> renderPartial('_formLogin', array('model' => $model));
		?>
</div>
</div>
