<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Portofolio onshop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="g_jHACK13">
	
	<?php
	  $baseUrl = Yii::app()->baseUrl; 
	  $cs = Yii::app()->getClientScript();
	  Yii::app()->clientScript->registerCoreScript('jquery');
	?>
	
    <!-- the styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/css/bootstrap-responsive.min.css">
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Pontano+Sans'>
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/js/nivo-slider/themes/default/default.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/js/nivo-slider/nivo-slider.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/js/lightbox/css/lightbox.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/css/template.css">  
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/css/style1.css" />
    <link rel="alternate stylesheet" type="text/css" media="screen" title="style2" href="<?php echo $baseUrl;?>/css/style2.css" />
    <link rel="alternate stylesheet" type="text/css" media="screen" title="style3" href="<?php echo $baseUrl;?>/css/style3.css" />
    <link rel="alternate stylesheet" type="text/css" media="screen" title="style4" href="<?php echo $baseUrl;?>/css/style4.css" />
    <link rel="alternate stylesheet" type="text/css" media="screen" title="style5" href="<?php echo $baseUrl;?>/css/style5.css" />
    <link rel="alternate stylesheet" type="text/css" media="screen" title="style6" href="<?php echo $baseUrl;?>/css/style6.css" />
    
    <script type="text/javascript" src="<?php echo $baseUrl;?>/js/swfobject/swfobject.js"></script>
	<script type="text/javascript" src="<?php echo $baseUrl;?>/js/lightbox/js/lightbox.js"></script>
    <!-- style switcher -->
    <script type="text/javascript" src="<?php echo $baseUrl;?>/js/styleswitcher.js"></script>
    

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    

    <!-- The fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo $baseUrl;?>/img/icon.png">
  </head>

<body>
<section id="header">
<!-- Include the header bar -->
    <?php include_once('header.php');?>
<!-- /.container -->  
</section><!-- /#header -->

<section id="navigation-main">  
<div class="navbar">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
  
          <div class="nav-collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(

						array('label'=>'Home', 'url'=>array('/'),'linkOptions'=>array("data-description"=>"halaman utama"),),

                       ),
                )); ?>
    	  </div>

    	  <div class="nav-collapse">
    	  		<?php
					/*ambil semua data kategori*/
					$model=Category::model()->findAll();
					/*foreach data kategori*/
					foreach ($model as $data):
				?>
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(

							/*buat link produk berdasarkan kategori*/
							array('label'=>
								/*untuk label link*/
								CHtml::encode($data -> category_name), 
								/*untuk url link*/
								'url'=>array(
								   'product/category', 
								   'id' => $data -> id, 
								   'c' => $data -> category_name
								),
								'linkOptions'=>array("data-description"=>"produk kami"),
								),
                       ),
                )); ?>
                <?php endforeach; ?>
    	  </div>

    	  <div class="nav-collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(

						array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about'),'linkOptions'=>array("data-description"=>"tentang kami"),),

                       ),
                )); ?>
    	  </div>
    </div>
	</div>
</div>
</section><!-- /#navigation-main -->
				

					

						<!--content here-->
						<section class="main-body">
							<div class="container">
							<div class="span6">
								<!--jika $breadcrumbs tersedia maka-->
								<?php if(isset($this->breadcrumbs)):?>
								<!--tampilkan breadcrumbs-->
								<?php $this -> widget('zii.widgets.CBreadcrumbs', array('links' => $this -> breadcrumbs, )); ?>
								<!--end if-->
								<?php endif ?>
							</div><br>
					<!-- /breadcrumbs -->
									<?php echo $content;?>
							</div>
						</section>
						<!--/content-->




<section id="bottom" class="">
    <div class="container bottom"> 
    	<div class="row-fluid ">
            <div class="span3">
            	<h5>About us</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                
            </div><!-- /span3-->
            
            <div class="span3">
            	<h5>Blog roll</h5>
            	<ul class="list-blog-roll">
                    <li>
                    	<a href="#" title="Example blog article">Understanding CSS</a>	
                    </li>
                    <li>
                    	<a href="#" title="Example blog article">40 Free icons</a>	
                    </li>
                    <li>
                    	<a href="#" title="Example blog article">Search engine optimisation</a>	
                    </li>
                    <li>
                    	<a href="#" title="Example blog article">Intermarket guide pt. 1</a>	
                    </li>
                    <li>
                    	<a href="#" title="Example blog article">Intermarket guide pt. 2</a>	
                    </li>
                    <li>
                    	<a href="#" title="Example blog article">Intermarket guide pt. 3</a>	
                    </li>
                    <li>
                    	<a href="#" title="Example blog article">CSS3 IE hacks</a>	
                    </li>
                </ul>
            	
            </div><!-- /span3-->
            
            <div class="span3">
            	<h5>Twitter feed</h5>
            	<p>
                    Cool CSS tutorial
                    <br/>
                    <a href="#">http://t.co/Xdert</a>
                    <br/>
                    <span>about 1 hour ago</span>
                </p>
                <p>
                    Everything to know about HTML5
                    <br/>
                    <a href="#">http://t.co/Xdert</a>
                    <br/>
                    <span>about 7 hours ago</span>
                </p>
                <p>
                    Learn PHP in 3 days
                    <br/>
                    <a href="#">http://t.co/Xdert</a>
                    <br/>
                    <span>about 9 hours ago</span>
                </p>
            </div><!-- /span3-->
            
            <div class="span3">
            	<h5>Contact us</h5>
                <p>
                    795 Folsom Ave, Suite 600<br/>
                    San Francisco, CA 94107<br/>
                    P: (123) 456-7890<br/>
                    E: first.last@gmail.com<br/>
                
                </p>
                <br>
                <h5>Follow us</h5>
                	<ul>
						<img src="<?php echo $baseUrl;?>/img/icons/social/facebook.png"  alt="Facebook" />
						<img src="<?php echo $baseUrl;?>/img/icons/social/twitter.png"  alt="Twitter" />
						<img src="<?php echo $baseUrl;?>/img/icons/social/linkedin.png"  alt="LinkedIn" />
						<img src="<?php echo $baseUrl;?>/img/icons/social/google.png"  alt="Google+" />
						<img src="<?php echo $baseUrl;?>/img/icons/social/rss.png"  alt="RSS" />
        			</ul><!--/.social-icons -->
            </div><!-- /span3-->
        </div><!-- /row-fluid -->
        </div><!-- /container-->
</section><!-- /bottom-->

<footer>
    <div class="footer">
        <div class="container">
        	Copyright &copy; 2015. Designed by gjhack13.web.id - Portofolio online shop
        </div>
	</div>
</footer>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="<?php echo Yii::app()->baseUrl;?>/js/bootstrap-transition.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/js/bootstrap-alert.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/js/bootstrap-modal.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/js/bootstrap-tab.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/js/bootstrap-popover.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/js/bootstrap-button.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/js/bootstrap-collapse.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/js/bootstrap-carousel.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/js/bootstrap-typeahead.js"></script>   
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>


  </body>
</html>