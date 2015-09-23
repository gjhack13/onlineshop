<h3>View Category #<?php echo $model->id; ?></h3>
<!--gunakan zii widgets CDetailView untuk menampilkan detail category-->
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_name',
	),
)); ?>
