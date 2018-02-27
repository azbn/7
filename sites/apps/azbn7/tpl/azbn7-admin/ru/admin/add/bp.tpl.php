<?
// Административный шаблон
?>

<?
//echo $tpl_uid;
?>

<h2 class="mt-2 mb-1" >Создание бизнес-процесса</h2>

<form action="<?=$this->Azbn7->mdl('Site')->url('/admin/create/bp/');?>" method="POST" >
	
	<?
	$this->Azbn7->mdl('Viewer')->tpl('_/editor/input', array(
		'title' => 'Название',
		'html' => ' id="" ',
		'name' => 'item[title]',
		'value' => '',
		//'path' => 'entity',
	));
	?>
	
	<?
	$this->Azbn7->mdl('Viewer')->tpl('_/editor/input', array(
		'title' => 'Уникальный ID',
		'html' => ' id="" ',
		'name' => 'item[uid]',
		'value' => $this->Azbn7->randstr(16),
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
		'value' => $this->Azbn7->randstr(16),
		'hierarchy' => $bp_h,
		'start_index' => 0,
	));
	?>
	
	<?
	$this->Azbn7->mdl('Viewer')->tpl('_/hierarchy/select_run_file', array(
		'title' => 'Критерий входа',
		'html' => ' id="" ',
		'name' => 'item[criterion_input]',
		'value' => 'default',
		'path' => '/../../../../../run/bp/criterion/input'
		//'path' => 'entity',
	));
	?>
	
	<?
	$this->Azbn7->mdl('Viewer')->tpl('_/hierarchy/select_run_file', array(
		'title' => 'Критерий выхода',
		'html' => ' id="" ',
		'name' => 'item[criterion_output]',
		'value' => 'default',
		'path' => '/../../../../../run/bp/criterion/output'
		//'path' => 'entity',
	));
	?>
	
	<?
	$this->Azbn7->mdl('Viewer')->tpl('_/hierarchy/select_run_file', array(
		'title' => 'Основной рабочий процесс',
		'html' => ' id="" ',
		'name' => 'item[process]',
		'value' => 'default',
		'path' => '/../../../../../run/bp/process'
		//'path' => 'entity',
	));
	?>
	
	<?
	$this->Azbn7->mdl('Viewer')->tpl('_/editor/submit', array(
		'title' => 'Создать',
		'html' => '',
		//'name' => 'item[value]',
		//'value' => '',
		//'path' => 'entity',
	));
	?>
	
</form>