<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>*** Admin Page ***</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl;?>/img/icon.png">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
<link href="<?php echo Yii::app()->request->baseUrl;?>/assets/admin/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
	<div id="logo">
		<br><h1><img src="<?php echo Yii::app()->request->baseUrl;?>/img/icon.png" width="50px"><a href="#">welcome to admin Onshop</a></h1>
	</div>
	 
	<!-- end #logo -->
	<div id="header">
		<div id="menu" style="float: right">
			<ul style="float: right">
			<?php if(isset(Yii::app()->user->username)){?>
				<li><a href="<?php echo $this->createUrl("admin/logout");?>">LOG OUT (<?php echo Yii::app()->user->username;?>)</a></li>
			<?php } ?>
			</ul>	
		</div> 
	</div>
	<!-- end #header -->
	<!-- end #header-wrapper -->
	<div id="main-content">
		<div id="content">
		  <div class="content-data">
					<!--content here-->
					<?php echo $content;?>
					<!--/content-->
		  </div>
		</div>
		<!-- end #content -->
		
		<!--sidebar-->
		<div id="sidebar">
			<ul>
				<li>
					<h2>MENU</h2>
					<ul>
						<li><a href="<?php echo $this->createUrl('product/admin');?>">Produk</a></li>
						<li><a href="<?php echo $this->createUrl('category/admin');?>">Kategory</a></li>
						<li><a href="<?php echo $this->createUrl('orders/admin');?>">Orders</a></li>
					</ul>
					<?php if(isset(Yii::app()->user->rule) =='root'){?>
					<h2>Administration</h2>
					<ul>
						<li><a href="<?php echo $this->createUrl('manageadmin/admin');?>">Data Admin</a></li>
						 
					</ul>
					<?php } ?>
				</li>
			</ul>
		</div>
		<!--/sidebar-->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
	
	<!--footer-->
	<div id="footer">
		<p>Copyright (c) <?php echo date("Y");?> yiishop.com. All rights reserved. Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.</p>
	</div>
	<!--/footer -->
</body>
</html>