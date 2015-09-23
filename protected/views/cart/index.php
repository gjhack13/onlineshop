<?php
$this -> breadcrumbs = array('Keranjang', );
?>
           		
   	<h3 class="header">Keranjang belanja
        <span class="header-line"></span> 
    </h3>
           		
<?php
	if(empty($data)){
?>
	<div class="shout-box">
        <div class="shout-text">
        <h3>Keranjang belanja anda masih kosong</h3>
		<img src="<?php echo Yii::app()->baseUrl;?>/img/sp.png">
		</div>
	</div>

<?php }else{ ?>
	

<div class="price-table clear col3">

  <?php echo CHtml::beginForm(array('change')); ?>
  <?php $i=1;foreach($data as $model): $sum=$sum+($model['price'] * $model['qty'])?>
	<?php echo CHtml::hiddenField('id' . $i, $model['id'], array('maxlength' => 3, 'style' => "width:20px;text-align:center")); ?>
	<dl class="plan most-popular">
		<dt><strong><?php echo $model['product_name']; ?></strong></dt>
			<dd>
			<?php echo CHtml::image(Yii::app() -> request -> baseUrl . '/images/products/thumbs/' . $model['image'] . '', ''); ?>
			</dd>
		
		<dd>Harga <strong>IDR <?php echo number_format($model['price'], 0, '.', '.'); ?></strong></dd>
		<dd><?php echo CHtml::textField('qty' . $i, $model['qty'], array('maxlength' => 3, 'style' => "width:55px;text-align:center")); ?><br>
		<?php echo CHtml::submitButton('Ubah'); ?></dd>
		<dd>Total <strong>IDR <?php echo number_format($model['price'] * $model['qty'], 0, '.', '.'); ?></strong></dd>	
		<dd><?php echo CHtml::link(CHtml::encode("Hapus"), array('remove', 'id' => $model['id'])); ?></dd>
	</dl>

<?php $i++; endforeach; ?>
</div>

	<div class="shout-box">
        <div class="shout-text">
			<h1>Total harga belanja anda</h1>
			<h2>IDR <?=number_format($sum, 0, ",", ".") ?></h2>
			<?php echo CHtml::button('Belanja lagi', array('submit' => array('product/'))); ?>
			<?php echo CHtml::button('Selesai Belanja', array('submit' => array('cart/finishshop'))); ?>
		</div>
	</div>
                                        
<?php echo CHtml::endForm(); ?>
<?php } ?>