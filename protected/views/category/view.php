<?php
/* @var $this CategoryController */
/* @var $model Category */
$this->pageTitle = "Category - ".$model->category_name;

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->category_name,
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Add Category', 'url'=>array('create')),
	array('label'=>'Update Category', 'url'=>array('update', 'id'=>$model->category_id)),
	array('label'=>'Delete Category', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->category_id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'category_id',
		'category_name',
		'category_sort',
		'category_datetime',
                'sayingsCount'
	),
)); ?>

<br/>
<h2>Sayings</h2>
<ul>
    <?php
    foreach($model->sayings as $saying){
        $sayingId = $saying->saying_id;
        $saying = $saying->saying_saying;
        
        echo "<li><a href='".Yii::app()->createUrl("saying/view",array('id'=>$sayingId))."'>$saying</a></li>";
    }
    ?>
</ul>