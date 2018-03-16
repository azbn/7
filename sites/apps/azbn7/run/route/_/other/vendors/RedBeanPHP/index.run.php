<?

if($this->Azbn7->mdl('DB')->use_redbeanphp) {
	
	$test = $this->Azbn7->dmdl('ORM')->create('test', array(
		'name' => 'test',
		'version' => $this->Azbn7->created_at,
		't' => -1,
		'u' => -5,
		'a' => 12,
		/*
		'q' => array(
			's' => 'fsdfsd',
			'q' => 'fsdfgdsdfh',
			'y' => 34,
		),
		*/
		//'r' => 15,
	));
	
	var_dump($test->getMeta('type'));
	
	//var_dump($this->Azbn7->dmdl('ORM')->test());
	
} else {
	
	echo 'Enable RedBeanPHP in config!';
	
}