<?
// CMS Azbn7

// подключение конфига
//$host = explode(':',$_SERVER['HTTP_HOST']);
//require_once('sites/config/'.strtolower($host[0]).'.config.php');

define('AZBN7__IS_CLI', (PHP_SAPI == 'cli') || (php_sapi_name() == 'cli') || ((!isset($_SERVER['DOCUMENT_ROOT'])) && (!isset($_SERVER['REQUEST_URI']))));
define('AZBN7__IS_OSX', (strtoupper(substr(PHP_OS, 0, 3)) === 'DAR'));
define('AZBN7__IS_LINUX', (strtoupper(substr(PHP_OS, 0, 5)) === 'LINUX'));
define('AZBN7__IS_WIN', (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'));
define('AZBN7__ROOT_DIR', dirname(__FILE__));

define('REDBEAN_MODEL_PREFIX', '\\Azbn_ru\\RedBeanPHP\\Model\\');

if(AZBN7__IS_CLI) {
	@chdir(AZBN7__ROOT_DIR);
}

require_once('sites/config/localhost.config.php');

//var_dump($CONFIG);die();

// запуск главного класса фреймворка
require_once($CONFIG['path']['azbn7'].'/azbn7.class.php');

$Azbn7 = new \azbn7\Azbn7($CONFIG);
unset($CONFIG);

session_start();

$Azbn7
	->load(array(
		'dir' => 'azbn7',
		'mdl' => 'Autoloader',
		'uid' => 'Autoloader',
		'param' => array()
	))
	->mdl('Autoloader')
		->register_autoloaders()
	->load(array(
		'dir' => 'azbn7',
		'mdl' => 'Lang',
		'uid' => 'Lang',
		'param' => array()
	))
	->load(array(
		'dir' => 'azbn7',
		'mdl' => 'Storage_MySQL',
		'uid' => 'DB',
		'param' => array()
	))
	/*
	->load(array(
		'dir' => 'azbn7',
		'mdl' => 'Storage_SQLite',
		'uid' => 'SQLite',
		'param' => array()
	))
	*/
	->load(array(
		'dir' => 'azbn7',
		'mdl' => 'Ext',
		'uid' => 'Ext',
		'param' => array()
	))
	->load(array(
		'dir' => 'azbn7',
		'mdl' => 'Req',
		'uid' => 'Req',
		'param' => array()
	))
	->load(array(
		'dir' => 'azbn7',
		'mdl' => 'FS',
		'uid' => 'FS',
		'param' => array()
	))
	->load(array(
		'dir' => 'app',
		'mdl' => 'Cli',
		'uid' => 'Cli',
		'param' => array()
	))
	->load(array(
		'dir' => 'app',
		'mdl' => 'Session',
		'uid' => 'Session',
		'param' => array()
	))
	->load(array(
		'dir' => 'app',
		'mdl' => 'AppRouter',
		'uid' => 'AppRouter',
		'param' => array()
	))
	->load(array(
		'dir' => 'app',
		'mdl' => 'Site',
		'uid' => 'Site',
		'param' => array()
	))
	->load(array(
		'dir' => 'app',
		'mdl' => 'Entity',
		'uid' => 'Entity',
		'param' => array()
	))
	->load(array(
		'dir' => 'app',
		'mdl' => 'Viewer',
		'uid' => 'Viewer',
		'param' => array()
	))
	->load(array(
		'dir' => 'app',
		'mdl' => 'BP',
		'uid' => 'BP',
		'param' => array()
	))
;

$Azbn7
	->mdl('Ext')
		->loadExts($EXT__ON_LOAD)
;

/* ---------- ext__event ---------- */
$Azbn7
	->mdl('Ext')
		->event($Azbn7->mdl('Ext')->event_prefix . '.loadExts.main.after', $EXT__ON_LOAD)
;
/* --------- /ext__event ---------- */

unset($EXT__ON_LOAD);



/* ---------- ext__event ---------- */
$Azbn7
	->mdl('Ext')
		->event($Azbn7->mdl('DB')->event_prefix . '.connect.before')
;
/* --------- /ext__event ---------- */


$Azbn7
	->mdl('DB')
		->connect($Azbn7->config['mysql'][0])
;

/* ---------- ext__event ---------- */
$Azbn7
	->mdl('Ext')
		->event($Azbn7->mdl('DB')->event_prefix . '.connect.after')
;
/* --------- /ext__event ---------- */



if(!AZBN7__IS_CLI) {
	
	
	
	/* ---------- ext__event ---------- */
	$Azbn7
		->mdl('Ext')
			->event($Azbn7->mdl('Req')->event_prefix . '.parseURL.before')
	;
	/* --------- /ext__event ---------- */
	
	
	$Azbn7
		->mdl('Req')
			->parseURL()
	;
	
	
	/* ---------- ext__event ---------- */
	$Azbn7
		->mdl('Ext')
			->event($Azbn7->mdl('Req')->event_prefix . '.parseURL.after')
	;
	/* --------- /ext__event ---------- */
	
	
	
	
	
	
	/* ---------- ext__event ---------- */
	$Azbn7
		->mdl('Ext')
			->event($Azbn7->mdl('Req')->event_prefix . '.request.before')
	;
	/* --------- /ext__event ---------- */
	
	
	
	$Azbn7
		->mdl('AppRouter')
			->route($Azbn7->data['mdl']['Req']['req_url'])
	;
	
	
	/* ---------- ext__event ---------- */
	$Azbn7
		->mdl('Ext')
			->event($Azbn7->mdl('Req')->event_prefix . '.request.after')
	;
	/* --------- /ext__event ---------- */
	
	
	
	//var_dump($Azbn7->__events);
	
	
	
} else {
	
	
	
	/* ---------- ext__event ---------- */
	$Azbn7
		->mdl('Ext')
			->event($Azbn7->mdl('Cli')->event_prefix . '.run.before')
	;
	/* --------- /ext__event ---------- */
	
	
	$Azbn7
		->mdl('Cli')
			->run()
	;
	
	
	/* ---------- ext__event ---------- */
	$Azbn7
		->mdl('Ext')
			->event($Azbn7->mdl('Cli')->event_prefix . '.run.after')
	;
	/* --------- /ext__event ---------- */
	
	
	
	//var_dump($Azbn7->__events);
	
	
	
}