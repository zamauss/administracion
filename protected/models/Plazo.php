<?php

/**
 * This is the model class for table "Plazo".
 *
 * The followings are the available columns in table 'Plazo':
 * @property string $id
 * @property string $nombre
 * @property string $estatus_did
 *
 * The followings are the available model relations:
 * @property Objetivo[] $objetivos
 * @property Estatus $estatus
 */
class Plazo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Plazo the static model class
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
		return 'Plazo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('estatus_did', 'required'),
			array('nombre', 'length', 'max'=>100),
			array('estatus_did', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, estatus_did', 'safe', 'on'=>'search'),
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
			'objetivos' => array(self::HAS_MANY, 'Objetivo', 'plazo_did'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'estatus_did' => 'Estatus',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('estatus_did',$this->estatus_did,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}