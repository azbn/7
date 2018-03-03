<?

$items = array();

$items = $this->Azbn7->mdl('BP')->getUserTasks($this->Azbn7->mdl('Session')->is('user'));

$this->Azbn7->mdl('Viewer')
	->echo_dev(
		$items,
		true
	)
;