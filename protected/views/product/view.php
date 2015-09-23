<?php
/*untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('Produk' => array('index'), $data -> product_name, );
?>

	<div class="shout-box">
        <div class="shout-text">
          <h1><?php echo $data -> product_name;?></h1>
          <p>IDR <?php echo $data -> price_product;?></p>
        </div>
    </div>
	<a href="<?php echo Yii::app() -> request -> baseUrl . '/images/products/' . $data -> image;?>" rel='dofollow' target='_blank'>
		<?php 
			/*untuk menampilkan gambar*/
			echo CHtml::image(Yii::app() -> request -> baseUrl . '/images/products/thumbs/' . $data -> image . '', '');
		?>
	</a>
	<div class="shout-box">
        <div class="shout-text">
		<b>Price:</b> 
		<b>IDR <?php echo $data -> price_product;?></b>
		<p><?php echo $data -> description;?></p>
		<p>
				<?php
				/*membuat link update bagi admin yang login
				 *dan mengakses store*/
				if (!Yii::app() -> user -> isGuest && !isset(Yii::app()->user->customerLogin)) {
					echo CHtml::link(CHtml::encode("Update"), array('update', 'id' => $data -> id));
				}
				?>
			&nbsp;&nbsp;		
			<b>
				<!--link beli/add to cart-->
				<a class="btn btn-large btn-primary"
				<?php echo CHtml::link(CHtml::encode("BELI"), array('addtocart', 'id' => $data -> id, 'p'=>$data->product_name));?>
			</b>
			&nbsp;&nbsp;
		</p>
</div>
</div>