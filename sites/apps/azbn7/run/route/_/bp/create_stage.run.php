<?

echo $this->Azbn7->mdl('BP')->createStage(array(
	'bp' => 1,
	'stream' => 1,
	'created_at' => $this->Azbn7->created_at,
	'started_at' => 0,
	'stopped_at' => 0,
	'completed_at' => 0,
	'input' => $this->Azbn7->getJSON(array(
		'test' => 1,
	)),
	'output' => $this->Azbn7->getJSON(array(
		'test' => 2,
	)),
	'param' => $this->Azbn7->getJSON(array(
		'test' => 3,
	)),
));