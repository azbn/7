<?

if(count($_POST['item'])) {
	
	$rights = array();
	if(count($_POST['item']['right'])) {
		foreach($_POST['item']['right'] as $uid => $value) {
			$value = $this->Azbn7->as_int($value);
			if($value) {
				$rights[$uid] = $value;
			}
		}
	}
	
	$item = array(
		'uid' => $this->Azbn7->c_s($_POST['item']['uid']),
		'title' => $this->Azbn7->c_s($_POST['item']['title']),
		'right' => $this->Azbn7->getJSON($rights),
	);
	
	$item['id'] = $this->Azbn7->mdl('DB')->create('role', $item);
	
	if($item['id']) {
		
		$this->Azbn7->go2($this->Azbn7->mdl('Site')->url('/admin/all/role/'));
		
	} else {
		
		$this->Azbn7->go2($this->Azbn7->mdl('Site')->url('/admin/add/role/'));
		
	}
	
}
