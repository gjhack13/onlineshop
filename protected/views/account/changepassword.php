<?php
/*untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('My account' => array('.'), Yii::app()->user->customerName, 'Change password');
?>

<hr>
<b><?php $this->renderPartial('_myaccount_menu');?></b>
    <h3 class="header">Silahkan ubah password anda
        <span class="header-line"></span> 
    </h3>
    <div class="form" style="margin-left: 15px;">
 
        <?php $form = $this -> beginWidget('CActiveForm', 
        array('id' => 'customer-form', 
        	'enableAjaxValidation' => false,
        	'enableClientValidation'=>TRUE, 
		)); ?>

        <p class="note">
            Fields with <span class="required">*</span> are required.
        </p>

        <?php echo $form -> errorSummary($model); ?>

        <div class="row">
            <?php echo $form -> labelEx($model, 'oldPassword'); ?>
            <?php echo $form -> hiddenField($model, 'password', array('size' => 35, 'maxlength' => 35)); ?>
            <?php echo $form -> passwordField($model, 'oldPassword', array('size' => 35, 'maxlength' => 35)); ?>
            <?php echo $form -> error($model, 'oldPassword'); ?>
        </div>

        <div class="row">
            <?php echo $form -> labelEx($model, 'newPassword'); ?>
            <?php echo $form -> passwordField($model, 'newPassword', array('size' => 35, 'maxlength' => 35)); ?>
            <?php echo $form -> error($model, 'newPassword'); ?>
        </div>
        
        <div class="row">
            <?php echo $form -> labelEx($model, 'compareNewPassword'); ?>
            <?php echo $form -> passwordField($model, 'compareNewPassword', array('size' => 35, 'maxlength' => 35)); ?>
            <?php echo $form -> error($model, 'compareNewPassword'); ?>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton("Ubah Password"); ?>
        </div>

        <?php $this -> endWidget(); ?>
    </div>