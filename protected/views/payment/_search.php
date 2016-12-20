<?php
/* @var $this PaymentController */
/* @var $model Payment */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); 


?>
	<div class="row">
		<?php  echo $form->label($model,'email'); ?>
		<?php  echo $form->textField($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'service_pack_id'); ?>
		<?php echo $form->textField($model,'service_pack_search'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->