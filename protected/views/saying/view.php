<?php
/* @var $this SayingController */
/* @var $model Saying */
$this->pageTitle = "Saying - " . $model->saying_saying;

$this->breadcrumbs = array(
    'Sayings' => array('index'),
    'View',
);

$this->menu = array(
    array('label' => 'Add Saying', 'url' => array('create')),
    array('label' => 'Update Saying', 'url' => array('update', 'id' => $model->saying_id)),
    array('label' => 'Delete Saying', 'url' => array('delete', 'id' => $model->saying_id)),
);
?>
<br/>
<table class="table table-hover">
    <tbody>
        <tr>
            <th><?php echo $model->saying_saying; ?></th>
            <th>القول</th>
        </tr>
        <tr>
            <th><?php echo $model->saying_response; ?></th>
            <th>الرد</th>
        </tr>
        <tr>
            <th><?php echo $model->saying_datetime; ?></th>
            <th>الوقت</th>
        </tr> 
    </tbody>
</table>






<!-- Nav tabs -->
<div style="direction:rtl; text-align:left;">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab"><strong>الأقسام</strong></a></li>
        <li><a href="#profile" data-toggle="tab"><strong>إضافة قسم</strong></a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content mb30">
        <div class="tab-pane active" id="home">
                <?php
                $existingCategories = array();
                foreach ($model->categories as $category) {
                    $existingCategories[] = $category->category_id;
                    echo "<br/><a class='btn btn-danger btn-lg btn-block' href='?delete=" . $category->category_id . "'>" . $category->category_name . "</a>";
                }
                ?>
        </div><!-- tab-pane -->

        <div class="tab-pane" id="profile">
                <?php
                $existingCategories = implode(',', $existingCategories);

                $criteria = new CDbCriteria();
                if ($existingCategories) {
                    $criteria->condition = "category_id NOT IN($existingCategories)";
                }
                $criteria->order = "category_sort";

                $someCategories = Category::model()->findAll($criteria);
                foreach ($someCategories as $category) {
                    echo "<br/><a class='btn btn-success btn-lg btn-block' href='?category=" . $category->category_id . "'>" . $category->category_name . "</a>";
                }
                ?>
        </div><!-- tab-pane -->
    </div><!-- tab-content -->
</div>