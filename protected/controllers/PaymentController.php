<?php

class PaymentController extends Controller {

    public function filters()
    {
        return array( 'accessControl' ); // perform access control for CRUD operations
    }
    
    public function accessRules()
    {
        return array(
            array('allow', // allow admin to access all actions
                'users'=>array('admin'),
            ),
            array('deny'),
        );
    }
    
    /**
     * Lists all models.
     */
    public function actionIndex() {
        $model = new Payment('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['Payment'])) {
            $model->attributes = $_GET['Payment'];
            $model->date_start_search = $_GET['Payment']['date_start_search'];
            $model->date_end_search = $_GET['Payment']['date_end_search'];
        } else {
            $model->date_start_search = date("Y-m-d", mktime(0, 0, 0, date('m'), 1, date('Y')));
            $model->date_end_search = date("Y-m-d", mktime(0, 0, 0, date('m') + 1, 1, date('Y')));
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

    public function registerPay($email, $service_pack_id) {
        $model = new Payment();
        $model->email = $email;
        $model->service_pack_id = $service_pack_id;
        $model->date = date('Y-m-d');
        return $model->save();        
    }

    public function actionPayForPack() {
        require_once(dirname(__FILE__) . '/../config/stripe.php');

        $token = $_POST['stripeToken'];
        $email = $_POST['stripeEmail'];
        $service_pack_id = intval($_POST['service_pack_id']);
        $service_pack = ServicePack::model()->find("id = $service_pack_id");

        $customer = \Stripe\Customer::create(array(
                    'email' => $email,
                    'source' => $token
        ));

        try {
            $charge = \Stripe\Charge::create(array(
                        "amount" => $service_pack->price * 100,
                        "currency" => $service_pack->valuta,
                        "customer" => $customer->id,
                        "description" => "Payment for " . $service_pack->name,
            ));
            if ($charge) {
                $this->registerPay($email, $service_pack_id);
                Yii::app()->request->redirect('/index.php?r=servicepack/view&id=1&status=successpay');
            }
        } catch (\Stripe\Error\Card $e) {
            $message = $e->getMessage();
            Yii::app()->request->redirect('/index.php?r=servicepack/view&id=1&status=errorpay&message=' . $message);
        }
    }

}
