<?
// автор @mightymind
// настройки движка и сайта

//ignore_user_abort(true);
@error_reporting(E_ALL | E_NOTICE | E_ERROR | E_WARNING | E_PARSE | E_CORE_ERROR | E_CORE_WARNING);
//@error_reporting(0); // отключение вывода ошибок и предупреждений
@set_time_limit(0); // отключение лимита на время работы скрипта
@ini_set('register_globals', false); // отключение register_globals
@ini_set('max_input_vars', 2000);// максимальное число переменных в запросе
@ini_set('memory_limit', '64M'); // определение лимита для выделения памяти
@ini_set('default_charset', 'UTF-8');// кодировка по-умолчанию
@date_default_timezone_set('Europe/Minsk');// временная зона

$app_uid = 'azbn7';

$CONFIG = array(
	//'domain'			=> 'azbn7.localhost'
	'debug' 			=> 1,
	'app_uid'			=> $app_uid,
	'charset'			=> 'UTF-8',
	'theme'				=> 'azbn-tpl/ru',
	'lang'				=> 'ru_ru',
	'path'				=> array(
							'root' => '',
							'cache' => 'var/cache/' . $app_uid,
							'backup' => 'var/backup/' . $app_uid,
							'route' => 'var/route/' . $app_uid,
							'upload' => 'var/upload/' . $app_uid,
							'system' => 'system',
							'azbn7' => 'system/azbn7',
							'phpmorphy' => 'system/vendor/phpmorphy',
							'app' => 'sites/apps/' . $app_uid,
							'vendor' => 'system/vendor',
							//'tpl' => 'sites/apps/'.$app_uid,
	),
	'mysql' 			=> array(
						0 => array(
							'host' => 'localhost',
							'user' => $app_uid,
							'pass' => $app_uid,
							'db' => $app_uid,
							'charset' => 'UTF8',
							'engine' => 'MyISAM',//'InnoDB',
							'prefix' => $app_uid,
							'prefix_data' => 'z',
							'max_value' => array(
								'int' => '2147483647',
								'bigint' => PHP_INT_MAX,//'9223372036854775807',
								'js_int' => PHP_INT_MAX,//'9007199254740992',
							),
							'connect_settings' => array(
								\PDO::ATTR_PERSISTENT => true,
							),
							't' => array(
								'sysopt' => $app_uid . '_sysopt',//системные настройки
								'sysopt_data' => $app_uid . '_sysopt_data',
								'alias' => $app_uid . '_alias',//алиасы
								'log' => $app_uid . '_log',//логи
								'state' => $app_uid . '_state',//состояния
								'role' => $app_uid . '_role',//роли
								'role_bound' => $app_uid . '_role_bound',//связи роли-пользователи
								'user' => $app_uid . '_user',//пользователи-админы
								'profile' => $app_uid . '_profile',//профили пользователей
								'right' => $app_uid . '_right',//права
								
								'bp' => $app_uid . '_bp',//бизнес-процессы
								'bp_stage' => $app_uid . '_bp_stage',//состояния бизнес-процессов
								
								'entity' => $app_uid . '_entity',//сущности
								'entity_type' => $app_uid . '_entity_type',//типы сущностей
								'entity_seo' => $app_uid . '_entity_seo',//сео-настройки сущностей
								'entity_bound' => $app_uid . '_entity_bound',//связи сущностей
								'entity_data' => $app_uid . '_entity_data',//данные сущностей
								'entity_search' => $app_uid . '_entity_search',//поисковый индекс сущностей
								'entity_state' => $app_uid . '_entity_state',//состояния сущностей
							),
						),
	),
	'sqlite'			=> array(
						0 => array(
							'file' => 'sites/apps/'.$app_uid.'/data/sqlite/default.db',
						),
	),
	'pagination'		=> array(
						'count' => 50,
	),
);

$EXT__ON_LOAD = array(
	
	array(
		'dir' => 'azbn7',
		'ext' => 'DebugExt',
		'param' => array()
	),
	
	array(
		'dir' => 'azbn7',
		'ext' => 'Cron',
		'param' => array()
	),
	/*
	array(
		'dir' => 'app',
		'ext' => 'Azbn_ru/Azbn7Ext/DefaultExt',
		'param' => array()
	),
	*/
	array(
		'dir' => 'app',
		'ext' => 'Azbn_ru/SimpleCache/SimpleCache',
		'param' => array()
	),
	
);
