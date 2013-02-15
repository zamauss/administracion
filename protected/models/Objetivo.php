<?php

/**
 * This is the model class for table "Objetivo".
 *
 * The followings are the available columns in table 'Objetivo':
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
 * @property string $objetivoGeneral_did
 * @property string $indicador
 * @property string $fechaCreacion
 *
 * The followings are the available model relations:
 * @property Nota[] $notas
 * @property Estatus $estatus
 * @property Persona $responsable
 * @property Persona $persona
 * @property Plazo $plazo
 */
class Objetivo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Objetivo the static model class
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
		return 'Objetivo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('responsable_aid, persona_aid, valoracion, estatus_did, indicador, numero, descripcion, metaCuantitativa, recursos', 'required'),
			array('numero', 'length', 'max'=>5),
			array('plazo_did, estatus_did', 'length', 'max'=>10),
			array('responsable_aid, persona_aid, objetivoGeneral_did, departamentoCreador_did, departamentoResponsable_did', 'length', 'max'=>11),
			array('descripcion', 'length', 'max'=>500),
			array('metaCuantitativa, recursos, indicador', 'length', 'max'=>100),
			array('fechaCumplimiento, fechaCreacion, fechaCumplida', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, numero, fechaCumplimiento, plazo_did, responsable_aid, descripcion, persona_aid, metaCuantitativa, recursos, valoracion, estatus_did, objetivoGeneral_did, indicador, fechaCreacion, fechaCumplida, departamentoCreador_did, departamentoResponsable_did', 'safe', 'on'=>'search'),
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
			'notas' => array(self::HAS_MANY, 'Nota', 'objetivo_did'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'responsable' => array(self::BELONGS_TO, 'Persona', 'responsable_aid'),
			'persona' => array(self::BELONGS_TO, 'Persona', 'persona_aid'),
			'plazo' => array(self::BELONGS_TO, 'Plazo', 'plazo_did'),
			'departamentoCreador' => array(self::BELONGS_TO, 'Departamento', 'departamentoCreador_did'),
			'departamentoResponsable' => array(self::BELONGS_TO, 'Departamento', 'departamentoResponsable_did'),
			'objetivoGeneral' => array(self::BELONGS_TO, 'ObjetivoGeneral', 'objetivoGeneral_did'),
			
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
			'fechaCumplimiento' => 'Fecha Cumplimiento',
			'plazo_did' => 'Plazo',
			'responsable_aid' => 'Responsable',
			'descripcion' => 'Descripción',
			'persona_aid' => 'Capturado por',
			'metaCuantitativa' => 'Meta Cuantitativa',
			'recursos' => 'Recursos',
			'valoracion' => 'Fecha de Valoración',
			'estatus_did' => 'Estatus',
			'objetivoGeneral_did' => 'Objetivo General',
			'indicador' => 'Indicador',
			'fechaCreacion' => 'Fecha Creación',
			'departamentoCreador_did' => 'Departamento Creador',
			'departamentoCreador_did' => 'Departamento Responsable',
			'fechaCumplida' => 'Fecha Cumplida',
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
		$criteria->compare('objetivoGeneral_did',$this->objetivoGeneral_did,true);
		$criteria->compare('indicador',$this->indicador,true);
		$criteria->compare('fechaCreacion',$this->fechaCreacion,true);
		$criteria->compare('departamentoCreador_did',$this->departamentoCreador_did,true);
		$criteria->compare('departamentoResponsable_did',$this->departamentoResponsable_did,true);
		$criteria->compare('fechaCumplida',$this->fechaCumplida,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}