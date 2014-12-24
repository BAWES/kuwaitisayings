<?php
/* @var $this RequestController */
/* @var $model Request */

$this->breadcrumbs=array(
	'Requests',
);

$this->menu=array(
	array('label'=>'Create Request', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#request-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Requests</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'request-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'request_id',
		'request_saying',
		'request_response',
		'request_datetime',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
