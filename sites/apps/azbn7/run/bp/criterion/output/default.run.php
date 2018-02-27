<?
/*
критерий
*/

if(is_array($param['data']['input']) && is_array($param['data']['process'])) {
	if(count($param['data']['input']) && count($param['data']['process'])) {
		
		if($param['data']['input']['created_at'] == $param['data']['process']['created_at']) {
			
			$this->Azbn7->mdl('BP')->stageSetCompletedAt($param['stage']);
			
			$this->Azbn7->mdl('BP')->createStageChildren($param['stage'], array(
				'input' => array(),
				'output' => array(),
				'param' => array(),
			));
			
			/*
			$this->Azbn7->mdl('BP')->createStage(array(
				'parent' => $param['stage']['id'],
				'bp' => $param['stage']['bp'],
				'stream' => $param['stage']['stream'],
				'input' => $this->Azbn7->getJSON(array(
					'prev_stage' => $param['stage']['id'],
				)),
				'output' => $this->Azbn7->getJSON(array(
					
				)),
				'param' => $this->Azbn7->getJSON(array(
					
				)),
			));
			*/
			
			
			//$this->Azbn7->mdl('Viewer')->echo_dev($param, true);
			
		}
		
	}
}

//$this->Azbn7->mdl('Viewer')->echo_dev($param, true);
