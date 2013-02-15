<?php

/**
 * This is the model class for table "EstrategiaObjetivogeneral".
 *
 * The followings are the available columns in table 'EstrategiaObjetivogeneral':
 * @property string $id
 * @property string $estrategia_did
 * @property string $objetivoGeneral_did
 *
 * The followings are the available model relations:
 * @property ObjetivoGeneral $objetivoGeneral
 * @property Estrategia $estrategia
 */
class EstrategiaObjetivogeneral extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return EstrategiaObjetivogeneral the static model class
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
		return 'EstrategiaObjetivogeneral';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('estrategia_did, objetivoGeneral_did', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, estrategia_did, objetivoGeneral_did', 'safe', 'on'=>'search'),
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
			'objetivoGeneral' => array(self::BELONGS_TO, 'ObjetivoGeneral', 'objetivoGeneral_did'),
			'estrategia' => array(self::BELONGS_TO, 'Estrategia', 'estrategia_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'estrategia_did' => 'Estrategia',
			'objetivoGeneral_did' => 'Objetivo General',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('estrategia_did',$this->estrategia_did,true);
		$criteria->compare('objetivoGeneral_did',$this->objetivoGeneral_did,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}