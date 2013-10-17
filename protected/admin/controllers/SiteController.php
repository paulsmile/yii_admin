<?php
/**
 *后台默认页面 
 */
class SiteController extends Controller
{

    public $layout = '//layouts/column2';

       /**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('login','logout','captcha','main','showMsg'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('index','map'),
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
        
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
        $topMenu = Menu::model()->findAllByAttributes(array('parent_id'=>0),array('order'=>'sort DESC'));
		$this->renderPartial('//layouts/index',array(
            'topMenu'=>$topMenu,
        ));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionShowMsg()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('showMsg', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
        $this->layout='//layouts/column1';
		$model=new BackendLoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='backend-login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['BackendLoginForm']))
		{
			$model->attributes=$_POST['BackendLoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
                //更新登录
                $backendUser = BackendUser::model()->findByPk(Yii::app()->user->id);
                $backendUser->login_times = $backendUser->login_times +1;
                $backendUser->login_ip = Tool::ip2number($_SERVER['REMOTE_ADDR']);
                $backendUser->login_time = time();
                $backendUser->scenario = 'login';
                if(!$backendUser->save()){
                    $this->showMsg('更新登录信息失败','','操作失败');
                }
               $this->redirect(Yii::app()->user->returnUrl);
            }

		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

    /**
     * 后台首页
     */
    public function actionMain(){
        //var_dump(Yii::app()->user->checkAccess('srbac@AuthitemManage'));
        $this->layout = '//layouts/column1';
        $this->render('main');
    }



    /**
     * ajax 显示后台菜单
     */
    public function showMenu($id){
        $menu = new Menu();
        $menuData = $menu->getChildren($id);
        $menuHtml = '';
        foreach($menuData as $v){
            if($v['hasChildren']){
                //继续查找子类
                $ChildrenMenu = $menu->getChildren($v['id']);
                if($ChildrenMenu){
                    $menuLi  = $this->getLiMenu($ChildrenMenu); //检查权限，获取菜单
                    if(stripos($menuLi,'<li')!==false){ //是否有子菜单
                        $menuHtml .= '<span><h3 class="f14">
                        <span class="J_switchs cu on" title="展开或关闭"></span>'.$v['name'].'</h3>';
                        $menuHtml .= $menuLi.'</span>';
                    }
                }
            }else{
                $menuHtml .= '<ul>'.$this->getLi($v).'</ul>';
            }

        }
        return $menuHtml;
    }

    /**
     * 获取li菜单
     * @param array $ChildrenMenu 子类菜单
     * @return string
     */
    private function getLiMenu(Array $ChildrenMenu){
        $menuLi = '';
        foreach($ChildrenMenu as $v_c){
            $menuLi .= $this->getLi($v_c);
        }
        return  '<ul>'.$menuLi.'</ul>';
    }

    /**
     * 检查用户是否有 菜单的url权限
     * @param $v_c
     * @return bool|string
     */
    private function getLi($v_c){
        $menuLi = '';
        $pattern = '(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)';
        $isUrl = preg_match($pattern,$v_c['link']);
        if(!$isUrl){
            Yii::import("srbac.components.Helper");
            $del = Helper::findModule('srbac')->delimeter;
            $tmpAccess = explode('/',$v_c['link']);
            $access = '';
            foreach($tmpAccess as $v_a){
                $access .= ucfirst($v_a);
            }
            if(count($tmpAccess)==3){
                $access = $tmpAccess[0].$del.ucfirst($tmpAccess[1]).ucfirst($tmpAccess[2]);
            }
            $allowedAccess = Helper::findModule('srbac')->getAlwaysAllowed(); //总是允许的
            if(!Yii::app()->user->checkAccess($access) && !in_array($access,$allowedAccess) ) return false;
        }

        //如果url是绝对地址，则用绝对地址
        $url = $isUrl ? $v_c['link'] : Yii::app()->createUrl($v_c['link']);
        $menuLi .= '
                    <li class="sub_menu">
                       <a href="'.$url.'"  data-id="'.$v_c['id'].'" hidefocus="true">'.$v_c['name'].'</a>
                    </li>';
        return  $menuLi;
    }

    /**
     * 后台地图
     */
    public function actionMap(){
        $topMenu = Menu::model()->findAllByAttributes(array('parent_id'=>0),array('order'=>'sort DESC'));
        $this->renderPartial('map',array(
            'topMenu'=>$topMenu,
        ));
    }
}