<?

$items = array();
//$items = $this->Azbn7->mdl('DB')->read('entity', "visible = '10' AND type IN ($types) ORDER BY id DESC");

$items = $this->Azbn7->mdl('BP')->bps();

$this->Azbn7->mdl('Viewer')
	->echo_dev(
		$items,
		true
	)
;