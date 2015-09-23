<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property integer $customer_id
 * @property string $customer_name
 * @property string $email
 * @property string $password
 */
class Customer extends CActiveRecord
{
	
	
	//untuk membuat compare password
	public $comparePassword;
	
	/*digunakan untuk meng-engkrip password dengan md5*/
	protected function beforeSave() {
		if(parent::beforeSave()){
			$this -> password = $this -> encrypt($this -> password);
			return TRUE;
		}else{
			return FALSE;
		}
	}

	/*membuat fungsi untuk engkrip data*/
	public function encrypt($value) {
		return md5($value);
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Customer the static model class
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
		return 'customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customer_name, email, password,comparePassword', 'required'),
			array('customer_name', 'length', 'max'=>57),
			array('email', 'length', 'max'=>45),
			array('password','length','min'=>8),
			array('email', 'email'),
			array('email', 'unique'),
			array('password', 'length', 'max'=>35),
			array('comparePassword','compare','compareAttribute'=>'password'),
			
			 
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('customer_id, customer_name, email, password', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'customer_id' => 'Customer',
			'customer_name' => 'Customer Name',
			'email' => 'Email',
			'password' => 'Password',
			'comparePassword'=>'Confirm Password',
			
			 
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

		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('customer_name',$this->customer_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}