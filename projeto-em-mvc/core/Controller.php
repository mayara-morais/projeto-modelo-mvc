<?php

namespace app\core;

class Controller{

	public function load($viewName, $viewDados = array()){
		extract($viewDados); 
		echo "<pre>";
		print_r($viewDados);
		include "app/views/".$viewName.".php";
	}
}