<?php

class Manager {

	protected function dbConnect(){
		$db = new PDO('mysql:host=localhost;dbname=pmb;charset=utf8', 'root', 'root');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $db;
	}
	
	//TODO
	public function getSelfUser(){
		$db = $this->dbConnect();
	    $req = $db->prepare('SELECT * FROM users WHERE id=?');
	    $req->execute(array(
    		$_SESSION['user_id']
    	));
    	return $req->fetch();
	}

	public function getUserFromPseudo($pseudo){

		$db = $this->dbConnect();
	    $req = $db->prepare('SELECT * FROM users WHERE pseudo=?');
	    $req->execute(array(
    		$pseudo
    	));
		$user = $req->fetch();
	    return $user;
	}

}