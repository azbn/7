<?

set_time_limit(0);

$this->Azbn7->mdl('Req')
	->addHeaders(array(
		'Cache-Control: private',
		'Content-Type: application/octet-stream',
		'Content-Disposition: attachment; filename="test.csv"',
		'Content-Transfer-Encoding: binary',
	));

if(!isset($this->Azbn7->mdl('Req')->data['headers_sended'])) {
	
	$this->Azbn7->mdl('Req')->genHeaders(true);
	
}

$output = fopen('php://output', 'w');

fputcsv($output, array(
	'ID',
	'NAME',
	'CREATED_AT',
), ';');

fputcsv($output, array(
	'0',
	'test',
	$this->Azbn7->created_at,
), ';');

fclose($output);

