<?php

namespace Azbn_ru\RedBeanPHP\Model {
	
	class Model_Test extends \RedBean_SimpleModel {
		
		public function update() {
			if(strlen( $this->bean->note ) < 4) {
				die('Note is too short!');
			}
		}
		
	}
	
}