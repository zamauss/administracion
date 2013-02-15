<?php

/**
 * This is the model class for table "ObjetivoGeneral".
 *
 * The followings are the available columns in table 'ObjetivoGeneral':
 * @property string $id
 * @property string $numero
 * @property string $fechaCumplimiento
 * @property string $plazo_did
 * @property string $responsable_aid
 * @property string $descripcion
 * @property string $persona_aid
 * @property string $metaCuantitativa
 * @property string $recursos
 * @property string $valoracion
 * @property string $estatus_did
 * @property string $planeacion_did
 * @property string $indicador
 *
 * The followings are the available model relations:
 * @property Estatus $estatus
 * @property Persona $responsable
 * @property Persona $persona
 * @property Planeacion $planeacion
 * @property Plazo $plazo
 */
class ObjetivoGeneral extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ObjetivoGeneral the static model class
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
		return 'ObjetivoGeneral';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('responsable_aid, persona_aid, valoracion, estatus_did, indicador, metaCuantitativa,recursos', 'required'),
			array('numero, metaCuantitativa, recursos, indicador', 'length', 'max'=>100),
			array('plazo_did, estatus_did, departamento_did', 'length', 'max'=>10),
			array('responsable_aid, persona_aid, planeacion_did', 'length', 'max'=>11),
			array('descripcion', 'length', 'max'=>500),
			array('fechaCumplimiento', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, numero, fechaCumplimiento, plazo_did, responsable_aid, descripcion, persona_aid, metaCuantitativa, recursos, valoracion, estatus_did, planeacion_did, departamento_did, indicador', 'safe', 'on'=>'search'),
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
			'responsable' => array(self::BELONGS_TO, 'Persona', 'responsable_aid'),
			'persona' => array(self::BELONGS_TO, 'Persona', 'persona_aid'),
			'planeacion' => array(self::BELONGS_TO, 'Planeacion', 'planeacion_did'),
			'plazo' => array(self::BELONGS_TO, 'Plazo', 'plazo_did'),
			'departamento' => array(self::BELONGS_TO, 'Departamento', 'departamento_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'numero' => 'Identificador',
			'fechaCumplimiento' => 'Fecha cumplimiento',
			'plazo_did' => 'Plazo',
			'responsable_aid' => 'Responsable',
			'descripcion' => 'Descripción',
			'persona_aid' => 'Persona',
			'metaCuantitativa' => 'Meta cuantitativa',
			'recursos' => 'Recursos',
			'valoracion' => 'Fecha de valoración',
			'estatus_did' => 'Estatus',
			'planeacion_did' => 'Planeación o proyecto',
			'indicador' => 'Indicador',
			'departamento_did' => 'Departamento',
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
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('fechaCumplimiento',$this->fechaCumplimiento,true);
		$criteria->compare('plazo_did',$this->plazo_did,true);
		$criteria->compare('responsable_aid',$this->responsable_aid,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('persona_aid',$this->persona_aid,true);
		$criteria->compare('metaCuantitativa',$this->metaCuantitativa,true);
		$criteria->compare('recursos',$this->recursos,true);
		$criteria->compare('valoracion',$this->valoracion,true);
		$criteria->compare('estatus_did',$this->estatus_did,true);
		$criteria->compare('planeacion_did',$this->planeacion_did,true);
		$criteria->compare('indicador',$this->indicador,true);
		$criteria->compare('departamento_did',$this->departamento_did,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}