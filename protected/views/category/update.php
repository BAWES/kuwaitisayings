<?php
/* @var $this CategoryController */
/* @var $model Category */
$this->pageTitle = "Update Category";

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->category_id=>array('view','id'=>$model->category_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
	array('label'=>'View Category', 'url'=>array('view', 'id'=>$model->category_id)),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>