<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ingresos-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
		)
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'D.N.I.'); ?>
		<?php echo $form->textField($model,'dni',array('size'=>8,'maxlength'=>10,'value'=>'')); ?>
		<?php echo $form->error($model,'dni'); ?>
	</div>



	<div class="row buttons">
		<?php 
      echo CHtml::submitButton('Guardar');
      //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Guardar'); 
    ?>
   
	</div>

<?php $this->endWidget(); ?>
<?php 
$self = $_SERVER['PHP_SELF']; //Obtenemos la página en la que nos encontramos
header("refresh:300; url=$self"); //Refrescamos cada 300 segundos
?>
</div><!-- form -->