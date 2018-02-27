<?


$this->Azbn7->mdl('Req')
	->addHeaders(array(
		'Access-Control-Allow-Origin: *',
		'Content-type: application/json; charset=' . $this->Azbn7->config['charset'],
	));

if(!isset($this->Azbn7->mdl('Req')->data['headers_sended'])) {
	
	$this->Azbn7->mdl('Req')->genHeaders(true);
	
}

$resp = array();

$items = $this->Azbn7->mdl('BP')->getWaitingStages(5);

if(count($items)) {
	foreach($items as $item) {
		
		$this->Azbn7->mdl('BP')->runStage($item['id']);
		
		$resp[] = $item['id'];
		
	}
}

echo $this->Azbn7->getJSON($resp);