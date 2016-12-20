<?php

/**
 * This is the model class for table "payments".
 *
 * The followings are the available columns in table 'payments':
 * @property integer $id
 * @property integer $service_pack_id
 * @property string $date
 * @property string $email
 */
class Payment extends CActiveRecord    
{
    public $service_pack_search;
    public $service_pack_price_search;
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('service_pack_id', 'numerical', 'integerOnly'=>true),
			array('email', 'length', 'max'=>100),
			array('date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, service_pack_id, date, email, service_pack_search, service_pack_price_search', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                    'service_pack'=>array(self::BELONGS_TO, 'ServicePack', 'service_pack_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'service_pack_id' => 'Service Pack',
			'date' => 'Date',
			'email' => 'Email',
		);
	}               

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
            
		$criteria=new CDbCriteria;
                
                $criteria->with = array('service_pack');
                
		$criteria->compare('id',$this->id);
		$criteria->compare('service_pack_id',$this->service_pack_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('email',$this->email,true);
                $criteria->compare('service_pack.name', $this->service_pack_search, true);
                $criteria->compare('service_pack.price', $this->service_pack_price_search, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>array(
                            'attributes'=>array(
                                'service_pack_search'=>array(
                                    'asc'=>'service_pack.name',
                                    'desc'=>'service_pack.name DESC',
                                ),
                                'service_pack_price_search'=>array(
                                    'asc'=>'service_pack.price',
                                    'desc'=>'service_pack.price DESC',
                                ),
                                '*',
                            ),
                        ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Payment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
