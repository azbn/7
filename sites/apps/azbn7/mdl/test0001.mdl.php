<?php

namespace app;

class Test0001
{
	public $event_prefix = '';//'app.mdl.test0001';
	public $platform = array();
	
	//DIRECTORY_SEPARATOR
	
	public function __construct()
	{
		$this->event_prefix = strtolower(str_replace('\\', '.', static::class));
	}
	
	public function test()
	{
		
		return $this->Azbn7->now() . ' ' . $this->event_prefix;
		
	}
	
}