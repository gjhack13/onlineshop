<?php
$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<div class="shout-box">
    <div class="shout-text">
		<h1>Error <?php echo $code; ?></h1>


		<p><?php echo CHtml::encode($message); ?></p>
	</div>
</div>