<?

$item = array();

$item = $this->Azbn7->mdl('BP')->bp($param[3]);

$this->Azbn7->mdl('Viewer')
	->echo_dev(
		$item,
		true
	)
;