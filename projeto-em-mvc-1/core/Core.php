<?php


class Core{

	private $controler; // nome do arquivo do controlador
	private $metodo; // nome do método do arquivo de controlador
	private $parametros = array();

	public function __construct(){ // quando o objeto for instanciado
		$this->verificaURI();
	}

	public function run(){
		$controllerCorrente = $this->getController();

		//echo $controllerCorrente;

		$c = new $controllerCorrente(); 

		call_user_func_array(array($c,$this->getMetodo()), $this->getParametros());
	}

	public function verificaURI(){ /* responsavel por administrar o controller que vai ser executado */
		
		$url = explode("index.php",$_SERVER["PHP_SELF"]);
		$url = end($url);

		if($url !=""){
			$url = explode("/",$url);
			array_shift($url);

			// Pega o controller
			$this->controller = ucfirst($url[0]). "Controller"; // o padrão de nome de arquivo de controller é nomeController
			array_shift($url);

			//Pega o método
			if(isset($url[0])){
				$this->metodo = $url[0];
				array_shift($url);
			} 
			
			//Pega os para^metros
			if(isset($url[0])){
				$this->parametros = array_filter($url);
			}
		}else{
			$this->controller = ucfirst(CONTROLLER_PADRAO)."Controller";
		}

		// echo "<pre>";
		// print_r($url);
		// echo "</pre>";

	}

	public function getController(){

		if(class_exists(NAMESPACE_CONTROLLER. $this->controller, $this->controller)){ // se o controlador existe
			return  NAMESPACE_CONTROLLER. $this->controller;
		} 

		return NAMESPACE_CONTROLLER."indexController";
	}

	public function getMetodo(){

		if(method_exists(NAMESPACE_CONTROLLER. $this->controller, $this->metodo)){ // checa se o metodo existe no controlador
			return $this->metodo;
		}

		return METODO_PADRAO; // se o método não existir chama o padrão
		
	}

	public function getParametros(){
		return $this->parametros;
	}

}


?>