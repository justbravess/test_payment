<?php
/* @var $this ServicePackController */
/* @var $data ServicePack */
?>

<div class="view">
    <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id' => $data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
    <?php echo CHtml::encode($data->price); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('valuta')); ?>:</b>
    <?php echo CHtml::encode($data->valuta); ?>
    <br />

    <?php
    echo CHtml::link('Оплатить', array('prepay', 'id' => $data->id));
    ?>        
</div>