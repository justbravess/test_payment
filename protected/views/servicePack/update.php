<?php
/* @var $this ServicePackController */
/* @var $model ServicePack */

$this->breadcrumbs=array(
	'Service Packs'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ServicePack', 'url'=>array('index')),
	array('label'=>'Create ServicePack', 'url'=>array('create')),
	array('label'=>'View ServicePack', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ServicePack', 'url'=>array('admin')),
);
?>

<h1>Update ServicePack <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>