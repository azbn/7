<?

echo $this->Azbn7->mdl('BP')->createTask(array(
	'stream' => 1,
	'from_user' => 1,
	'to_user' => 2,
	'title' => 'Тестовая задача',
	'content' => 'Описание тестовой задачи',
	'input' => $this->Azbn7->getJSON(array(
		'test' => 1,
	)),
	'output' => $this->Azbn7->getJSON(array(
		
	)),
	'param' => $this->Azbn7->getJSON(array(
		'test' => 3,
	)),
));