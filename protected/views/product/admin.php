<h3>Data Products</h3>
<div>
	<?php echo CHtml::link('Add Product',array('product/create'));?>
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
	'id'=>'product-grid',
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
		'product_name',
		array('name'=>'category_id', 
		      'type'=>'html', 
			  'value'=>'$data->category->category_name','sortable'=>TRUE,
			  'filter' => CHtml::listData(Category::model()->findAll(),'id','category_name'),),
		array('name'=>'price',
			  'type'=>'html',
			  'value'=>'$data->price_product','sortable'=>TRUE,
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}&nbsp;&nbsp;{delete}'
		),
	),
)); ?>