<?php
/* @var $this ServicePackController */
/* @var $model ServicePack */

$this->breadcrumbs=array(
	'Service Packs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список пакетов услуг', 'url'=>array('index')),
	array('label'=>'Управление пакетами услуг', 'url'=>array('admin')),
);
?>

<h1>Создать пакет услуг</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>