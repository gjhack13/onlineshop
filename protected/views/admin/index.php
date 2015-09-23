<title>Login Admin Onshop</title>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/assets/themes/css/style.default.css" type="text/css" />
<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl;?>/img/icon.png">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/themes/js/jquery.js"></script>

<body class="loginbody">

    <div class="loginwrapper">
        <div class="loginwrap zindex100 animate2 bounceInDown">
        <h1 class="logintitle"><center><img src="<?php echo Yii::app()->request->baseUrl;?>/img/logo-dark.png"></center><span class="iconfa-lock"></span><span class="subtitle">Silahkan login untuk memulai.</span><br></h1>
            <div class="loginwrapperinner">

	<?php $form = $this -> beginWidget('CActiveForm', 
		array('id' => 'login-form', 
		'enableClientValidation' => true, 
		'clientOptions' => array(
			'validateOnSubmit' => true, 
		), 
	  )
	); 
	?>
	
	<p class="animate4 bounceIn">
		<?php echo $form -> labelEx($model, 'username'); ?>
		<?php echo $form -> textField($model, 'username'); ?>
		<?php echo $form -> error($model, 'username'); ?>
	</p>
	
	<p class="animate5 bounceIn">
		<?php echo $form -> labelEx($model, 'password'); ?>
		<?php echo $form -> passwordField($model, 'password'); ?>
		<?php echo $form -> error($model, 'password'); ?>
	</p>

    <p class="animate6 bounceIn">
    <?php if(CCaptcha::checkRequirements()): ?>
        <?php echo $form->labelEx($model,'verifyCode'); ?>
        <?php $this->widget('CCaptcha'); ?>
        <?php echo $form->textField($model,'verifyCode'); ?>
        <?php echo $form->error($model,'verifyCode'); ?>
    <?php endif; ?>
    </p>

	<p class="animate7 bounceIn">
	<button class="btn btn-default btn-block">
		<?php echo CHtml::submitButton('MASUK'); ?>
		</button>
	</p><br>

		<h6><span style="color:#00ffff">*keamanan system ini telah diprotect oleh g_jHACK13</span></h6></center>
	
	</div></div></div>

	<?php $this -> endWidget(); ?>
<div class="loginshadow animate3 fadeInUp"></div>
    </div><!--loginwrapper-->
    
    <script type="text/javascript">
    jQuery.noConflict();
    
    jQuery(document).ready(function(){
        
        var anievent = (jQuery.browser.webkit)? 'webkitAnimationEnd' : 'animationend';
        jQuery('.loginwrap').bind(anievent,function(){
            jQuery(this).removeClass('animate2 bounceInDown');
        });
        
        jQuery('#username,#password').focus(function(){
            if(jQuery(this).hasClass('error')) jQuery(this).removeClass('error');
        });
        
        jQuery('#loginform button').click(function(){
            if(!jQuery.browser.msie) {
                if(jQuery('#username').val() == '' || jQuery('#password').val() == '') {
                    if(jQuery('#username').val() == '') jQuery('#username').addClass('error'); else jQuery('#username').removeClass('error');
                    if(jQuery('#password').val() == '') jQuery('#password').addClass('error'); else jQuery('#password').removeClass('error');
                    jQuery('.loginwrap').addClass('animate0 wobble').bind(anievent,function(){
                        jQuery(this).removeClass('animate0 wobble');
                    });
                } else {
                    jQuery('.loginwrapper').addClass('animate0 fadeOutUp').bind(anievent,function(){
                        jQuery('#loginform').submit();
                    });
                }
                return false;
            }
        });
    });
    </script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65899080-1', 'auto');
  ga('send', 'pageview');

</script>
</body>

