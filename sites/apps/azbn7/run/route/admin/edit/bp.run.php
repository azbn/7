<?


$item = $this->Azbn7->mdl('DB')->one('bp', "id = '{$param[3]}'");

$item['param'] = $this->Azbn7->parseJSON($item['param']);

$this->Azbn7->mdl('Site')
	->render('admin/edit/bp', array(
		'item' => $item,
	))
;