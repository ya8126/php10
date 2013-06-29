<?php
	require_once 'Auth/Auth.php';

	function myLogin(){
		require_once 'login.php';
	}
	
	$params = array(
		'dsn' => 'mysqli://phpusr:phppass@localhost/php10',
		'table' => 'schedule_usr',
		'usernamecol' => 'uid',
		'passwordcol' => 'passwd'
	);
	
	$auth = new Auth('MDB2', $params, 'myLogin');
	$auth->start();
	if (!$auth->checkAuth()){
		die();
	}
