<?php
/**
 * 公共配置文件模型,只是做数据验证
 * Class LoginForm
 */
class SettingForm extends CFormModel
{
	public $key;
	public $name;
	public $value;
    public $readOnly;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('key,name,value,readOnly', 'required'),
            array('readOnly','in','range'=>array(0,1)),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'key'=>'key标识',
			'name'=>'名称',
			'value'=>'值',
			'readOnly'=>'是否只读',
		);
	}

}
