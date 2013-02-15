<?php

/**
 * This is the model class for table "Nota".
 *
 * The followings are the available columns in table 'Nota':
 * @property string $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $fecha
 * @property string $objetivo_did
 * @property string $persona_aid
 *
 * The followings are the available model relations:
 * @property Persona $persona
 * @property Objetivo $objetivo
 */
class Nota extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Nota the static model class
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
		return 'Nota';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion, nombre, fecha', 'required'),
			array('nombre', 'length', 'max'=>100),
			array('objetivo_did, persona_aid', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, descripcion, fecha, objetivo_did, persona_aid', 'safe', 'on'=>'search'),
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
			'persona' => array(self::BELONGS_TO, 'Persona', 'persona_aid'),
			'objetivo' => array(self::BELONGS_TO, 'Objetivo', 'objetivo_did'),
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
			'descripcion' => 'Descripción',
			'fecha' => 'Fecha',
			'objetivo_did' => 'Objetivo',
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
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('objetivo_did',$this->objetivo_did,true);
		$criteria->compare('persona_aid',$this->persona_aid,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}