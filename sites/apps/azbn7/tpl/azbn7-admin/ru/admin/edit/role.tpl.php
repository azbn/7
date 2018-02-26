<?
// Административный шаблон
?>

<h2 class="mt-2 mb-1" >Настройки роли</h2>

<form action="<?=$this->Azbn7->mdl('Site')->url('/admin/update/role/');?>" method="POST" >
	
	<?
	$this->Azbn7->mdl('Viewer')->tpl('_/editor/hidden', array(
		//'title' => 'Идентификатор параметра',
		'html' => ' id="" ',
		'name' => 'item[id]',
		'value' => $param['item']['id'],
		//'path' => 'entity',
	));
	?>
	
	<div class="row" >
		
		<div class="col-md-4" >
			
			<?
			$this->Azbn7->mdl('Viewer')->tpl('_/editor/input', array(
				'title' => 'Название',
				'html' => ' id="" ',
				'input_html' => ' data-need-upload-param="title" ',
				'name' => 'item[title]',
				'value' => $param['item']['title'],
				//'path' => 'entity',
			));
			?>
			
			<?
			$this->Azbn7->mdl('Viewer')->tpl('_/editor/input', array(
				'title' => 'Уникальный ID (англ.)',
				'html' => ' id="" ',
				'name' => 'item[uid]',
				'value' => $param['item']['uid'],
				//'path' => 'entity',
			));
			?>
			
		</div>
		
		<div class="col-md-4" >
			
		</div>
		
		<div class="col-md-4" >
			
			<?
			$this->Azbn7->mdl('Viewer')->tpl('_/editor/rights', array(
				'item' => $param['item'],
				'type' => 'user',
			));
			?>
			
		</div>
		
	</div>
	
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