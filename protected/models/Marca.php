<?php

/**
 * This is the model class for table "Marca".
 *
 * The followings are the available columns in table 'Marca':
 * @property string $id
 * @property string $nombre
 * @property string $categoriaActivo_did
 *
 * The followings are the available model relations:
 * @property Activo[] $activos
 * @property CategoriaActivo $categoriaActivo
 */
class Marca extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Marca the static model class
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
		return 'Marca';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('categoriaActivo_did', 'required'),
			array('nombre', 'length', 'max'=>100),
			array('categoriaActivo_did', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, categoriaActivo_did', 'safe', 'on'=>'search'),
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
			'activos' => array(self::HAS_MANY, 'Activo', 'marca_did'),
			'categoriaActivo' => array(self::BELONGS_TO, 'CategoriaActivo', 'categoriaActivo_did'),
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
			'categoriaActivo_did' => 'Categoria Activo',
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
		$criteria->compare('categoriaActivo_did',$this->categoriaActivo_did,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}