<?

echo $this->Azbn7->mdl('BP')->createStream(array(
	'created_at' => $this->Azbn7->created_at,
	'completed_at' => 0,
	'uid' => 'stream_' . $this->Azbn7->created_at,
	'title' => 'Тестовый bp_stream ' . $this->Azbn7->created_at,
	'param' => $this->Azbn7->getJSON(array(
		
	)),
));