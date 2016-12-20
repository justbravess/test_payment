<?php

class PaymentController extends Controller
{	
        /**
	 * Lists all models.
	 */
    public function actionIndex() {
        $model = new Payment('search');
        $model->unsetAttributes();  // clear any default values
                                       
        if (isset($_GET['Payment'])){
            $model->attributes = $_GET['Payment'];  
            $model->date_start_search = $_GET['Payment']['date_start_search'];
            $model->date_end_search = $_GET['Payment']['date_end_search'];
        }
        else{
            $model->date_start_search = date("Y-m-d", mktime(0, 0, 0, date('m'),1 , date('Y')));
            $model->date_end_search = date("Y-m-d", mktime(0, 0, 0, date('m')+1, 1 , date('Y'))); 
        }
        
        $service_packs = ServicePack::model()->findAll();
        $service_pack_names = CHtml::listData($service_packs, 'id', 'name');

        $dataProvider = $model->search();
        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
            'service_pack_names' => $service_pack_names,
        ));
    }

    // Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}