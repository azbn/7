<?php

namespace Azbn_ru\Entities {
	
	class SimpleEntity
	{
		private $__data = array();
		
		public $event_prefix = '';
		public $Azbn7 = null;
		
		public function __construct(&$Azbn7)
		{
			$this->event_prefix = strtolower(str_replace('\\', '.', static::class));
			$this->Azbn7 = $Azbn7;
		}
		
		
		public function __destruct()
		{
			
		}
		
		
		public function loadData($p = array())
		{
			$this->__data = $p;
		}
		
		
		/*
		public function getId()
		{
			return intval($this->__data['id']);
		}
		
		
		public function getTitle()
		{
			return isset($this->__data['title']) ? $this->__data['title'] : $this->__data['view_as'];
		}
		*/
		
		
		public function __call($_name, $_param)
		{
			
			if(strpos($_name, 'get') === 0) {
				$attrName = substr($_name, 3);
				$attrName = preg_replace_callback('/(^[A-Z])/', create_function('$matches', 'return strtolower($matches[0]);'), $attrName);
				$attrName = preg_replace_callback('/([A-Z])/', create_function('$matches', 'return \'_\' . strtolower($matches[0]);'), $attrName);
				if(!in_array($attrName, $this->__data)) {
					return $this->$attrName;
				} else {
					return $this->__data[$attrName];
				}
			}
			
			if(strpos($_name, 'set') === 0) {
				$attrName = substr($_name, 3);
				$attrName = preg_replace_callback('/(^[A-Z])/', create_function('$matches', 'return strtolower($matches[0]);'), $attrName);
				$attrName = preg_replace_callback('/([A-Z])/', create_function( '$matches', 'return \'_\' . strtolower($matches[0]);'), $attrName);
				if(!in_array($attrName, $this->__data)) {
					$this->$attrName = $_param[0];
				} else {
					$this->__data[$attrName] = $_param[0];
				}
			}
			
		}
		
		
		public function __get($k)
		{
			return $this->__data[$k];
		}
		
		
		private function __set($k, $v)
		{
			$this->__data[$k] = $v;
		}
		
		
		static public function getClassName()
		{
			return get_called_class();
		}
		
		
	}
	
}