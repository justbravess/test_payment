<?php
/* @var $this ServicePackController */
/* @var $model ServicePack */

$this->breadcrumbs=array(
	'Service Packs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ServicePack', 'url'=>array('index')),
	array('label'=>'Create ServicePack', 'url'=>array('create')),
	array('label'=>'Update ServicePack', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ServicePack', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ServicePack', 'url'=>array('admin')),
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
