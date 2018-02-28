<?

$e = new \Azbn_ru\Entities\Profiles\User($this->Azbn7);
$e->setSomeTestValue('1234');
$e->setSome2__TestValue2('12345');
$e->testValue = 987;

$this->Azbn7->mdl('Viewer')->echo_dev(
	$e,
	true
);