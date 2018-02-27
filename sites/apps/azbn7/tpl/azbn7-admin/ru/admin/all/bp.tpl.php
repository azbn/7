<?
// Административный шаблон
?>

<h2 class="mt-2 mb-1" >
	
	Бизнес-процессы
	
	<div class="float-sm-right item-base-functions" >
		
		<?
		if($this->Azbn7->mdl('Session')->hasRight('user', 'site.bp.item.create')) {
		?>
		<a href="<?=$this->Azbn7->mdl('Site')->url('/admin/add/bp/');?>" ><i class="fas fa-plus-circle" title="Создать запись" ></i></a>
		<?
		}
		?>
		
	</div>
	
</h2>


<?
//$entity_type = $this->Azbn7->mdl('DB')->read('entity_type');
$bp_h = $this->Azbn7->mdl('Site')->buildHierarchy($param['items']);

$this->Azbn7->mdl('Viewer')->tpl('_/hierarchy/list_bp', array(
	'html' => 'class="list-entity-type " id="" ',
	'hierarchy' => $bp_h,
	'start_index' => 0,
	'hide_zero' => 1,
));
?>