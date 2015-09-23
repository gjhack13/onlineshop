<?php
/*untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('Produk' => array('product/'), 'Kategori', );
?>

	<h3 class="header">Semua Produk
        <span class="header-line"></span> 
    </h3>

		<div class="row-fluid">
            <ul class="thumbnails center">
    <?php
		$i=1;
		foreach($models as $data):
	 		if($i%2==0){$class="rightbox";}else{$class="leftbox";}
	?>
              <li class="span4">
                <div class="thumbnail">
                  <div class="colored_banner thumb-content-dark">
                	<h3><b><?php echo $data -> product_name; ?></b></h3>
                  
                  		<?php 
							/*untuk menampilkan gambar*/
							echo CHtml::image(Yii::app() -> request -> baseUrl . '/images/products/thumbs/' . $data -> image . '', '');
						?>
                
                	<h3>IDR <?php echo $data -> price_product; ?></h3>
                  	<p><?php echo $data -> description;?></p>

                  		<?php
							/*untuk membuat link update jika user login is admin*/
							if (!Yii::app() -> user -> isGuest && !isset(Yii::app()->user->customerLogin)) {
								echo CHtml::link(CHtml::encode("Update"), array('update', 'id' => $data -> id));
							}
						?>
						<!--membuat link add to cart-->
						&nbsp;&nbsp;
						<a class="btn btn-large btn-primary"
						<?php echo CHtml::link(CHtml::encode("Beli"), array('addtocart', 'id' => $data -> id, 'p'=>$data->product_name)); ?>
						<!--membuat link detail product-->
						&nbsp;&nbsp;
						<a class="btn btn-large btn-info"
						<?php echo CHtml::link(CHtml::encode("Detail"), array('view', 'id' => $data -> id, 'p'=>$data->product_name)); ?>
                			<!--...-->
                  </div>
                </div>
              </li>
    <?php endforeach;?>
            </ul>
        </div>

					<center>
                     <?php $this->widget('CLinkPager', array(
                        'pages' => $pages,
                        'cssFile'=>Yii::app()->request->baseUrl.'/css/pager2.css',
                        'header'=> '',
                        'firstPageLabel'=>'Awal...',
                        'lastPageLabel'=>'...Akhir',
                        'nextPageLabel'=>'>',
                        'prevPageLabel'=>'<',
                        'maxButtonCount'=>5,
                     ))?>
                     </center>