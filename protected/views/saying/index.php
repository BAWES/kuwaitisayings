<?php
/* @var $this SayingController */
/* @var $model Saying */
$this->pageTitle = "Manage Sayings";
$this->breadcrumbs=array(
	'Sayings',
);

$this->menu=array(
	array('label'=>'Add Saying', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#saying-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'saying-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'saying_id',
		'saying_saying',
		'saying_response',
		//'saying_datetime',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
