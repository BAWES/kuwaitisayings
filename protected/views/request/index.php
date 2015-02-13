<?php
/* @var $this RequestController */
/* @var $model Request */
$this->pageTitle = "Manage Requests";

$this->breadcrumbs=array(
	'Requests',
);

$this->menu=array(
	//array('label'=>'Create Request', 'url'=>array('create')),
);
?>

<table id="basicTable" class="table table-striped table-bordered responsive">
    <thead class="">
        <tr>
            
            <th>الرد</th>
            <th>القول</th>
            <th>الوقت</th>
            <th style="width:100px">Approve</th>
            <th style="width:100px">Reject</th>
        </tr>
    </thead>

    <tbody>
        
            <?php
            foreach($requests as $request){
                $id = $request->request_id;
                $sayingText = $request->request_saying;
                $responseText = $request->request_response;
                $categoryText = $request->request_datetime;
                
                $approveLink = Yii::app()->createUrl('saying/create',array('presetSaying'=>$sayingText, 'presetResponse'=>$responseText));
                $rejectLink = Yii::app()->createUrl('request/delete',array('id'=>$id));
                
                echo "
                <tr>
                    <td>$responseText</td>
                    <td>$sayingText</td>
                    <td>$categoryText</td>
                    <td><a class='label label-primary fa fa-pencil' href='$approveLink'> Approve</a></td>
                    <td><a class='label label-danger fa fa-pencil' href='$rejectLink'> Reject</a></td>
                </tr>
                ";
            }
            ?>
            
        
    </tbody>
</table>
