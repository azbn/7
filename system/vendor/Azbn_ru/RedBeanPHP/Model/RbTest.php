<?php

namespace Azbn_ru\RedBeanPHP\Model {
	
	class RbTest extends \RedBeanPHP\SimpleModel {
		
		//'update', 'open', 'delete', 'after_delete', 'after_update', 'dispense'
		//$this->bean
		
		public function open() {
			//var_dump(func_get_args());
			//echo __METHOD__;
		}
		
		public function dispense() {
			//var_dump(func_get_args());
			//echo __METHOD__;
		}
		
		public function update() {
			//var_dump(func_get_args());
			//echo __METHOD__;
		}
		
		public function after_update() {
			//var_dump(func_get_args());
			//echo __METHOD__;
		}
		
		public function delete() {
			//var_dump(func_get_args());
			//echo __METHOD__;
		}
		
		public function after_delete() {
			//var_dump(func_get_args());
			//echo __METHOD__;
		}
		
	}
	
}