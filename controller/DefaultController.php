<?php

class DefaultController {

	function home(){
		require('view/shared/home.php');
	}

	function faq(){
		require('view/shared/faq.php');
	}

	function bikes(){
		require('view/shared/bikes.php');
	}

	function about(){
		require('view/shared/about.php');
	}

}