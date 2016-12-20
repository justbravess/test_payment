<?php
/* @var $this ServicePackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Пакеты услуг',
);

$this->menu=array(
	array('label'=>'Create ServicePack', 'url'=>array('create')),
	array('label'=>'Manage ServicePack', 'url'=>array('admin')),
);
?>

<h1>Service Packs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_custom_view',
)); ?>
