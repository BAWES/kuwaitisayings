<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.default.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/html5shiv.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="signin">
        
        
        <section>
            
            <div class="panel panel-signin">
                <div class="panel-body">
                    <div class="logo text-center">
                        <h1>Rad w Bidal</h1>
                    </div>
                    <br />
                    
                    <div class="mb30"></div>
                    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
                    <form action="signin.html" method="post">
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
                        </div><!-- input-group -->
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
                        </div><!-- input-group -->
                        
                        <div class="clearfix">
                            <div class="pull-right">
                                <?php echo CHtml::submitButton('Login'); ?>
                            </div>
                        </div>                      
                    </form>
                    <?php $this->endWidget(); ?>
                </div><!-- panel-body -->
            </div><!-- panel -->
            
        </section>


        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/pace.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/retina.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.cookies.js"></script>

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom.js"></script>

    </body>
</html>
