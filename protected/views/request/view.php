<?php
/* @var $this RequestController */
/* @var $model Request */
$this->pageTitle = "View Request";

$this->breadcrumbs=array(
	'Requests'=>array('index'),
	$model->request_id,
);

$this->menu=array(
	array('label'=>'List Request', 'url'=>array('index')),
	array('label'=>'Create Request', 'url'=>array('create')),
	array('label'=>'Update Request', 'url'=>array('update', 'id'=>$model->request_id)),
	array('label'=>'Delete Request', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->request_id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'request_id',
		'request_saying',
		'request_response',
		'request_datetime',
	),
)); ?>
