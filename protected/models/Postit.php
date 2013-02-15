<?php

/**
 * This is the model class for table "Postit".
 *
 * The followings are the available columns in table 'Postit':
 * @property string $id
 * @property string $tipoPostit_did
 * @property string $nombre
 * @property string $personaRemitente_aid
 * @property string $personaDestinatario_aid
 * @property string $estatus_did
 * @property string $fecha
 *
 * The followings are the available model relations:
 * @property Estatus $estatus
 * @property Persona $personaDestinatario
 * @property Persona $personaRemitente
 * @property TipoPostit $tipoPostit
 */
class Postit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Postit the static model class
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
		return 'Postit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'required'),
			array('tipoPostit_did,personaRemitente_aid, estatus_did', 'length', 'max'=>11),
			array('personaDestinatario_aid', 'length', 'max'=>10),
			array('nombre', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tipoPostit_did, nombre, personaRemitente_aid, personaDestinatario_aid, estatus_did, fecha', 'safe', 'on'=>'search'),
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
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'personaDestinatario' => array(self::BELONGS_TO, 'Persona', 'personaDestinatario_aid'),
			'personaRemitente' => array(self::BELONGS_TO, 'Persona', 'personaRemitente_aid'),
			'tipoPostit' => array(self::BELONGS_TO, 'TipoPostit', 'tipoPostit_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tipoPostit_did' => 'Tipo Postit',
			'nombre' => 'Nombre',
			'personaRemitente_aid' => 'Persona Remitente',
			'personaDestinatario_aid' => 'Persona Destinatario',
			'estatus_did' => 'Estatus',
			'fecha' => 'Fecha',			
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
		$criteria->compare('tipoPostit_did',$this->tipoPostit_did,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('personaRemitente_aid',$this->personaRemitente_aid,true);
		$criteria->compare('personaDestinatario_aid',$this->personaDestinatario_aid,true);
		$criteria->compare('estatus_did',$this->estatus_did,true);
		$criteria->compare('fecha',$this->fecha,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}