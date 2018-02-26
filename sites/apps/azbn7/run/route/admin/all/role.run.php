<?
// получение списка элементов

$this->Azbn7->mdl('Site')
	->render('admin/all/role', array(
		'items' => $this->Azbn7->mdl('DB')->read('role'),
	))
;