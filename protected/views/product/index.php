<?php
/*digunakan untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('Produk', );
?>

	<div class="slider-bootstrap"><!-- start slider -->
    	<div class="slider-wrapper theme-default">
          <div id="slider-nivo" class="nivoSlider">
            <?php
				/*foreach data product yang di bawa $models*/
				foreach($models as $data):
			?>
                
            <?php 
				/*untuk menampilkan gambar*/
				echo CHtml::image(Yii::app() -> request -> baseUrl . '/images/products/thumbs/' . $data -> image . '', '');
			?>

			<?php endforeach;?>
          </div>
        </div>
    </div> <!-- /slider -->

    <div class="shout-box">
        <div class="shout-text">
          <h1>
          	Selamat datang di onshop
          	<?php
				if(isset(Yii::app()->user->customerName)){
					echo Yii::app()->user->customerName;
				}
			?>
          </h1>
          <p>Website ini hanya portofolio semata<br> Untuk anda yang ingin melihat fitur-fitur dari aplikasi web online shop ini.</p>
        </div>
    </div>

    
    	<div class="row-fluid">
            <ul class="thumbnails center">
    <?php
		/*foreach data product yang di bawa $models*/
		foreach($models as $data):
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


        <div class="row-fluid">
            <ul class="thumbnails center">
              <li class="span3">
                <div class="thumbnail">
                <h3>Respon cepat</h3>
                  
                  	<div class="round_background r-grey-light">
                		<img src="<?php echo Yii::app()->baseUrl;?>/img/icons/smashing/30px-01.png" alt="" class="">
                     </div>
              
                  <p>Anda masukkan teks disini. Detail ataupun keterangan dari suatu produk yang akan anda jual pada website ini.</p>
                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                	 <h3>Harga normal</h3>
                     
                     <div class="round_background r-yellow">
                		<img src="<?php echo Yii::app()->baseUrl;?>/img/icons/smashing/30px-41.png" alt="" class="">
                     </div>
                 
                  <p>Anda masukkan teks disini. Detail ataupun keterangan dari suatu produk yang akan anda jual pada website ini.</p>
                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                	<h3>Mudah diakses</h3>
                  	<div class="round_background r-grey-light">
                		<img src="<?php echo Yii::app()->baseUrl;?>/img/icons/smashing/30px-37.png" alt="" class="">
                     </div>
                  <p>Anda masukkan teks disini. Detail ataupun keterangan dari suatu produk yang akan anda jual pada website ini.</p>
                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                  <h3>Privasi & Keamanan</h3>
                  <div class="round_background r-yellow">
                		<img src="<?php echo Yii::app()->baseUrl;?>/img/icons/smashing/30px-17.png" alt="" class="">
                     </div>
                  <p>Anda masukkan teks disini. Detail ataupun keterangan dari suatu produk yang akan anda jual pada website ini.</p>
                </div>
              </li>

            </ul>
        </div>
        
        <hr>
        
        <div class="row-fluid">
            <div class="span9">
                <blockquote>
                  <h2>Website ini hanyalah sebuah portofolio semata. Untuk anda yang ingin melihat fitur dari web online shop ini.</h2>
                  <small>Codec by<cite title="www.gjhack13.web.id"> - g_jHACK13</cite></small>
                </blockquote>
            </div>
            
            <div class="span3" style="text-align:center;">
            
            <h3 class="text-error">Ingin memesan?</h3>
            
            <a href="http://gjhack13.web.id/halaman/contact" rel='dofollow' target='_blank'>
            	<button class="btn btn-large btn-danger" type="button">Contact admin!</button>
            </a>
            <p> <small>* terms and conditions apply</small></p>
            
            </div>
            
        </div>
       
      <h3 class="header">Cool features
        <span class="header-line"></span> 
      </h3>
        
	  <div class="row-fluid">
      	<div class="span4">
          
          <ul class="list-icon">
          	<li>Unlimited color options</li>
            <li>Responsive layout</li>
            <li>6 Homepage variations</li>
            <li>Portfolio layouts</li>
            <li>Multiple blog layouts</li>
            <li>HTML5</li>
            <li>CSS3</li>
            
          </ul>
       	 </div>
         
         <div class="span4">
          	<div class="showcase-small">
                <div class="text-icon pull-left">
                <img src="<?php echo Yii::app()->baseUrl;?>/img/icons/fatcow/html_5.png" width="32" height="32" alt="Font" />
                </div>
                <h4>Valid HTML5</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          	</div>
            <div class="showcase-small">
                <div class="text-icon pull-left">
                <img src="<?php echo Yii::app()->baseUrl;?>/img/icons/fatcow/css_3.png" width="32" height="32" alt="Font" />
                </div>
                <h4>CSS3 Support</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          	</div>
          </div>
          <div class="span4">
          	<div class="showcase-small">
                <div class="text-icon pull-left">
                <img src="<?php echo Yii::app()->baseUrl;?>/img/icons/fatcow/layouts_header_2.png" width="32" height="32" alt="Font" />
                </div>
                <h4>Multiple layouts</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          	</div>
            <div class="showcase-small">
                <div class="text-icon pull-left">
                <img src="<?php echo Yii::app()->baseUrl;?>/img/icons/fatcow/cog_edit.png" width="32" height="32" alt="Font" />
                </div>
                <h4>Easy Customization</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          	</div>
          </div>
        
      </div>

      <h3 class="header">Our customers
    <span class="header-line"></span>  
  </h3>
  <div class="row-fluid">
    <div class="span3 center">
        <img src="<?php echo Yii::app()->baseUrl;?>/img/customers/themeforest.png" alt="Themeforest" />
    </div>
    <div class="span3">
        <img src="<?php echo Yii::app()->baseUrl;?>/img/customers/codecanyon.png" alt="Codecanyon" />
    </div>
    <div class="span3">
        <img src="<?php echo Yii::app()->baseUrl;?>/img/customers/graphicriver.png" alt="Graphicriver" />
    </div>
    <div class="span3">
        <img src="<?php echo Yii::app()->baseUrl;?>/img/customers/photodune.png" alt="Photodune" />
    </div>
      
  </div><!--/row-fluid-->
    

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/js/nivo-slider/jquery.nivo.slider.pack.js"></script>
    
     <script type="text/javascript">
    $(function() {
        $('#slider-nivo').nivoSlider({
			effect: 'boxRandom',
			manualAdvance:false,
			controlNav: false
			});
    });
    </script> <!--<script type="text/javascript">
    $(document).ready(function() {
        $('#slider-nivo2').nivoSlider();
    });
    </script>-->