<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comentarios-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos marcados con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php
	/*
	<div class="row">
		<?php //echo $form->labelEx($model,'id_user'); ?>
		<?php //echo $form->dropDownlist('id_user',Comentarios::get); ?>
		<?php //echo $form->error($model,'id_user'); ?>
	</div>
	*/ 
    ?>
	<div class="row">
		<?php echo $form->labelEx($model,'Comentario'); ?>
		<?php echo $form->textArea($model,'comentario',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Comentario'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? (Yii::t('app','Create')) : (Yii::t('app','Save'))); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->