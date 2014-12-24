<?php
/* @var $this SayingController */
/* @var $model Saying */
$this->pageTitle = "Add Saying";

$this->breadcrumbs=array(
	'Sayings'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List Saying', 'url'=>array('index')),
);
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>