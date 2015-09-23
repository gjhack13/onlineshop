<?php
/*untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('My account' => array('.'), Yii::app()->user->customerName, );
?>
<hr>
<b><?php $this->renderPartial('_myaccount_menu');?></b>

<div class="row-fluid">
            <div class="span9">
                <blockquote>
                  <h2>
                  <b><?php
foreach (Yii::app()->user->getFlashes() as $key => $message) {
  echo "<div style='margin:5px 5px 0 5px;' class='flash-" . $key . "'>" . $message . "</div>";
}
?></b>
                  Hai
						<?php
							if(isset(Yii::app()->user->customerName)){
								echo Yii::app()->user->customerName;
							}
						?>... Silahkan nikmati berbelanja mudah dengan internet with onshop
                  </h2>
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

		<div class="row-fluid">
            <ul class="thumbnails center">
              <li class="span3">
                <div class="thumbnail">
                <h3>Pesanan saya</h3>
                  
                  	<div class="round_background r-green">
                		<img src="<?php echo Yii::app()->baseUrl;?>/img/icons/smashing/30px-38.png" alt="" class="">
                     </div>
              
                  <p>Data pesanan anda semua dari pertama anda belanja. Untuk melihatnya silahkan klik pada menu "Pesanan saya" yang tertera diatas.</p>
                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                	 <h3>Buku alamat</h3>
                     
                     <div class="round_background r-yellow">
                		<img src="<?php echo Yii::app()->baseUrl;?>/img/icons/smashing/30px-02.png" alt="" class="">
                     </div>
                 
                  <p>Data semua alamat anda yang telah anda input. Untuk melihatnya silahkan klik pada menu "Buku alamat" yang tertera diatas.</p>
                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                	<h3>Informasi akun</h3>
                  	<div class="round_background r-green">
                		<img src="<?php echo Yii::app()->baseUrl;?>/img/icons/smashing/30px-10.png" alt="" class="">
                     </div>
                  <p>Informasi mengenai akun anda. Untuk melihatnya silahkan klik pada menu "Informasi akun" yang tertera diatas.</p>
                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                  <h3>Ubah password</h3>
                  <div class="round_background r-yellow">
                		<img src="<?php echo Yii::app()->baseUrl;?>/img/icons/smashing/30px-17.png" alt="" class="">
                     </div>
                  <p>Jika anda ingin mengganti password anda, silahkan klik pada menu "Ubah password" yang tertera diatas.</p>
                </div>
              </li>

            </ul>
        </div>