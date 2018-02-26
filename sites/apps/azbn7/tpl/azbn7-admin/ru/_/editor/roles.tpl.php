<?
// виджет

$roles = $this->Azbn7->mdl('DB')->read('role', '1 ORDER BY `id`');

if(count($roles)) {
?>

<div class="azbn-rights-list <? if($this->Azbn7->mdl('Session')->hasRight('user', 'site.' . $param['type'] . '.item.right.access')) {} else { echo 'azbn7-hidden'; } ?> " >
	
	<h4>Роли</h4>
	
	<hr />
	
	<?
	foreach($roles as $row) {
		
		$has_role = $this->Azbn7->mdl('Session')->hasRole($row['id'], $param['item']['id'], $param['type']);
		
	?>
	
	<div class="form-group " >
		<label><input type="checkbox" class="right-item-cb" name="role[<?=$row['id'];?>]" value='1' <?if($has_role) { echo 'checked';}?> /> <?=$row['title'];?></label>
	</div>
	
	<?
	}
	?>

	<div class="spacer" data-space="20" ></div>

</div>

<?
}
