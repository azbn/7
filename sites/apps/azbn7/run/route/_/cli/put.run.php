<?

if(($stream = fopen('php://input', 'r')) !== FALSE) {
	
	$data_str = stream_get_contents($stream);
	
	if($data_str != '') {
		
		$data = $this->Azbn7->parseJSON($data_str);
		
		var_dump($data);
		
	}
	
}