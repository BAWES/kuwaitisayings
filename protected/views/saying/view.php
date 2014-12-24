<?php
/* @var $this SayingController */
/* @var $model Saying */
$this->pageTitle = "Saying - ".$model->saying_saying; 

$this->breadcrumbs=array(
	'Sayings'=>array('index'),
	'View',
);

$this->menu=array(
	array('label'=>'Add Saying', 'url'=>array('create')),
        array('label'=>'Update Saying', 'url'=>array('update', 'id'=>$model->saying_id)),
	array('label'=>'Delete Saying', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->saying_id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'saying_id',
		'saying_saying',
		'saying_response',
		'saying_datetime',
	),
)); ?>

<br/>
<h2>Categories</h2>
<ul>
<?php
$existingCategories = array();
foreach($model->categories as $category){
    $existingCategories[] = $category->category_id;
    echo "<li>".$category->category_name." <a href='?delete=".$category->category_id."' style='color:red;'>[delete]</a></li>";
}
?>
</ul>

<?php
$existingCategories = implode(',', $existingCategories);

$criteria = new CDbCriteria();
if($existingCategories) $criteria->condition = "category_id NOT IN($existingCategories)";
$criteria->order = "category_sort";
$categories = Category::model()->findAll($criteria);
?>
<form method="get">
    <select name="category" class="arabic" style="font-size:1.5em;">
        <?php
        foreach($categories as $category){
            $id = $category->category_id;
            $name = $category->category_name;
            echo "<option value='$id'>$name</option>";
        }
        ?>
    </select>
    <input type="submit" value="Add Category"/>
</form>