<?php
/* @var $this SayingController */
/* @var $sayings Saying */
$this->pageTitle = "Manage Sayings";
$this->breadcrumbs = array(
    'Sayings',
);

?>

<br/>
<a href="<?php echo Yii::app()->createUrl('saying/create'); ?>" class="btn btn-success btn-lg btn-block">إضافة قول و رد</a>

<br/><br/>
<table id="basicTable" class="table table-striped table-bordered responsive">
    <thead class="">
        <tr>
            
            <th>الرد</th>
            <th>القول</th>
            <th>قسم</th>
            <th style="width:100px">Action</th>
        </tr>
    </thead>

    <tbody>
        
            <?php
            foreach($sayings as $saying){
                $id = $saying->saying_id;
                $sayingText = $saying->saying_saying;
                $responseText = $saying->saying_response;
                
                $categories = $saying->categories;
                $categoryText = "";
                foreach($categories as $category){
                    $categoryText = "<span class='label label-default'>".$category->category_name."</span> $categoryText";
                }
                $sayingLink = Yii::app()->createUrl('saying/view',array('id'=>$id));
                
                echo "
                <tr>
                    <td>$responseText</td>
                    <td>$sayingText</td>
                    <td>$categoryText</td>
                    <td><a class='label label-primary fa fa-pencil' href='$sayingLink'> View</a></td>
                </tr>
                ";
            }
            ?>
            
        
    </tbody>
</table>

