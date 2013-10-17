<?php
/**
* 后台用户 控制器
*/
class BackendUserController extends SBaseController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $controllerName = '后台用户';


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $this->pageTitle = '查看_后台用户_'.Yii::app()->name;
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        $this->pageTitle = '新增_后台用户_'.Yii::app()->name;
		$model=new BackendUser("create");

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BackendUser']))
		{
			$model->attributes=$_POST['BackendUser'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
        $this->pageTitle = '更新_后台用户_'.Yii::app()->name;
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BackendUser']))
		{
			$model->attributes=$_POST['BackendUser'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

    /**
     * 修改自己的密码
     */
    public function actionUpdateSelfPwd()
    {
        $this->pageTitle = '更新_后台用户_'.Yii::app()->name;
        $model=$this->loadModel(Yii::app()->user->id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['BackendUser']))
        {
            $model->attributes=$_POST['BackendUser'];
            if($model->save()){
                $this->showMsg('修改密码成功');
            }else{
                $this->showMsg('修改密码失败');
            }

        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
     * @throws CHttpException
	 */
	public function actionDelete($id)
	{
        $this->pageTitle = '删除_后台用户_'.Yii::app()->name;
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('BackendUser');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
        $this->pageTitle = '管理_后台用户_'.Yii::app()->name;
		$model=new BackendUser('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BackendUser']))
			$model->attributes=$_GET['BackendUser'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
     * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=BackendUser::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='backend-user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
