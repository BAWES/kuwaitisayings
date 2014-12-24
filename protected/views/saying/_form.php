<?php
/* @var $this SayingController */
/* @var $model Saying */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'saying-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'saying_saying'); ?>
		<?php echo $form->textField($model,'saying_saying',array('size'=>60)); ?>
		<?php echo $form->error($model,'saying_saying'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'saying_response'); ?>
		<?php echo $form->textField($model,'saying_response',array('size'=>60)); ?>
		<?php echo $form->error($model,'saying_response'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->