<?php
/* @var $this SayingController */
/* @var $model Saying */

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

<h1>Update Saying <?php echo $model->saying_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>