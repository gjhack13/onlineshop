<h3>Manage Admins</h3>
<div>
	<?php echo CHtml::link('Add admin',array('manageadmin/create'));?>
</div>
<style type="text/css">
	.last{
		display: inline !important;
	}
	.first{
		display: inline !important;
	}
</style>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'summaryText'=>'',
	'pager'=>array(
        'header'=> '',
        'firstPageLabel'=>'| <',
        'lastPageLabel'=>'> |',
        'nextPageLabel'=>'>',
        'prevPageLabel'=>'<',
    ),
	'columns'=>array(
		'id',
		'email',
		'username',
		'password',
		'last_login_time',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}&nbsp;&nbsp;{delete}'
		),
	),
)); ?>
