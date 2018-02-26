<?


$item = $this->Azbn7->mdl('DB')->one('role', "id = '{$param[3]}'");

$item['right'] = $this->Azbn7->parseJSON($item['right']);
$item['param'] = $this->Azbn7->parseJSON($item['param']);

$this->Azbn7->mdl('Site')
	->render('admin/edit/role', array(
		'item' => $item,
	))
;