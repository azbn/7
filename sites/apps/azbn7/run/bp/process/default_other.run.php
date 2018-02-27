<?
/*
процесс
*/

$this->Azbn7->mdl('BP')->stageSetInProcess($param['stage'], 1);

//$this->Azbn7->mdl('Viewer')->echo_dev($param, true);

$this->Azbn7->mdl('BP')->stageSetInProcess($param['stage'], 0);
