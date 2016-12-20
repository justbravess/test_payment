<?php
/* @var $this ServicePackController */
/* @var $model ServicePack */

$this->breadcrumbs=array(
	'Service Packs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список пакетов услуг', 'url'=>array('index')),
	array('label'=>'Создать пакет услуг', 'url'=>array('create')),
	array('label'=>'Редактировать пакет услуг', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить пакет услуг', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы действительно хотите удалить пакет услуг?')),
	array('label'=>'Усправление пакетами услуг', 'url'=>array('admin')),
);
?>

<h1>View ServicePack #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'price',
		'valuta',
	),
)); ?>
