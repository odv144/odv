<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Identificaci&oacute;n</h1>

<p>Por favor ingrese sus datos de registro para poder identificarse:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Los campos marcados con <span class="required">*</span> son requeridos por el sistema.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'Nick'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Clave'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<p class="hint">
			Si usted no posee estos datos ingrese <?php echo CHtml::link('Aqui','../usuarios/create');?> para registrarse gratuitamente.
		</p>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'Recordarme'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>
	
    <div class="row recuperar">
		<?php echo CHtml::link('Recuperar Contrase&ntilde;a','recuperar?user=omar'); ?>
	</div>
	
    <div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('app','submit')); ?>
	</div>
	
<?php $this->endWidget(); ?>
</div><!-- form -->
