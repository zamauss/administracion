<?php

/**
 * This is the model class for table "CategoriaActivo".
 *
 * The followings are the available columns in table 'CategoriaActivo':
 * @property string $id
 * @property string $nombre
 * @property string $tipoActivo_did
 *
 * The followings are the available model relations:
 * @property Activo[] $activos
 * @property TipoActivo $tipoActivo
 */
class CategoriaActivo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CategoriaActivo the static model class
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
		return 'CategoriaActivo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipoActivo_did', 'required'),
			array('nombre', 'length', 'max'=>100),
			array('tipoActivo_did', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, tipoActivo_did', 'safe', 'on'=>'search'),
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
			'activos' => array(self::HAS_MANY, 'Activo', 'categoriaActivo_did'),
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
			'nombre' => 'Nombre',
			'tipoActivo_did' => 'Tipo Activo',
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
		$criteria->compare('tipoActivo_did',$this->tipoActivo_did,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}