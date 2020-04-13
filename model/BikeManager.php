<?php

require_once("model/Manager.php");
require_once("model/objects/Bike.php");

class BikeManager extends Manager {
	
	
	public function getElements(){
		$db = $this->dbConnect();
	    $req = $db->prepare('SELECT * FROM elements');
	    $req->execute();

		$elements = array();
		while ($elementReq = $req->fetch()) {
			$element = array(
				"type" => $elementReq["type"],
				"svg" => $elementReq["svg"]
			);

			$elements[$elementReq["name"]] = $element;
		}
		
    	return json_encode($elements);
	}

	public function getUserBikes(){
		$db = $this->dbConnect();
	    $req = $db->prepare('SELECT * FROM bikes WHERE user_id=?');
	    $req->execute(array(
    		$_SESSION["user_id"]
		));

		$bikes = array();
		while ($bike = $req->fetch()) {
			$bikes[] = new Bike($bike["id"],$bike["user_id"],$bike["data"]);
		}
		return $bikes;
	}

	public function getBike($id){
		$db = $this->dbConnect();
	    $req = $db->prepare('SELECT * FROM bikes WHERE id=?');
	    $req->execute(array(
    		$id
		));
		$bikeReq = $req->fetch();

    	return json_encode($bikeReq["data"]);
	}

	public function getBestBikes(){
		$db = $this->dbConnect();
	    $req = $db->prepare('SELECT * FROM bikes ORDER BY likes DESC LIMIT 10');
	    $req->execute();

		$bikes = array();
		while ($bike = $req->fetch()) {
			$bikes[] = new Bike($bike["id"],$bike["user_id"],$bike["data"],$bike["likes"]);
		}
		return $bikes;
	}

	public function saveBike($build){
		$db = $this->dbConnect();
	    $req = $db->prepare('INSERT INTO `bikes` (`user_id`,`data`) VALUES (:user_id, :data)');
		$req->execute(array(
			':user_id' => $_SESSION["user_id"],
			':data' => $build
		));
	}

	public function editBike($id, $build){
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE `bikes` SET data = :data WHERE (`id` = :id)');
		$req->execute(array(
			':id' => $id,
			':data' => $build
		));
	}
}