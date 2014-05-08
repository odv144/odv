<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sorteo-form',
	'enableAjaxValidation'=>false,
)); ?>

	 <p>Formulario para Ingresar nuevos Concursos</p>
	<?php echo $form->errorSummary($model);?>

	   
    <div class="row">
		<?php echo $form->labelEx($model,'premios'); ?>
		<?php //echo $form->textField($model,'premios',array('size'=>2,'maxlength'=>2));
       if (json_decode($model->json)->premios!=null)
       {
        echo $form->textField($model,'premios',array('value'=>json_decode($model->json)->premios));
       }else
        {
          echo $form->textField($model,'premios',array('size'=>2,'maxlength'=>2));
        }   
     ?>
		 <?php echo $form->error($model,'premios'); ?>
	</div>
  
  <div class="row">
    <?php echo $form->labelEx($model,'Inicio Sorteo'); ?>
    <?php
      if (json_decode($model->json)->premios!='')
       {
        echo $form->textField($model,'iniSorteo',array('value'=>json_decode($model->json)->iniSorteo));
       }else
        {
       	$this->widget('zii.widgets.jui.CJuiDatePicker',
				array(
					'model'=>$model,
					'attribute'=>'iniSorteo',
					'options'=>array(
							'yearRange'=>'2013:2015', //permite establecer el rango inicial y final del calendario
							'dateFormat'=>'dd-mm-yy',
							'changeMonth'=>'true', //permite modificar el mes
							'changeYear'=>'true', //permite modificar el año
					),
			
			   ));
       }
		?>
		<?php echo $form->error($model,'finSorteo'); ?>
	 </div>
  
  <div class="row">
		<?php echo $form->labelEx($model,'Fin Sorteo'); ?>
			<?php 
      
			if (json_decode($model->json)->premios!='')
       {
        echo $form->textField($model,'finSorteo',array('value'=>json_decode($model->json)->finSorteo));
       }
       else{
       	$this->widget('zii.widgets.jui.CJuiDatePicker',
				array(
					'model'=>$model,
					'attribute'=>'finSorteo',
					'options'=>array(
							'yearRange'=>'2013:2015', //permite establecer el rango inicial y final del calendario
							'dateFormat'=>'dd-mm-yy',
              
							'changeMonth'=>'true', //permite modificar el mes
							'changeYear'=>'true', //permite modificar el año
				),
				));
 		   }
     ?>
    <?php echo $form->error($model,'finSorteo'); ?>
    </div>
   	
    <div class="row">
		  <?php echo $form->labelEx($model,'sorteado'); ?>
		  <?php echo $form->DropDownList($model,'sorteado',Sorteo::getSorteo()); ?>
		  <?php echo $form->error($model,'sorteado'); ?>
	 </div>
    
  
 

	<div class="row buttons">
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save');
          echo CHtml::submitButton('Guardar');
    ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->