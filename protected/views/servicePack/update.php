<?php
/* @var $this ServicePackController */
/* @var $model ServicePack */

$this->breadcrumbs=array(
	'Пакеты услуг'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Редактировать',
);

$this->menu=array(
	array('label'=>'Список пакетов услуг', 'url'=>array('index')),
	array('label'=>'Создать пакет услуг', 'url'=>array('create')),
	array('label'=>'Просмотреть пакет услуг', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление пакетами услуг', 'url'=>array('admin')),
);
?>

<h1>Редактировать пакет услуг "<?php echo $model->name; ?>"</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>