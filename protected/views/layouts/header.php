<div class="container">
<div class="row-fluid">

  <div class="span6">
		<div class="logo">
			<a href="<?php echo $baseUrl;?>">
				<img src="<?php echo $baseUrl;?>/img/logo-dark.png" width="250px" />
			</a>
		</div>
		<div class="span6">
  	<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
						array('label'=>'Pilih tema yang anda suka <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>"6 styles"), 
                        'items'=>array(
                            array('label'=>'<span class="style" style="background-color:#0088CC;"></span> Style 1', 'url'=>"javascript:chooseStyle('none', 60)"),
							array('label'=>'<span class="style" style="background-color:#e42e5d;"></span> Style 2', 'url'=>"javascript:chooseStyle('style2', 60)"),
							array('label'=>'<span class="style" style="background-color:#c80681;"></span> Style 3', 'url'=>"javascript:chooseStyle('style3', 60)"),
							array('label'=>'<span class="style" style="background-color:#51a351;"></span> Style 4', 'url'=>"javascript:chooseStyle('style4', 60)"),
							array('label'=>'<span class="style" style="background-color:#b88006;"></span> Style 5', 'url'=>"javascript:chooseStyle('style5', 60)"),
							array('label'=>'<span class="style" style="background-color:#f9630f;"></span> Style 6', 'url'=>"javascript:chooseStyle('style6', 60)"),
                        )),),
                )); ?>
  </div>
  </div><!--/.span6 -->

  			<div class="span6">
  				<div class="social-icons pull-right clearfix">
  					<p class="text-success">
    					<?php
							if(isset(Yii::app()->user->customerName)){
								echo 'Hai '.Yii::app()->user->customerName.'... internet shopping is easy with onshop!';
							}
						?>
					</p>
				</div>
  			</div>
  
  <div class="span6">
    <div class="social-icons pull-right clearfix">
						<img src="<?php echo $baseUrl;?>/img/icons/user.png" width="30px" />
						<a href="<?php echo $this->createUrl('/account');?>">My account</a> | 
						<?php if(isset(Yii::app()->user->customerLogin)){
							echo CHtml::link('Logout',array('account/logout')).' | ';
						} ?>
						<a href="<?php echo $this->createUrl('/cart');?>">
							<img src="<?php echo $baseUrl;?>/img/logo2.png" width="40px" />
						</a>
        <div class="header-text" style=""><img src="<?php echo $baseUrl;?>/img/icon-contact.png" width="20px" />CP: 08966 3475 666 | IG:@gjhack13</div>
    </div>
   
  </div><!--/.span6 -->
</div><!--/.row-fluid header -->
</div>