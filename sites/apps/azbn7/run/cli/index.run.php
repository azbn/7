<?
/*
основной код консоли
*/

$c_res = $this->Azbn7->mdl('Cli')->cli_process(array(
	'app' => (AZBN7__IS_WIN ? 'dir' : 'ls -la'),
	'param' => array(
		/*
		'input=',
		'output=',
		'data=' . base64_encode($this->Azbn7->getJSON($param)),
		*/
	),
));

$param[__FILE__] = $c_res;

var_dump($param);

/*
if($result != '') {
	
	if (!file_exists('.'.$result)) {
		Header('HTTP/1.0 404 Not Found');
		exit;
	} elseif($param['item_id']['id']) {
			set_time_limit(0);
			
			$this->FE->PluginMng->event('cms:item_id:after_select', $param);
			
			//$this->FE->DB->dbUpdate($this->FE->DB->dbtables['t_'.$param['req_arr']['cont']],'clicked=clicked+1',"WHERE id='{$id}'");
			Header('Cache-Control: private');
			Header('Content-Type: application/octet-stream');
			//Header('Content-Disposition: attachment; filename="'.$param['item_id']['title'].'"');
			//header('Content-Length: '.$param['item_id']['size']);
			Header('Content-Transfer-Encoding: binary');
			//Header('Accept-Ranges: bytes');
			readfile('.'.$result);
	}
	
} else {
	
}
*/