<?php

namespace Azbn_ru\RedBeanPHP\Model {
	
	class \Test extends \RedBeanPHP\SimpleModel {
		
		public function open() {
			//global $lifeCycle;
			//$lifeCycle .= "called open: ".$this->id;
			//$this->bean->note
			var_dump($this->bean);
		}
		public function dispense() {
			var_dump($this->bean);
		}
		public function update() {
			var_dump($this->bean);
		}
		public function after_update() {
			var_dump($this->bean);
		}
		
		/*
		public function update() {
			if(strlen($this->bean->note) < 4) {
				die('Note is too short!');
			}
		}
		*/
	}
	
}