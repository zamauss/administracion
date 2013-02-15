<?php

/**
 * This is the model class for table "Activo".
 *
 * The followings are the available columns in table 'Activo':
 * @property string $id
 * @property string $persona_aid
 * @property string $area_did
 * @property string $tipoActivo_did
 * @property string $categoriaActivo_did
 * @property string $marca_did
 * @property string $estadoActivo_did
 * @property string $descripcion
 * @property string $numeroSerie
 * @property string $fecha_f
 * @property double $precio
 * @property integer $aceptado
 *
 * The followings are the available model relations:
 * @property Area $area
 * @property CategoriaActivo $categoriaActivo
 * @property EstadoActivo $estadoActivo
 * @property Marca $marca
 * @property Persona $persona
 * @property TipoActivo $tipoActivo
 */
class Activo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Activo the static model class
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
		return 'Activo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('persona_aid, area_did, tipoActivo_did, categoriaActivo_did, marca_did, estadoActivo_did, descripcion, fecha_f', 'required'),
			array('aceptado, cantidad', 'numerical', 'integerOnly'=>true),
			array('precio', 'numerical'),
			array('persona_aid, area_did, tipoActivo_did, categoriaActivo_did, marca_did, estadoActivo_did', 'length', 'max'=>11),
			array('descripcion', 'length', 'max'=>200),
			array('numeroSerie', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, persona_aid, area_did, cantidad, tipoActivo_did, categoriaActivo_did, marca_did, estadoActivo_did, descripcion, numeroSerie, fecha_f, precio, aceptado', 'safe', 'on'=>'search'),
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
			'area' => array(self::BELONGS_TO, 'Area', 'area_did'),
			'categoriaActivo' => array(self::BELONGS_TO, 'CategoriaActivo', 'categoriaActivo_did'),
			'estadoActivo' => array(self::BELONGS_TO, 'EstadoActivo', 'estadoActivo_did'),
			'marca' => array(self::BELONGS_TO, 'Marca', 'marca_did'),
			'persona' => array(self::BELONGS_TO, 'Persona', 'persona_aid'),
			'tipoActivo' => array(self::BELONGS_TO, 'TipoActivo', 'tipoActivo_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'persona_aid' => 'Persona',
			'area_did' => 'Area',
			'cantidad' => 'Cantidad',
			'tipoActivo_did' => 'Tipo Activo',
			'categoriaActivo_did' => 'Categoria Activo',
			'marca_did' => 'Marca',
			'estadoActivo_did' => 'Estado Activo',
			'descripcion' => 'Descripcion',
			'numeroSerie' => 'Numero Serie',
			'fecha_f' => 'Fecha F',
			'precio' => 'Precio',
			'aceptado' => 'Aceptado',
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
		$criteria->compare('persona_aid',$this->persona_aid,true);
		$criteria->compare('area_did',$this->area_did,true);
		$criteria->compare('tipoActivo_did',$this->tipoActivo_did,true);
		$criteria->compare('categoriaActivo_did',$this->categoriaActivo_did,true);
		$criteria->compare('marca_did',$this->marca_did,true);
		$criteria->compare('estadoActivo_did',$this->estadoActivo_did,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('numeroSerie',$this->numeroSerie,true);
		$criteria->compare('fecha_f',$this->fecha_f,true);
		$criteria->compare('precio',$this->precio);
		$criteria->compare('aceptado',$this->aceptado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}