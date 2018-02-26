<?

if(count($_POST['item'])) {
	
	$item_id = $this->Azbn7->as_num($_POST['item']['id']);
	
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
	
	$this->Azbn7->mdl('DB')->update('role', $item, "id = '{$item_id}'");
	
	$this->Azbn7->go2($this->Azbn7->mdl('Site')->url('/admin/edit/role/' . $item_id . '/'));
	
}
