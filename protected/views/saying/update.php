<?php
/* @var $this SayingController */
/* @var $model Saying */
$this->pageTitle = "Update Saying";
$this->breadcrumbs=array(
	'Sayings'=>array('index'),
	$model->saying_id=>array('view','id'=>$model->saying_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Saying', 'url'=>array('index')),
	array('label'=>'Create Saying', 'url'=>array('create')),
	array('label'=>'View Saying', 'url'=>array('view', 'id'=>$model->saying_id)),
);
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>