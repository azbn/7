<?php

namespace app;

use \RedBeanPHP\R as R;

class ORM
{
	public $event_prefix = '';
	public $R = null;
	
	private $inited = false;
	
	public function __construct()
	{
		$this->event_prefix = strtolower(str_replace('\\', '.', static::class));
		//$this->RB = new \RedBeanPHP\Facade();
	}
	
	public function init($pdo_params = array())
	{
		
		if(!$this->inited) {
			
			
			//require_once('system/vendor/RedBeanPHP/rb.php');
			//require_once($this->Azbn7->config['path']['vendor'] . '/RedBeanPHP/rb.php');
			
			/*
			$pdo = new \RedBeanPHP\Driver\RPDO();
			$pdo->setPDO($pdo_connection);
			
			$adapter = new \RedBeanPHP\Adapter\DBAdapter($pdo);
			$writer = new \RedBeanPHP\QueryWriter\MySQL($adapter);
			$oodb = new \RedBeanPHP\OODB($writer);
			$tb = new \RedBeanPHP\ToolBox($oodb, $adapter, $writer);
			
			$this->RB = $tb->getRedBean();
			
			$w = $this->RB->dispense('whisky');
			$w->name = 'name';
			//$id = R::store($w);
			
			var_dump($w->export());
			*/
			
			//$w = $this->RB->dispense('whisky');
			//$w->name = 'name';
			//$id = $this->RB->store($w);
			
			//var_dump($oodb->getVersion());
			
			
			
			//require_once($this->Azbn7->config['path']['vendor'] . '/RedBeanPHP/rb.php');
			
			//new \Azbn_ru\RedBeanPHP\RedBeanPHP_Loader();
			
			R::setup('mysql:host=' . $pdo_params['host'] . ';dbname=' . $pdo_params['db'], $pdo_params['user'], $pdo_params['pass']);
			//R::freeze(true);
			if (!R::testConnection()) {
				
			} else {
				
				$w = R::dispense('whisky');
				$w->name = 'name';
				$id = R::store($w);
				
				var_dump($w->export());
				
			}
			
			
			
			$this->inited = true;
			
			//R::close();
			
			return $this->event_prefix;
			
		}
		
	}
	
}
