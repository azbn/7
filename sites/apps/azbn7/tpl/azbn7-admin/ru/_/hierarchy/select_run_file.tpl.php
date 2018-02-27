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

$func = function($basedir = '', $dir = '', $adir = '', $value = '') use (&$func) {
	
	$fp = opendir($basedir . $dir);
	
	while($cv_file = readdir($fp)) {
		
		$_file = $dir . '/' . $cv_file;
		
		if(is_file($basedir . $_file)) {
			
			$sub_filename = $adir . '/' . $cv_file;
			
			if($sub_filename[0] == '/') {
				$sub_filename = substr($sub_filename, 1);
			}
			
			$sub_filename = strtr($sub_filename, array('.run.php' => ''));
			
			$_sub_filename_wp_admin = substr($sub_filename, 0, 8);
			
			//if($_sub_filename_wp_admin != 'admin' && substr($sub_filename, 0, 1) != '_') {//$_sub_filename_wp_admin != 'wp-admin' && substr($sub_filename, 0, 1) != '_'
			if(1) {
				
				?>
				
				<option value="<?=$sub_filename;?>" <? if($value == $sub_filename) {echo 'selected';}?> data-value="<?=$value;?>" ><?=$sub_filename;?></option>
				
				<?
				
			}
			
		} elseif ($cv_file != '.' && $cv_file != '..' && $cv_file != 'admin' && is_dir($basedir .$dir . '/' . $cv_file)) {
			
			$func($basedir, $_file, $adir . '/' . $cv_file, $value);
			
		}
	}
	
	closedir($fp);
	
}
;

//if(count($param['hierarchy']) && count($param['hierarchy']['items'])) {
	?>
	
<div class="form-group " <?=$param['html'];?> >
	
	<?
	if(isset($param['title'])) {
	?>
	<label><?=$param['title'];?></label>
	<?
	}
	?>
	
	<select class="form-control" name="<?=isset($param['name']) ? $param['name'] : '';?>" data-select-value="<?=isset($param['value']) ? $param['value'] : '';?>" >
		<?
		$param['hide_zero'] = isset($param['hide_zero']) ? $param['hide_zero'] : 0;
		if($param['hide_zero']) {
			
		} else {
		?>
		<option value="" data-uid="" >Без файла</option>
		<?
		}
		?>
		<?
		/*
		if(count($param['hierarchy']['tree'][$param['start_index']])) {
			foreach($param['hierarchy']['tree'][$param['start_index']] as $k => $v) {
				$func($param['hierarchy'], $k);
			}
		}
		*/
		
		$func(__DIR__, $param['path'], '', $param['value']);
		
	?>
	</select>
</div>
	
	<?
//}

?>