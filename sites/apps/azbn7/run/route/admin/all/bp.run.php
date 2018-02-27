<?
// получение списка элементов

$this->Azbn7->mdl('Site')
	->render('admin/all/bp', array(
		'items' => $this->Azbn7->mdl('DB')->read('bp'),
	))
;