<?
/*
критерий
*/

$i = rand(0, 10000) % 2;

if($i == 1) {
	
} else {
	$param['bp']['process'] = 'default_other';
}

$param['data']['input'] = array(
	'criterion_input' => __FILE__,
	'created_at' => $this->Azbn7->created_at,
);

//$this->Azbn7->mdl('Viewer')->echo_dev($param, true);
