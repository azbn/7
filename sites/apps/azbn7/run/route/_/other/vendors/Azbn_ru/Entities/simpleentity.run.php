<?

$e = new \Azbn_ru\Entities\SimpleEntity($this->Azbn7);

$this->Azbn7->mdl('Viewer')->echo_dev(
	$e,
	true
);