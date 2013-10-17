<?php
/**
 * 公共配置文件修改控制器
 * Class SettingController
 */

class SettingController extends SBaseController {

    public $controllerName = '公共配置';

    /**
     * @var 配置文件数组
     */
    private  $main;

    public function init(){
        $this->main = Yii::app()->params['main'];
    }
    /**
     * 显示，修改配置
     */
    public function actionMain(){
        //重组数据
        $buildData = array();
        foreach($this->main as $k => $v){
            $buildData[] = array(
                'id'=>$k,
                'value'=>$v['value'],
                'name'=>$v['name'],
                'readOnly'=>$v['readOnly'],
            );
        }
        // Create filter model and set properties
        $filtersForm=new FiltersForm;
        if (isset($_GET['FiltersForm']))
            $filtersForm->filters=$_GET['FiltersForm'];

        $filteredData=$filtersForm->filter($buildData);
        $dataProvider = new CArrayDataProvider($filteredData,array(
             'pagination'=>array(
                  'pageSize'=>20,
              ),
        ));

        $this->render('main',array(
            'dataProvider'=>$dataProvider,
            'filtersForm'=>$filtersForm,
        ));
    }

    /**
     * 新增 配置
     */
    public function actionCreate(){
        $model=new SettingForm;
        $this->_updateOrCreate($model);
        $this->render('create', array('model'=>$model));
    }

    /**
     * 修改配置
     * @param $id
     */
    public function actionUpdate($id){
        $model=new SettingForm;
        $model->key = $id;
        $model->name = $this->main[$id]['name'];
        $model->value = $this->main[$id]['value'];
        $model->readOnly = $this->main[$id]['readOnly'];

        $this->_updateOrCreate($model);

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    /**
     * 删除配置
     * @param $id
     */
    public function actionDelete($id){
        unset($this->main[$id]);
        $this->_write($this->main);
    }

    /**
     * 查看配置
     * @param $id
     */
    public function actionView($id){
        $model=new SettingForm;
        $model->key = $id;
        $model->name = $this->main[$id]['name'];
        $model->value = $this->main[$id]['value'];
        $model->readOnly = $this->main[$id]['readOnly'];
        $this->render('view',array(
            'model'=>$model,
        ));
    }

    /**
     * 写配置
     * @param array $data 数据
     */
    private function _write(array $data){
        $content  = "<?php \r\n //网站公共配置\r\r return ";
        $content .= var_export($data,true);
        $content .= ';';
        if(file_put_contents(Yii::app()->basePath.'/public_config/main.php', $content)){
            $this->showMsg('修改配置成功！');
        }else{
            $this->showMsg('修改配置失败！','','操作失败');
        }
    }

    /**
     * 修改或者新增配置
     * @param $model
     */
    private function _updateOrCreate($model){
        if(isset($_POST['SettingForm']))
        {
            $model->attributes=$_POST['SettingForm'];
            if($model->validate())
            {
                $addData = array(
                    $model->key=>array(
                        'name'=>$model->name,
                        'value'=>$model->value,
                        'readOnly'=>$model->readOnly,
                    ),
                );
                $data = array_merge($this->main, $addData);
                $this->_write($data);
            }
        }
    }

}