<?php

/**
 * This is the model class for table "Persona".
 *
 * The followings are the available columns in table 'Persona':
 * @property string $id
 * @property string $nombre
 * @property string $direccion
 * @property string $telefono
 * @property string $celular
 * @property string $correo
 * @property string $departamento_did
 * @property string $usuario_did
 *
 * The followings are the available model relations:
 * @property Activo[] $activos
 * @property Usuario $usuario
 * @property Departamento $departamento
 */
class Persona extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Persona the static model class
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
		return 'Persona';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('departamento_did, usuario_did', 'required'),
			array('nombre, correo', 'length', 'max'=>100),
			array('direccion', 'length', 'max'=>300),
			array('telefono, celular', 'length', 'max'=>20),
			array('departamento_did', 'length', 'max'=>11),
			array('usuario_did', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, direccion, telefono, celular, correo, departamento_did, usuario_did', 'safe', 'on'=>'search'),
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
			'activos' => array(self::HAS_MANY, 'Activo', 'persona_aid'),
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_did'),
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
			'nombre' => 'Nombre',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'celular' => 'Celular',
			'correo' => 'Correo',
			'departamento_did' => 'Departamento',
			'usuario_did' => 'Usuario',
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
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('departamento_did',$this->departamento_did,true);
		$criteria->compare('usuario_did',$this->usuario_did,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}