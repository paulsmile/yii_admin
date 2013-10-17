<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column2';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    /**
     * 操作提示
     * @param $message 提示信息
     * @param string $url 跳转地址
     * @param string $code 提示标题
     */
    public function showMsg($message, $url='', $code=''){
        $this->renderPartial('//site/showMsg',array(
            'message'=>$message,
            'url'=>$url,
            'code'=>$code,
        ));
        exit;
    }


}