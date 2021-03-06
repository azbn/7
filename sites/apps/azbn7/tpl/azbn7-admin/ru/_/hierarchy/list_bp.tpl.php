<?
// footer сайта

/*
$param = array(
	'html' => 'class="" id=""',
	'hierarchy' => array(
		'items' => array(),
		'tree' => array(),
	),
	'start_index' => 0,
)
*/

//$func_name = 'showItemWithChildren_' . $tpl_uid;

$func = function(&$catalog, $item_id, $tab = '') use (&$func) {//$tab = "&nbsp; "
	?>
	<li value="<?=$catalog['items'][$item_id]['id'];?>" data-uid="<?=$catalog['items'][$item_id]['uid'];?>" >
		<div class="float-sm-right entity-type__list-item" >
			
			<?
			if($this->Azbn7->mdl('Session')->hasRight('user', 'site.bp.item.delete')) {
			?>
			<a href="<?=$this->Azbn7->mdl('Site')->url('/admin/delete/bp/' . $catalog['items'][$item_id]['id'] . '/');?>" class="delete-confirm " title="Удалить процесс" ><i class="fas fa-times" ></i></a>
			<?
			}
			?>
			
			<?
			if($this->Azbn7->mdl('Session')->hasRight('user', 'site.bp.item.update')) {
			?>
			<a href="<?=$this->Azbn7->mdl('Site')->url('/admin/edit/bp/' . $catalog['items'][$item_id]['id'] . '/');?>" title="Редактировать процесс" ><i class="fas fa-pen-square" ></i></a>
			<?
			}
			?>
			
		</div>
		<?=$tab.$catalog['items'][$item_id]['title'];?>
	<?
	if(count($catalog['tree'][$item_id])) {
		?>
		<ul >
		<?
		foreach($catalog['tree'][$item_id] as $k => $v) {
			?>
			<?
			$func($catalog, $k, '');//$tab.'- '
			?>
			<?
		}
		?>
		</ul>
		<?
	}
	?>
	</li>
	<?
};

if(count($param['hierarchy']) && count($param['hierarchy']['items'])) {
	?>
	<ul <?=$param['html'];?> >
	<?
	if(count($param['hierarchy']['tree'][$param['start_index']])) {
		foreach($param['hierarchy']['tree'][$param['start_index']] as $k => $v) {
			$func($param['hierarchy'], $k);
		}
	}
	?>
	</ul>
	<?
}

?>