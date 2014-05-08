<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'publicidad-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'empresa'); ?>
		<?php echo $form->textField($model,'empresa',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'empresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imagen'); ?>
		<?php echo $form->FileField($model,'imagen'); ?>
		<?php echo $form->error($model,'imagen'); ?>
	</div>
	
    <div class="row">
		<?php echo $form->labelEx($model,'Medidas'); ?>
		<?php echo $form->DropDownList($model,'medida',Publicidad::getMedidas()); ?>
		<?php echo $form->error($model,'medidas'); ?>
	</div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->