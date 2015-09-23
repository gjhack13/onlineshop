<h3>Data Categories</h3>

<div>
	<!--membuat link untuk add category-->
	<?php echo CHtml::link('Add Category',array('category/create'));?>
</div>

<style type="text/css">
    /*untuk menampilkan link last pada paging*/
	.last{
		display: inline !important;
	}
	/*untuk menampilkan link first pada paging*/
	.first{
		display: inline !important;
	}
</style>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	/*untuk search*/
	'dataProvider'=>$model->search(),
	/*membuat filter*/
	'filter'=>$model,
	/*menghilangkan summary text*/
	'summaryText'=>'',
	/*untuk paging*/
	'pager'=>array(
		/*hilangkan header paging*/
        'header'=> '',
        /*untuk label first page*/
        'firstPageLabel'=>'| <',
        /*untuk label last page*/
        'lastPageLabel'=>'> |',
        /*untuk label next page*/
        'nextPageLabel'=>'>',
        /*untuk label prev page*/
        'prevPageLabel'=>'<',
    ),
	'columns'=>array(
		/*menampilkan id kategori*/
		'id',
		/*menampilkan nama kategori*/
		'category_name',
		array(
			'class'=>'CButtonColumn',
			/*template button (update dan delete)*/
			'template'=>'{update}&nbsp;&nbsp;{delete}'
		),
	),
)); ?>
