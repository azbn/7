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
		
		$item = $this->Azbn7->mdl('DB')->one('bp_stage', "`id` = '{$item_id}'");
		
		if($item['id']) {
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
		'created_at' => $this->Azbn7->created_at,
		'completed_at' => 0,
		'uid' => '',
		'title' => '',
		'param' => $this->Azbn7->getJSON(array(
			
		)),
		*/
	))
	{
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
		return $this->Azbn7->mdl('DB')->create('bp_stage', $item);
	}
	
	public function runStage($item_id = 0)
	{
		
		$stage = $this->stage($item_id);
		
		if($stage['id']) {
			
			$bp = $this->bp($stage['bp']);
			$stream = $this->stream($stage['stream']);
			
		}
		
	}
	
}