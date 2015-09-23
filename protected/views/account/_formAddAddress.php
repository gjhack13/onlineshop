<?php $form = $this -> beginWidget('CActiveForm', 
		array('id' => 'add-addressBook-form', 
		'enableAjaxValidation' => false, 
		'enableClientValidation' => TRUE, 
		)
	); 
?>

<p class="note">
	Fields with <span class="required">*</span> are required.
</p>
<!--untuk menampilkan summary error-->
<?php echo $form -> errorSummary($model); ?>

<div class="row">
	<?php echo $form -> labelEx($model, 'name'); ?>
	<?php echo $form -> textField($model, 'name', array('size' => 56, 'maxlength' => 56)); ?>
	<?php echo $form -> error($model, 'name'); ?>
</div>

<div class="row">
	<?php echo $form -> labelEx($model, 'phone_number'); ?>
	<?php echo $form -> textField($model, 'phone_number', array('size' => 15, 'maxlength' => 15)); ?>
	<?php echo $form -> error($model, 'phone_number'); ?>
</div>

<div class="row">
	<?php echo $form -> labelEx($model, 'address'); ?>
	<?php echo $form -> textArea($model, 'address', array('cols' => 43, 'rows' => 3)); ?>
	<?php echo $form -> error($model, 'address'); ?>
</div>

<div class="row">
	<?php echo $form -> labelEx($model, 'province'); ?>
	<?php echo $form -> textField($model, 'province', array('size' => 35, 'maxlength' => 35)); ?>
	<?php echo $form -> error($model, 'province'); ?>
</div>

<div class="row">
	<?php echo $form -> labelEx($model, 'city'); ?>
	<?php echo $form -> textField($model, 'city', array('size' => 35, 'maxlength' => 35)); ?>
	<?php echo $form -> error($model, 'city'); ?>
</div>

<div class="row buttons">
	<?php echo CHtml::submitButton($model -> isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this -> endWidget(); ?>