<div class="form">
	<?php $form = $this -> beginWidget('CActiveForm', 
		array('id' => 'login-form', 
		'enableClientValidation' => true, 
		'clientOptions' => array(
			'validateOnSubmit' => true, 
		), 
	  )
	); 
	?>
	<div class="row">
		<?php echo $form -> labelEx($model, 'email'); ?>
		<?php echo $form -> textField($model, 'email', array('size'=>'30')); ?>
		<?php echo $form -> error($model, 'email'); ?>
	</div>
	<div class="row">
		<?php echo $form -> labelEx($model, 'password'); ?>
		<?php echo $form -> passwordField($model, 'password', array('size'=>'30')); ?>
		<?php echo $form -> error($model, 'password'); ?>
	</div>
	<div class="row rememberMe">
		<?php echo $form -> checkBox($model, 'rememberMe',array('style'=>'float:left;margin-right:5px;margin-top:-2px;')); ?>
		<?php echo $form -> label($model, 'rememberMe'); ?>
		<?php echo $form -> error($model, 'rememberMe'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>
	<?php $this -> endWidget(); ?>
</div>