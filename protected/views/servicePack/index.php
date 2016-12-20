<?php
/* @var $this ServicePackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Пакеты услуг',
);

$this->menu=array(
	array('label'=>'Создать пакет услуг', 'url'=>array('create')),
	array('label'=>'Управление пакетами услуг', 'url'=>array('admin')),
);
?>

<h1>Пакеты услуг</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_custom_view',
)); ?>
