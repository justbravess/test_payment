<?php
/* @var $this ServicePackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'История платежей',
);

$this->menu=array(
	array('label'=>'Create ServicePack', 'url'=>array('create')),
	array('label'=>'Manage ServicePack', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
    console.log(11);
	$('#payment-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<h1>История платежей</h1>
<div class="search-form" >
<?php 
    $this->renderPartial('_search',array(
            'model'=>$model,
    )); 
?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'payment-grid',
    'dataProvider' => $dataProvider,
    'filter' => $model,
    'columns' => array(
        array('name' => 'email', 'header' => 'E-mail', 'value' => '$data->email'),
        array('name' => 'date', 'header' => 'Дата', 'value' => 'Yii::app()->dateFormatter->format("dd.MM.yyyy", $data->date)'),
        array('name' => 'service_pack_search', 'filter'=>  $service_pack_names, 'header' => 'Пакет услуг', 'value' => '$data->service_pack->name'),
        array('name' => 'service_pack_price_search', 'header' => 'Цена', 'value' => '$data->service_pack->price'),        
    )
        )
);
?>
