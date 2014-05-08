<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'premios-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos marcados con<span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'id_sorteo'); ?>
		<?php echo $form->textField($model,'id_sorteo'); ?>
		<?php echo $form->error($model,'id_sorteo'); ?>
	</div>

	<?php for($x=0;$x<10;$x++){ ?>
    <div class="row">
		<?php echo $form->labelEx($model,'json'); ?>
		<?php echo $form->textField($model,'json[]'); ?>
		<?php echo $form->error($model,'json'); ?>
	</div>
    
	<?php }?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->