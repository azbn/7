<?

echo $this->Azbn7->mdl('BP')->createBP(array(
	'uid' => md5($this->Azbn7->created_at),
	'title' => 'Бизнес-процесс ' . $this->Azbn7->created_at,
	'criterion_input' => $this->Azbn7->created_at,
	'process' => $this->Azbn7->created_at,
	'criterion_output' => $this->Azbn7->created_at,
	'param' => $this->Azbn7->getJSON(array(
		
	)),
));