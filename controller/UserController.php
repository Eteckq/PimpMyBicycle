<?php

require_once('model/UserManager.php');
require_once('model/BikeManager.php');
require_once('DefaultController.php');

class UserController extends DefaultController {
	private $userManager;
	private $bikeManager;

	function __construct(){
		$this->bikeManager = new BikeManager();
		$this->userManager = new UserManager();
	}

	function home(){
		$account = $this->userManager->getSelfUser();
		require('view/shared/home.php');
	}

	function login(){
		require('view/guest/pages/login.php');
	}

	function bikes(){
		$bikes = $this->bikeManager->getBestBikes();
		require('view/shared/bikes.php');
	}

	function editor(){
		$userBikes = $this->bikeManager->getUserBikes();
		require('view/user/pages/editor.php');
	}

	function getElements(){
		header('Content-type: application/json');
		echo $this->bikeManager->getElements();
	}

	function getBike($id){
		header('Content-type: application/json');
		echo $this->bikeManager->getBike($id);
	}

	function editBike($id, $build){
		$this->bikeManager->editBike($id, $build);
	}

	function saveBike($build){
		$this->bikeManager->saveBike($build);
	}

	function viewBike($id){
		$build = $this->bikeManager->getBike($id);
		require('view/shared/bike.php');
	}
}