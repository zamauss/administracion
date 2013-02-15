<?php

/**
 * This is the model class for table "Usuario".
 *
 * The followings are the available columns in table 'Usuario':
 * @property string $id
 * @property string $usuario
 * @property string $password
 * @property string $tipousuario_did
 * @property string $estatus_did
 *
 * The followings are the available model relations:
 * @property Persona[] $personas
 * @property Estatus $estatus
 * @property TipoUsuario $tipousuario
 */
class Usuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Usuario the static model class
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
		return 'Usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipousuario_did, estatus_did', 'required'),
			array('usuario, password', 'length', 'max'=>100),
			array('tipousuario_did', 'length', 'max'=>11),
			array('estatus_did', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, usuario, password, tipousuario_did, estatus_did', 'safe', 'on'=>'search'),
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
			'personas' => array(self::HAS_MANY, 'Persona', 'usuario_did'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'tipousuario' => array(self::BELONGS_TO, 'TipoUsuario', 'tipousuario_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'usuario' => 'Usuario',
			'password' => 'Password',
			'tipousuario_did' => 'Tipousuario',
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
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('tipousuario_did',$this->tipousuario_did,true);
		$criteria->compare('estatus_did',$this->estatus_did,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}