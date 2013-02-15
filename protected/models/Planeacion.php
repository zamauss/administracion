<?php

/**
 * This is the model class for table "Planeacion".
 *
 * The followings are the available columns in table 'Planeacion':
 * @property string $id
 * @property string $nombre
 * @property string $anio
 * @property string $descripcion
 * @property string $estatus_did
 * @property string $persona_aid
 *
 * The followings are the available model relations:
 * @property Objetivo $objetivo
 * @property Estatus $estatus
 * @property Persona $persona
 */
class Planeacion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Planeacion the static model class
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
		return 'Planeacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('estatus_did, persona_aid', 'required'),
			array('nombre', 'length', 'max'=>100),
			array('anio', 'length', 'max'=>5),
			array('descripcion', 'length', 'max'=>500),
			array('estatus_did, persona_aid', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, anio, descripcion, estatus_did, persona_aid', 'safe', 'on'=>'search'),
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
			'objetivo' => array(self::HAS_ONE, 'Objetivo', 'id'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'persona' => array(self::BELONGS_TO, 'Persona', 'persona_aid'),
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
			'anio' => 'Año',
			'descripcion' => 'Descripción',
			'estatus_did' => 'Estatus',
			'persona_aid' => 'Persona',
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
		$criteria->compare('anio',$this->anio,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('estatus_did',$this->estatus_did,true);
		$criteria->compare('persona_aid',$this->persona_aid,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}