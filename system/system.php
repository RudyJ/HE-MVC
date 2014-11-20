<?php
	
	/*
	URLs :
	
            hackerexperience.com/CONTROLLER/ACTION/PARAMS
	
         * 
         * 
         * 
	
	*/
	
	class System{
		
		private $_url;
		private $_explode;
		public $_controller;
		public $_action;
		public $_params;
		
		public function __construct(){
			$this->setUrl();
			$this->setExplode();
			$this->setController();
			$this->setAction();
			}
				
				
		private function setUrl(){
			
			$_GET["url"]	=	isset($_GET["url"])?$_GET["url"]:"index/index";// se tiver parâmetro é ele, caso não é index/index
			
			$this->_url	=	$_GET["url"];
			
			}
		
		private function setExplode(){
			$this->_explode	=	explode("/", $this->_url);
			}
		
		private function setController(){
			$this->_controller	=	$this->_explode[0];
			}
		
		private function setAction(){
			$ac		=	(!isset($this->_explode[1]) || $this->_explode[1] == NULL || $this->_explode[1] == "index" ? "index" : $this->_explode[1] );
			$this->_action	=	$ac;
			}
		
		private function setParams(){
			// site.com/busca/cidade/categoria/subcategoria   - > resultado da pesquisa
			// site.com/nome  -> perfil do anunciante
			// site.com/pagina -> outras paginas

			unset($this->_explode[0]);// elimina o 1° -> que é o controller
			if(end($this->_explode) == NULL)
				array_pop($this->_explode);
				
			
			if(empty($this->_explode)){
				echo "<h1>Hello World</h1>";
				}else{
				echo "tem url";
				}
			
			}
			
		public function getParam($name){
			return $this->_params[$name];
			}
		
		public function run(){
			
			$controller_path	=	CONTROLLERS.$this->_controller."Controllers.php";
			
			if($this->_controller == "index" || 
                           $this->_controller == "profile"  || 
                           $this->_controller == "settings"  || 
                           $this->_controller == "mail" || 
                           $this->_controller == "login"  || 
                           $this->_controller == "logout" || 
                           $this->_controller == "processes" || 
                           $this->_controller == "software" || 
                           $this->_controller == "internet" ||  
                           $this->_controller == "log" ||  
                           $this->_controller == "hardware" ||  
                           $this->_controller == "university" ||  
                           $this->_controller == "finances" ||  
                           $this->_controller == "lists" ||  
                           $this->_controller == "missions" ||  
                           $this->_controller == "clan" ||  
                           $this->_controller == "ranking" ||  
                           $this->_controller == "fame" ||  
                           $this->_controller == "doom" ||  
                           $this->_controller == "admin" ||  
                           $this->_controller == "war" ){
                            
					require_once($controller_path);
				
					$app	=	new $this->_controller();
					$action	=	$this->_action;
					$app->$action();
					
			}elseif(!file_exists($controller_path)){// se n tiver controller
				
				require_once( CONTROLLERS . 'userControllers.php');
				$app	=	new user();
				$app->perfil($this->_controller);// pega perfil do usuário
				
			}else{
						
                                $app	=	new notFoundControllers();
                                $action	=	$this->_action;
                                $app->$action();
									
			}
					
					
					}
			
			
		
		}

?>