<?php

require_once('model/ConnectionManager.php');

class ConnectionController {

	private $connectionManager;

	function __construct(){
		$this->connectionManager = new ConnectionManager();
	}

	function login(){
		require('view/guest/pages/login.php');
	}

	function register(){
		require('view/guest/pages/register.php');
	}

	function connect($pseudo, $password, $remember){
        if($this->connectionManager->connect($pseudo, $password, $remember)){
			header('Location: /');
		} else {
			header('Location: /?page=login&error');
		}
	}

	function create($pseudo, $password){
        if($this->connectionManager->createAccount($pseudo, $password)){
            $this->connect($pseudo, $password, true);
        } else {
            header('Location: /?page=register&error');
        }
        
	}

}