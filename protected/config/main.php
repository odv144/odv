<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'ODV SYSTEM	',

	// preloading 'log' component
	'preload'=>array('log'),
   	'theme'=>'pro',
  	'language'=>'es',
  	'sourceLanguage'=>'en',
  
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	'aliases' => array(
    //assuming you extracted the files to the extensions folder
    'xupload' => 'ext.xupload',
	
	), 
	
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'odv144',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),
	
	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db',
        ),
			
		'widgetFactory' => array(
		'widgets' => array(
			'CGridView' => array(
				'cssFile' =>false,
				'pager' =>array('cssFile' =>false),
				'pagerCssClass' =>'pagination',
				//'rowCssClass'=>array('light','dark'),
				//'itemsCssClass'=>'table table-bordered table-condensed table-striped',
			),
			'CListView' =>array(
				'cssFile' =>false,
				'pager' =>array('cssFile' =>false),
				'pagerCssClass' =>'pagination',
				
			),
			
			
			'CLinkPager' =>array(
			),
			
		)
		),
		


		
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		
		//para servidor local
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=odvsystem',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		
		//para servidor remoto
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=mysql.ekiwi.es;dbname=u937723250_onda',
			'emulatePrepare' => true,
			'username' => 'u937723250_onda',
			'password' => 'odv144',
			'charset' => 'utf8',
		),
		*/
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
					'enabled'=>YII_DEBUG,
				),
				// uncomment the following to show log messages on web pages
				
				array(
					'class'=>'CWebLogRoute',
					'levels'=>'error, warning,trace,info',
					'enabled'=>YII_DEBUG, 
				),
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'omar.virili@gmail.com',
	),
);