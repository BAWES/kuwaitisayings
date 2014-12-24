<?php
/* @var $this SayingController */
/* @var $model Saying */

$this->breadcrumbs=array(
	'Sayings'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List Saying', 'url'=>array('index')),
);
?>

<h1>Add Saying</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>