<?

if(count($_POST['item'])) {
	
	$item = array(
		'parent' => $this->Azbn7->as_num($_POST['item']['parent']),
		'uid' => $this->Azbn7->c_s($_POST['item']['uid']),
		'title' => $this->Azbn7->c_s($_POST['item']['title']),
		'criterion_input' => $this->Azbn7->c_s($_POST['item']['criterion_input']),
		'criterion_output' => $this->Azbn7->c_s($_POST['item']['criterion_output']),
		'process' => $this->Azbn7->c_s($_POST['item']['process']),
		'param' => $this->Azbn7->getJSON(array(
			
		)),
	);
	
	$item['id'] = $this->Azbn7->mdl('DB')->create('bp', $item);
	
	if($item['id']) {
		
		$this->Azbn7->go2($this->Azbn7->mdl('Site')->url('/admin/edit/bp/' . $item['id'] . '/'));
		
	} else {
		
		$this->Azbn7->go2($this->Azbn7->mdl('Site')->url('/admin/all/bp/'));
		
	}
	
}
