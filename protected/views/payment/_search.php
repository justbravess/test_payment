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
		Дата начала:
		<?php  echo $form->dateField($model,'date_start_search'); ?>
	</div>

	<div class="row">
		Дата окончания:
		<?php echo $form->dateField($model,'date_end_search'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->