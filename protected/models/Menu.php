<?php

/**
 * "{{menu}}"  模型
 *
 * 以下是'{{menu}}'中的字段
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $link
 * @property string $alt
 * @property integer $sort
 */
class Menu extends CActiveRecord
{
	/**
     * 返回 AR 模型
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Menu the static model class
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
		return '{{menu}}';
	}

	/**
     * 验证规则
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, link', 'required'),
			array('parent_id, sort', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('link', 'length', 'max'=>200),
			array('alt', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, name, link, alt, sort', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('tb_menu', 'ID'),
			'parent_id' => Yii::t('tb_menu', '父类id'),
			'name' => Yii::t('tb_menu', '名称'),
			'link' => Yii::t('tb_menu', '链接'),
			'alt' => Yii::t('tb_menu', '提示'),
			'sort' => Yii::t('tb_menu', '排序'),
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('alt',$this->alt,true);
		$criteria->compare('sort',$this->sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array(
                             'pageSize'=>20, //分页
                         ),
            'sort'=>array(
                //'defaultOrder'=>' DESC', //设置默认排序
            ),

		));
	}

    /**
     * 获取子类菜单
     * @param $parentId
     * @return array
     */
    public function getChildren($parentId){
        $sql = "SELECT
                    a.id,
                    a.name,
                    a.link,
                    a.sort,
                    a.parent_id,
                    a.`name` AS text,
                    b.id IS NOT NULL AS hasChildren #转换成布尔值
                FROM
                    tb_menu AS a
                LEFT JOIN tb_menu AS b ON a.id = b.parent_id
                WHERE
                    a.parent_id <=> $parentId  #当前查找的
                GROUP BY
                    a.id  #去掉重复的
                ORDER BY
                    a.sort DESC
                    ";
        $req = Yii::app()->db->createCommand($sql);
        return $req->queryAll();
    }

    /**
     * 排序好的下拉菜单
     * @param string $delimiter
     * @return array
     */
    public function getSelectMenu($delimiter='|--'){
        $topMenu = $this->getChildren(0);
        if(empty($topMenu)) return array();
        $children = array(); //子类
        $selectMenu = array();
        foreach($topMenu as $k => $v){
            if($v['hasChildren']){
                $children[$k] = $this->getChildren($v['id']);
            }
        }
        /**
         * 将子菜单放到父类菜单后面，逐个放入一个数组
         */
        foreach($children as $k=>$v){
            if($topMenu[$k]['id']==$v[0]['parent_id']){
                 array_splice($selectMenu,count($selectMenu),0,array_merge(array($topMenu[$k]),$v));
            }
        }
        //给二级菜单添加分隔符
        foreach($selectMenu as $k => &$v){
            if($v['parent_id']!=0) $v['name'] = $delimiter.$v['name'];
        }
        return $selectMenu;
    }

}