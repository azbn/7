<?
// Административный шаблон
?>

<h2 class="mt-2 mb-1" >Создание роли</h2>

<form action="<?=$this->Azbn7->mdl('Site')->url('/admin/create/role/');?>" method="POST" >
	
	<div class="row" >
		
		<div class="col-md-4" >
			
			<?
			$this->Azbn7->mdl('Viewer')->tpl('_/editor/input', array(
				'title' => 'Название',
				'html' => ' id="" ',
				'input_html' => ' data-need-upload-param="title" ',
				'name' => 'item[title]',
				'value' => '',
				//'path' => 'entity',
			));
			?>
			
			<?
			$this->Azbn7->mdl('Viewer')->tpl('_/editor/input', array(
				'title' => 'Уникальный ID (англ.)',
				'html' => ' id="" ',
				'name' => 'item[uid]',
				'value' => '',
				//'path' => 'entity',
			));
			?>
			
		</div>
		
		<div class="col-md-4" >
			
		</div>
		
		<div class="col-md-4" >
			
			<?
			$this->Azbn7->mdl('Viewer')->tpl('_/editor/rights', array(
				'item' => array('right' => array()),
				'type' => 'user',
			));
			?>
			
		</div>
		
	</div>
	
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