<?php

/**
 * "{{backend_user}}"  模型
 *
 * 以下是'{{backend_user}}'中的字段
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $salt
 * @property string $email
 * @property string $true_name
 * @property integer $created
 * @property integer $updated
 * @property integer $login_times
 * @property integer $login_time
 * @property integer $login_ip
 */
class BackendUser extends CActiveRecord
{

    /**
     * @var 重复输入密码
     */
    public $confirmPwd;

    /**
     * @var 旧的密码
     */
    public $oldPwd;
	/**
     * 返回 AR 模型
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BackendUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
     * 返回 数据表的名字
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{backend_user}}';
	}

	/**
     * 验证规则
     *
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, email, true_name', 'required'),
            array('password','required','on'=>'create'),
            array('confirmPwd','required','on'=>'create'),
			array('created, updated, login_times, login_time, login_ip', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>100),
			array('password', 'length', 'max'=>32),
			array('password', 'length', 'min'=>6),
            array('confirmPwd', 'compare', 'compareAttribute'=>'password', 'on'=>'create,update'), //new Post('场景')
			array('salt', 'length', 'max'=>6),
			array('email', 'length', 'max'=>200),
			array('email', 'email'),
			array('email', 'unique'),
			array('username', 'unique'),
			array('true_name', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, salt, email, true_name, created, updated, login_times, login_time, login_ip', 'safe', 'on'=>'search'),
		);
	}

	/**
     * 关系模型
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
     * 字段对应的说明
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('tb_backend_user', 'ID'),
			'username' => Yii::t('tb_backend_user', '用户名'),
			'password' => Yii::t('tb_backend_user', '密码'),
			'confirmPwd' => Yii::t('tb_backend_user', '重复密码'),
			'salt' => Yii::t('tb_backend_user', '密码干扰串'),
			'email' => Yii::t('tb_backend_user', '邮箱'),
			'true_name' => Yii::t('tb_backend_user', '真实姓名'),
			'created' => Yii::t('tb_backend_user', '创建时间'),
			'updated' => Yii::t('tb_backend_user', '更新时间'),
			'login_times' => Yii::t('tb_backend_user', '登录次数'),
			'login_time' => Yii::t('tb_backend_user', '登录时间'),
			'login_ip' => Yii::t('tb_backend_user', '本次登录ip'),
		);
	}

	/**
     * 搜索
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('true_name',$this->true_name,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('updated',$this->updated);
		$criteria->compare('login_times',$this->login_times);
		$criteria->compare('login_time',$this->login_time);
		$criteria->compare('login_ip',$this->login_ip);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array(
                             'pageSize'=>20, //分页
                         ),
            'sort'=>array(
                'defaultOrder'=>'id DESC', //设置默认排序
            ),

		));
	}

    /**
     * 保存数据前，设置默认的时间、ip、密码等
     * @return bool
     */
    public function beforeSave(){

        if($this->isNewRecord){
            $this->created = time();
            $this->salt = Tool::salt();
            $this->password = Tool::pwdSalt($this->password, $this->salt);
            $this->login_ip = Tool::ip2number($_SERVER['REMOTE_ADDR']);
        }else{
            if(!empty($this->password) && $this->password == $this->confirmPwd){
                $this->salt = Tool::salt();
                $this->password = Tool::pwdSalt($this->password, $this->salt);
            }else{
                $this->password = $this->oldPwd;
            }
            $this->updated = time();
        }
        return parent::beforeSave(); //必须执行父类方法
    }

    /**
     * 保存旧的密码到中间变量
     */
    public function afterFind(){
        $this->oldPwd = $this->password;
    }

}