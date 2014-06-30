<?php

/**
 * This is the model class for table "certificate_info".
 *
 * The followings are the available columns in table 'certificate_info':
 * @property integer $cert_info_id
 * @property integer $cert_id
 * @property integer $visited_number
 * @property integer $created_date
 */
class CertificateInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CertificateInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'certificate_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cert_id, visited_number, created_date', 'required'),
			array('cert_id, visited_number, created_date', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cert_info_id, cert_id, visited_number, created_date', 'safe', 'on'=>'search'),
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
			'cert_id' => array(self::BELONGS_TO, 'Certificate', 'cert_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cert_info_id' => 'Cert Info',
			'cert_id' => 'Cert',
			'visited_number' => 'Visited Number',
			'created_date' => 'Created Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('cert_info_id',$this->cert_info_id);
		$criteria->compare('cert_id',$this->cert_id);
		$criteria->compare('visited_number',$this->visited_number);
		$criteria->compare('created_date',$this->created_date);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}