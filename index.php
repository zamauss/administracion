<?php
if(dirname(__FILE__) == '/Users/rzamarripa/Dropbox/sites/htdocs/administracion')
	$yii=dirname(__FILE__).'/../../yii/framework/yii.php';
else
	$yii=dirname(__FILE__).'/../../../yii/framework/yii.php';
// change the following paths if necessary+

$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
