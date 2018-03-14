<?

if($this->Azbn7->mdl('DB')->use_redbeanphp) {
	
	/*
	var_dump($this->Azbn7->dmdl('ORM')->create('test_items', array(
		'name' => 'test',
		'version' => $this->Azbn7->created_at,
		't' => -1,
		'u' => -5,
		'a' => 12,
		//'r' => 15,
	)));
	*/
	
	var_dump($this->Azbn7->dmdl('ORM')->test());
	
} else {
	
	echo 'Enable RedBeanPHP in config!';
	
}