<?php
/* @var $this RequestController */
/* @var $model Request */

$this->breadcrumbs=array(
	'Requests'=>array('index'),
	$model->request_id=>array('view','id'=>$model->request_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Request', 'url'=>array('index')),
	array('label'=>'Create Request', 'url'=>array('create')),
	array('label'=>'View Request', 'url'=>array('view', 'id'=>$model->request_id)),
);
?>

<h1>Update Request <?php echo $model->request_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>