<?php

namespace app;

class Cli
{
	public $event_prefix = '';//'app.mdl.cli';
	public $platform = array();
	
	//DIRECTORY_SEPARATOR
	
	public function __construct()
	{
		$this->event_prefix = strtolower(str_replace('\\', '.', static::class));
	}
	
	public function run()
	{
		
		$this->Azbn7->mdl('Site')->selectLang();
		
		$this->Azbn7->mdl('Site')->loadLang();
		
		$this->calcOS();
		
		$param = array();
		
		$this->Azbn7->run('app', 'cli/index', $param);
		
	}
	
	public function calcOS()
	{
		$this->os_string = php_uname();
		$this->platform = explode(' ', $this->os_string);
		return $this->platform;
	}
	
	public function cli_process($c)
	{
		$result = '';
		
		if(isset($c['app']) && $c['app'] != '') {
			
			$c_str = implode(' ', array_merge(
				array($c['app']),
				$c['param'] ? $c['param'] : array()
			));
			
			$result = strtr(
				shell_exec($c_str),
				array(
					/*
					PHP_EOL => '',
					"\r" => '',
					"\t" => '',
					"\s" => '',
					*/
				)
			);
			
		}
		
		return $result;
	}
	
}