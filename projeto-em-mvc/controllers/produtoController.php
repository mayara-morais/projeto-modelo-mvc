<?php

namespace app\controllers;
use app\core\Controller;

class ProdutoController extends Controller{

	public function index(){
		echo "Método index";
	}

	public function lista($valor=10){
		echo "estou listando os produtos".$valor;
	}

	public function ver(){
		$this->load("v_produto");
	}

}

?>