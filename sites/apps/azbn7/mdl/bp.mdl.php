<?php

namespace app;

class BP
{
	public $event_prefix = '';//'app.mdl.bp';
	
	public function __construct()
	{
		$this->event_prefix = strtolower(str_replace('\\', '.', static::class));
	}
	
	public function bps()
	{
		
		$items = $this->Azbn7->mdl('DB')->read('bp');
		
		if(count($items)) {
			foreach($items as $item_index => $item) {
				$items[$item_index]['param'] = $this->Azbn7->parseJSON($item['param']);
			}
		}
		
		return $items;
		
	}
	
	public function bp($item_id = 0)
	{
		
		$res = null;
		
		$item = $this->Azbn7->mdl('DB')->one('bp', "`id` = '{$item_id}'");
		
		if($item['id']) {
			$item['param'] = $this->Azbn7->parseJSON($item['param']);
			$res = $item;
		}
		
		return $res;
		
	}
	
	public function stream($item_id = 0)
	{
		
		$res = null;
		
		$item = $this->Azbn7->mdl('DB')->one('bp_stream', "`id` = '{$item_id}'");
		
		if($item['id']) {
			$item['param'] = $this->Azbn7->parseJSON($item['param']);
			$res = $item;
		}
		
		return $res;
		
	}
	
	public function stage($item_id = 0)
	{
		
		$res = null;
		
		$item = $this->Azbn7->mdl('DB')->one('bp_stage', "`id` = '$item_id'");
		
		if($item['id']) {
			$item['input'] = $this->Azbn7->parseJSON($item['input']);
			$item['output'] = $this->Azbn7->parseJSON($item['output']);
			$item['param'] = $this->Azbn7->parseJSON($item['param']);
			$res = $item;
		}
		
		return $res;
		
	}
	
	public function load($item_id = 0)
	{
		
		$item = $this->bp($item_id);
		
	}
	
	public function createBP($item = array(
		/*
		'parent' => 0,
		'uid' => 'default',
		'title' => 'Бизнес-процесс по-умолчанию',
		'criterion_input' => 'default',
		'process' => 'default',
		'criterion_output' => 'default',
		'param' => $this->Azbn7->getJSON(array(
			
		)),
		*/
	))
	{
		return $this->Azbn7->mdl('DB')->create('bp', $item);
	}
	
	public function createStream($item = array(
		/*
		'parent' => 0,
		'created_at' => $this->Azbn7->created_at,
		'completed_at' => 0,
		'uid' => '',
		'title' => '',
		'param' => $this->Azbn7->getJSON(array(
			
		)),
		*/
	))
	{
		$item['uid'] = $this->Azbn7->mdl('Site')->genUID('bp');
		return $this->Azbn7->mdl('DB')->create('bp_stream', $item);
	}
	
	public function createStage($item = array(
		/*
		'bp' => 0,
		'stream' => 0,
		'created_at' => $this->Azbn7->created_at,
		'started_at' => 0,
		'stopped_at' => 0,
		'completed_at' => 0,
		'input' => $this->Azbn7->getJSON(array(
			
		)),
		'output' => $this->Azbn7->getJSON(array(
			
		)),
		'param' => $this->Azbn7->getJSON(array(
			
		)),
		*/
	))
	{
		$item['created_at'] = $this->Azbn7->created_at;
		return $this->Azbn7->mdl('DB')->create('bp_stage', $item);
	}
	
	public function runStage($item_id = 0)
	{
		
		$p = array();
		
		$p['stage'] = $this->stage($item_id);
		
		if($p['stage']['id']) {
			
			$p['bp'] = $this->bp($p['stage']['bp']);
			$p['stream'] = $this->stream($p['stage']['stream']);
			$p['data'] = array(
				'input' => array(),
				'process' => array(),
				'output' => array(),
			);
			
			if($p['bp']['criterion_input'] != '') {
				$this->Azbn7->run('app', 'bp/criterion/input/' . $p['bp']['criterion_input'], $p);
			}
			if($p['bp']['process'] != '') {
				$this->Azbn7->run('app', 'bp/process/' . $p['bp']['process'], $p);
			}
			if($p['bp']['criterion_output'] != '') {
				$this->Azbn7->run('app', 'bp/criterion/output/' . $p['bp']['criterion_output'], $p);
			}
			
		}
		
	}
	
	public function getWaitingStages($limit = 1)
	{
		
		return $this->Azbn7->mdl('DB')->read('bp_stage', "`completed_at` = '0' AND `in_process` = '0' ORDER BY `id` LIMIT $limit");
		
	}
	
	public function stageSetInProcess(&$stage = array(), $in_process = 0)
	{
		
		$this->Azbn7->mdl('DB')->update('bp_stage', array(
			'in_process' => $in_process,
		), "`id` = '{$stage['id']}'");
		
		$stage['in_process'] = $in_process;
		
		$time_mod = array();
		
		if($in_process) {
			$time_mod = array(
				'started_at' => $this->Azbn7->created_at,
				'stopped_at' => 0,
			);
		} else {
			$time_mod = array(
				'stopped_at' => $this->Azbn7->created_at,
			);
		}
		
		$this->Azbn7->mdl('DB')->update('bp_stage', $time_mod, "`id` = '{$stage['id']}'");
		
	}
	
	public function stageSetCompletedAt(&$stage = array())
	{
		
		$this->Azbn7->mdl('DB')->update('bp_stage', array(
			'completed_at' => $this->Azbn7->created_at,
		), "`id` = '{$stage['id']}'");
		
		$stage['completed_at'] = $this->Azbn7->created_at;
		
	}
	
	public function createStageChildren($stage = array(), $data = array(
		'input' => array(),
		'output' => array(),
		'param' => array(),
	))
	{
		
		$bps = $this->Azbn7->mdl('DB')->read('bp', "`parent` = '{$stage['bp']}'");
		
		if(count($bps)) {
			foreach($bps as $bp) {
				
				$this->createStage(array(
					'parent' => $stage['id'],
					'bp' => $bp['id'],
					'stream' => $stage['stream'],
					'input' => $this->Azbn7->getJSON($data['input']),
					'output' => $this->Azbn7->getJSON($data['output']),
					'param' => $this->Azbn7->getJSON($data['param']),
				));
				
			}
		}
		
	}
	
}