<?

$default = array(
	'max_int' => $this->Azbn7->config['mysql'][0]['max_value']['int'],
	'max_bigint' => $this->Azbn7->config['mysql'][0]['max_value']['bigint'],
);

if(count($this->Azbn7->mdl('DB')->t)) {
	
	
	/* ---------- ext__event ---------- */
	$this->Azbn7
		->mdl('Ext')
			->event($this->event_prefix . '.app.run.route.install.bp.before')
	;
	/* --------- /ext__event ---------- */
	
	
	$this->Azbn7->mdl('DB')
		
		->exec("CREATE TABLE IF NOT EXISTS `" . $this->Azbn7->mdl('DB')->t['bp'] . "` (
				`id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`parent` BIGINT DEFAULT '0',
				`uid` VARCHAR(255) NOT NULL UNIQUE,
				`title` VARCHAR(255) DEFAULT '',
				`criterion_input` VARCHAR(255) DEFAULT '',
				`criterion_output` VARCHAR(255) DEFAULT '',
				`process` VARCHAR(255) DEFAULT '',
				`param` MEDIUMBLOB DEFAULT NULL,
				INDEX uid_index (uid(64))
			) ENGINE=" . $this->Azbn7->mdl('DB')->engine . " DEFAULT CHARSET=" . $this->Azbn7->mdl('DB')->charset . ";
		")
		
		->exec("CREATE TABLE IF NOT EXISTS `" . $this->Azbn7->mdl('DB')->t['bp_stream'] . "` (
				`id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`created_at` BIGINT DEFAULT '0',
				`completed_at` BIGINT DEFAULT '0',
				`parent` BIGINT DEFAULT '0',
				`uid` VARCHAR(255) NOT NULL UNIQUE,
				`title` VARCHAR(255) DEFAULT '',
				`param` MEDIUMBLOB DEFAULT NULL,
				INDEX uid_index (uid(64))
			) ENGINE=" . $this->Azbn7->mdl('DB')->engine . " DEFAULT CHARSET=" . $this->Azbn7->mdl('DB')->charset . ";
		")
		
		->exec("CREATE TABLE IF NOT EXISTS `" . $this->Azbn7->mdl('DB')->t['bp_stage'] . "` (
				`id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`in_process` INT DEFAULT '0',
				`parent` BIGINT DEFAULT '0',
				`bp` BIGINT DEFAULT '0',
				`stream` BIGINT DEFAULT '0',
				`created_at` BIGINT DEFAULT '0',
				`started_at` BIGINT DEFAULT '0',
				`stopped_at` BIGINT DEFAULT '0',
				`completed_at` BIGINT DEFAULT '0',
				`input` MEDIUMBLOB DEFAULT NULL,
				`output` MEDIUMBLOB DEFAULT NULL,
				`param` MEDIUMBLOB DEFAULT NULL
			) ENGINE=" . $this->Azbn7->mdl('DB')->engine . " DEFAULT CHARSET=" . $this->Azbn7->mdl('DB')->charset . ";
		")
		
		->exec("CREATE TABLE IF NOT EXISTS `" . $this->Azbn7->mdl('DB')->t['bp_task'] . "` (
				`id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`stream` BIGINT DEFAULT '0',
				`created_at` BIGINT DEFAULT '0',
				`completed_at` BIGINT DEFAULT '0',
				`from_user` BIGINT DEFAULT '0',
				`to_user` BIGINT DEFAULT '0',
				`title` VARCHAR(255) DEFAULT '',
				`content` MEDIUMTEXT DEFAULT NULL,
				`input` MEDIUMBLOB DEFAULT NULL,
				`output` MEDIUMBLOB DEFAULT NULL,
				`param` MEDIUMBLOB DEFAULT NULL
			) ENGINE=" . $this->Azbn7->mdl('DB')->engine . " DEFAULT CHARSET=" . $this->Azbn7->mdl('DB')->charset . ";
		")
		
	;
	
	
	$this->Azbn7->mdl('DB')->create('right', array('uid' => 'site.bp.all.access', 'title' => 'Доступ к бизнес-процессам'));
	$this->Azbn7->mdl('DB')->create('right', array('uid' => 'site.bp.item.create', 'title' => 'Добавление бизнес-процессов'));
	$this->Azbn7->mdl('DB')->create('right', array('uid' => 'site.bp.item.update', 'title' => 'Изменение бизнес-процессов'));
	$this->Azbn7->mdl('DB')->create('right', array('uid' => 'site.bp.item.delete', 'title' => 'Удаление бизнес-процессов'));
	
	$this->Azbn7->mdl('DB')->create('right', array('uid' => 'site.bp_task.all.access', 'title' => 'Доступ ко всем задачам процессов'));
	
	/*
	$this->Azbn7->mdl('DB')->create('right', array('uid' => 'site.bp_stream.all.access', 'title' => 'Доступ к потокам бизнес-процессов'));
	$this->Azbn7->mdl('DB')->create('right', array('uid' => 'site.bp_stream.item.create', 'title' => 'Добавление потоков бизнес-процессов'));
	$this->Azbn7->mdl('DB')->create('right', array('uid' => 'site.bp_stream.item.update', 'title' => 'Изменение потоков бизнес-процессов'));
	$this->Azbn7->mdl('DB')->create('right', array('uid' => 'site.bp_stream.item.delete', 'title' => 'Удаление потоков бизнес-процессов'));
	
	$this->Azbn7->mdl('DB')->create('right', array('uid' => 'site.bp_stage.all.access', 'title' => 'Доступ к стадиям бизнес-процессов'));
	$this->Azbn7->mdl('DB')->create('right', array('uid' => 'site.bp_stage.item.create', 'title' => 'Добавление стадий бизнес-процессов'));
	$this->Azbn7->mdl('DB')->create('right', array('uid' => 'site.bp_stage.item.update', 'title' => 'Изменение стадий бизнес-процессов'));
	$this->Azbn7->mdl('DB')->create('right', array('uid' => 'site.bp_stage.item.delete', 'title' => 'Удаление стадий бизнес-процессов'));
	*/
	
	$this->Azbn7->mdl('DB')->create('bp', array(
		/*
		'created_at' =>$this->Azbn7->created_at,
		'completed_at' => 0,
		*/
		'parent' => 0,
		'uid' => 'default',
		'title' => 'Бизнес-процесс по-умолчанию',
		'criterion_input' => 'default',
		'process' => 'default',
		'criterion_output' => 'default',
		'param' => $this->Azbn7->getJSON(array(
			
		)),
	));
	
	$this->Azbn7->mdl('Site')
		->log('site.db.create_bp_tables', array(
			
		))
	;
	
	$this->Azbn7->event(array(
		'action' => $this->event_prefix . '.app.run.route.install.bp.after',
		'title' => 'Установка таблиц процессов базы данных MySQL',
	));
	
	
	/* ---------- ext__event ---------- */
	$this->Azbn7
		->mdl('Ext')
			->event($this->event_prefix . '.app.run.route.install.bp.after')
	;
	/* --------- /ext__event ---------- */
	
	
	$this->Azbn7->go2($this->Azbn7->mdl('Site')->url('/установлено/'));
	
}