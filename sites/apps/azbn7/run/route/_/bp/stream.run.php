<?

$item = array();

$item = $this->Azbn7->mdl('BP')->stream($param[3]);

$this->Azbn7->mdl('Viewer')
	->echo_dev(
		$item,
		true
	)
;