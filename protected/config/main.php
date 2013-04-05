<?php
// Define a path alias for the Bootstrap extension as it's used internally.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
        'theme'=>'bootstrap',
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'TOP Draft',
        
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'ext.eoauth.*',                 // auth start
                'ext.eoauth.lib.*',
                'ext.lightopenid.*',
                'ext.eauth.*',
                'ext.eauth.services.*',         // auth end

	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
                        'generatorPaths'=>array(
                            'bootstrap.gii',
                        ),
		),
		*/
	),

	// application components
	'components'=>array(
                'bootstrap'=>array(
                    'class'=>'bootstrap.components.Bootstrap',
                ),
                'loid' => array(
                    'class' => 'ext.lightopenid.loid',
                ),
                'eauth' => array(
                    'class' => 'ext.eauth.EAuth',
                    'popup' => true, // Use the popup window instead of redirecting.
                    'cache' => false, // Cache component name or false to disable cache. Defaults to 'cache'.
                    'cacheExpire' => 0, // Cache lifetime. Defaults to 0 - means unlimited.
                    'services' => array( // You can change the providers and their classes.
                        'google' => array(
                            'class' => 'GoogleOpenIDService',
                        ),
                        'yandex' => array(
                            'class' => 'YandexOpenIDService',
                        ),
                        'twitter' => array(
                            // register your app here: https://dev.twitter.com/apps/new
                            'class' => 'TwitterOAuthService',
                            'key' => '...',
                            'secret' => '...',
                        ),
                        'google_oauth' => array(
                            // register your app here: https://code.google.com/apis/console/
                            'class' => 'GoogleOAuthService',
                            'client_id' => '...',
                            'client_secret' => '...',
                            'title' => 'Google (OAuth)',
                        ),
                        'yandex_oauth' => array(
                            // register your app here: https://oauth.yandex.ru/client/my
                            'class' => 'YandexOAuthService',
                            'client_id' => '...',
                            'client_secret' => '...',
                            'title' => 'Yandex (OAuth)',
                        ),
                        'facebook' => array(
                            // register your app here: https://developers.facebook.com/apps/
                            'class' => 'FacebookOAuthService',
                            'client_id' => '...',
                            'client_secret' => '...',
                        ),
                        'linkedin' => array(
                            // register your app here: https://www.linkedin.com/secure/developer
                            'class' => 'LinkedinOAuthService',
                            'key' => '...',
                            'secret' => '...',
                        ),
                        'github' => array(
                            // register your app here: https://github.com/settings/applications
                            'class' => 'GitHubOAuthService',
                            'client_id' => '...',
                            'client_secret' => '...',
                        ),
                        'live' => array(
                            // register your app here: https://manage.dev.live.com/Applications/Index
                            'class' => 'LiveOAuthService',
                            'client_id' => '...',
                            'client_secret' => '...',
                        ),
                        'vkontakte' => array(
                            // register your app here: https://vk.com/editapp?act=create&site=1
                            'class' => 'VKontakteOAuthService',
                            'client_id' => '...',
                            'client_secret' => '...',
                        ),
                        'mailru' => array(
                            // register your app here: http://api.mail.ru/sites/my/add
                            'class' => 'MailruOAuthService',
                            'client_id' => '...',
                            'client_secret' => '...',
                        ),
                        'moikrug' => array(
                            // register your app here: https://oauth.yandex.ru/client/my
                            'class' => 'MoikrugOAuthService',
                            'client_id' => '...',
                            'client_secret' => '...',
                        ),
                        'odnoklassniki' => array(
                            // register your app here: http://dev.odnoklassniki.ru/wiki/pages/viewpage.action?pageId=13992188
                            // ... or here: http://www.odnoklassniki.ru/dk?st.cmd=appsInfoMyDevList&st._aid=Apps_Info_MyDev
                            'class' => 'OdnoklassnikiOAuthService',
                            'client_id' => '...',
                            'client_public' => '...',
                            'client_secret' => '...',
                            'title' => 'Odnokl.',
                        ),
                    ),
                ),
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
                        'showScriptName'=>false,
		),
		
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
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
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);