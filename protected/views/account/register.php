<div class="span12">
                <h3 class="header">Silahkan daftar
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
            <?php echo $form -> labelEx($model, 'Nama Lengkap'); ?>
            <?php echo $form -> textField($model, 'customer_name', array('size' => 57, 'maxlength' => 57)); ?>
            <?php echo $form -> error($model, 'customer_name'); ?>
        </div>

        <div class="row">
            <?php echo $form -> labelEx($model, 'email'); ?>
            <?php echo $form -> textField($model, 'email', array('size' => 45, 'maxlength' => 45)); ?>
            <?php echo $form -> error($model, 'email'); ?>
        </div>

        <div class="row">
            <?php echo $form -> labelEx($model, 'password'); ?>
            <?php echo $form -> passwordField($model, 'password', array('size' => 35, 'maxlength' => 35)); ?>
            <?php echo $form -> error($model, 'password'); ?>
        </div>

        <div class="row">
            <?php echo $form -> labelEx($model, 'comparePassword'); ?>
            <?php echo $form -> passwordField($model, 'comparePassword', array('size' => 35, 'maxlength' => 35)); ?>
            <?php echo $form -> error($model, 'comparePassword'); ?>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton("Register"); ?>
        </div>

        <?php $this -> endWidget(); ?>
    </div>
</div>