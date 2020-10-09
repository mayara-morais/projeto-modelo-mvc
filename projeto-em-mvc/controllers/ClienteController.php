<?php

namespace app\controllers;
use app\core\Controller;
use app\models\M_Cliente;

class ClienteController extends Controller{

	public function lista(){
		$cliente = new M_cliente;
		$dados["clientes"] =  $cliente->lista();
		$this->load("v_cliente", $dados);
	}

	public function ver(){
		$dados["nome"] = "Manoel Jailton";
		$dados["email"] = "mjailton@gmail.com";
		$this->load("v_cliente",$dados);
	}

}

?>