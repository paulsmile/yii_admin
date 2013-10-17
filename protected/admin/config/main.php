<?php
//后台配置
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
//设置路径
$admin =dirname(dirname(__FILE__));
$frontend=dirname($admin);
Yii::setPathOfAlias('admin', $admin); //后台目录别名
Yii::setPathOfAlias('bootstrap', $frontend.'/extensions/bootstrap'); //bootstrap扩展 目录别名

return array(
        'basePath' => $frontend, //分离前后台后的重要配置
        'controllerPath' => $admin.'/controllers',
        'viewPath' => $admin.'/views',
        'runtimePath' => $admin.'/runtime',
        'language' => 'zh_cn',
        'timeZone'=>'Asia/Shanghai',
	    'name'=>'后台管理',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
        //分离前后台后的重要配置,共用models
		'application.models.*',
        'admin.components.*',
        'application.public_components.*',
        'admin.modules.srbac.controllers.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths'=>array( //gii添加生成模块
                'bootstrap.gii',
            ),
		),
        'srbac' => array(
            'class'=>'admin.modules.srbac.SrbacModule',
            'userclass'=>'BackendUser', //default: User
            'userid'=>'id', //default: userid
            'username'=>'username', //default:username
            'delimeter'=>'@', //default:-
            'debug'=>false, //default :false
            'pageSize'=>20, // default : 15
            'superUser' =>'Authority', //default: Authorizer
            'css'=>'srbac.css',  //default: srbac.css
            'layout'=>
            'admin.views.layouts.main', //default: application.views.layouts.main,                                              //must be an existing alias
            'notAuthorizedView'=> 'srbac.views.authitem.unauthorized', // default:
            //srbac.views.authitem.unauthorized, must be an existing alias
            'alwaysAllowed'=>array(   //default: array()
                'SiteLogin','SiteLogout','SiteIndex','SiteAdmin',
                'SiteError', 'SiteContact'),
            'userActions'=>array('Show','View','List'), //default: array()
            'listBoxNumberOfLines' => 20,  //default : 10
            'imagesPath' => 'srbac.images', // default: srbac.images
            'imagesPack'=>'noia', //default: noia
            'iconText'=>true, // default : false
            'header'=>'srbac.views.authitem.header', //default : srbac.views.authitem.header,
            //must be an existing alias
            'footer'=>'srbac.views.authitem.footer', //default: srbac.views.authitem.footer,
            //must be an existing alias
            'showHeader'=>true, // default: false
            'showFooter'=>true, // default: false
            'alwaysAllowedPath'=>'srbac.components', // default: srbac.components
            // must be an existing alias
        ),
    ),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
        //发送邮件配置
        'mail' => array(
 			'class' => 'ext.yii-mail.YiiMail',
 			'transportType' => 'smtp',
 			'viewPath' => 'application.views.mail',
 			'logging' => true,
 		),

        'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),

        'authManager'=>array(
            // 类SDbAuthManager在srbac模块中的路径（别名），注意大小写
            'class'=>'admin.modules.srbac.components.SDbAuthManager',
            // 使用的数据库的组件名
            'connectionID'=>'db',
            // 下面是3个数据表
            // The itemTable name (default:authitem)
            'itemTable'=>'tb_rbac_items',
            // The assignmentTable name (default:authassignment)
            'assignmentTable'=>'tb_rbac_assignments',
            // The itemChildTable name (default:authitemchild)
            'itemChildTable'=>'tb_rbac_itemchildren',
        ),
        // uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
            /*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
             * 
             */
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=yii_admin',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
            'tablePrefix'=>'tb_',
            'enableProfiling'=>true, //sql 调试 显示值
            'enableParamLogging'=>true,
		),
        
		'errorHandler'=>array(
			// use 'site/showMsg' action to display errors
			'errorAction'=>'site/showMsg',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
                                array(  
                                    'class'=>'CFileLogRoute',  
                                    'levels'=>'error, warning',  
                                ),  
                                // 下面显示页面日志  
                                array(  
                                    'class'=>'CWebLogRoute',  
                                    'levels'=>'trace',     //级别为trace  
                                    'categories'=>'system.db.*' //只显示关于数据库信息,包括数据库连接,数据库执行语句  
                                ),        
			
			),
		),


	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
        //公共配置文件
		'main'=> include $frontend.'/public_config/main.php',
	),
);