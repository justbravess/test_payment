<?php
/* @var $this ServicePackController */
/* @var $model ServicePack */

$this->breadcrumbs=array(
	'Service Packs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ServicePack', 'url'=>array('index')),
	array('label'=>'Manage ServicePack', 'url'=>array('admin')),
);
?>

<h1>Create ServicePack</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>