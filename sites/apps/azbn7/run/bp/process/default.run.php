<?
/*
процесс
*/

$this->Azbn7->mdl('BP')->stageSetInProcess($param['stage'], 1);

//$this->Azbn7->mdl('Viewer')->echo_dev($param, true);

$param['data']['process'] = array(
	'process' => __FILE__,
	'created_at' => $this->Azbn7->created_at,
);

$this->Azbn7->mdl('BP')->stageSetInProcess($param['stage'], 0);