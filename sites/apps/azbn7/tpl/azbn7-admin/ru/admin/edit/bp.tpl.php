<?
// Административный шаблон
?>

<?
//echo $tpl_uid;
?>

<h2 class="mt-2 mb-1" >Редактирование типа данных</h2>

<form action="<?=$this->Azbn7->mdl('Site')->url('/admin/update/bp/');?>" method="POST" >
	
	<?
	$this->Azbn7->mdl('Viewer')->tpl('_/editor/hidden', array(
		//'title' => 'Идентификатор параметра',
		'html' => ' id="" ',
		'name' => 'item[id]',
		'value' => $param['item']['id'],
		//'path' => 'entity',
	));
	?>
	
	<?
	$this->Azbn7->mdl('Viewer')->tpl('_/editor/input', array(
		'title' => 'Название',
		'html' => ' id="" ',
		'name' => 'item[title]',
		'value' => $param['item']['title'],
		//'path' => 'entity',
	));
	?>
	
	<?
	$this->Azbn7->mdl('Viewer')->tpl('_/editor/input', array(
		'title' => 'Уникальный ID',
		'html' => ' id="" ',
		'name' => 'item[uid]',
		'value' => $param['item']['uid'],
		//'path' => 'entity',
	));
	?>
	
	<?
	$bp = $this->Azbn7->mdl('DB')->read('bp');
	$bp_h = $this->Azbn7->mdl('Site')->buildHierarchy($bp);

	$this->Azbn7->mdl('Viewer')->tpl('_/hierarchy/select', array(
		'title' => 'Родительский процесс',
		'html' => ' id="" ',
		'name' => 'item[parent]',
		'value' => $param['item']['parent'],
		'hierarchy' => $bp_h,
		'start_index' => 0,
	));
	?>
	
	<?
	$this->Azbn7->mdl('Viewer')->tpl('_/hierarchy/select_run_file', array(
		'title' => 'Критерий входа',
		'html' => ' id="" ',
		'name' => 'item[criterion_input]',
		'value' => $param['item']['criterion_input'],
		'path' => '/../../../../../run/bp/criterion/input'
		//'path' => 'entity',
	));
	?>
	
	<?
	$this->Azbn7->mdl('Viewer')->tpl('_/hierarchy/select_run_file', array(
		'title' => 'Критерий выхода',
		'html' => ' id="" ',
		'name' => 'item[criterion_output]',
		'value' => $param['item']['criterion_output'],
		'path' => '/../../../../../run/bp/criterion/output'
		//'path' => 'entity',
	));
	?>
	
	<?
	$this->Azbn7->mdl('Viewer')->tpl('_/hierarchy/select_run_file', array(
		'title' => 'Основной рабочий процесс',
		'html' => ' id="" ',
		'name' => 'item[process]',
		'value' => $param['item']['process'],
		'path' => '/../../../../../run/bp/process'
		//'path' => 'entity',
	));
	?>
	
	<?
	$this->Azbn7->mdl('Viewer')->tpl('_/editor/submit', array(
		'title' => 'Обновить',
		'html' => '',
		//'name' => 'item[value]',
		//'value' => '',
		//'path' => 'entity',
	));
	?>
	
</form>
