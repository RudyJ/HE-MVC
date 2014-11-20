<?php

	class Controller extends System{
		
		protected function openPage($pagina, $dados	= NULL){
			
			$info	=	($dados != NULL) ? $dados : NULL;
			return require_once( VIEWS .$pagina.'.phtml');
			exit();
			
			}
				
		
		
		}

?>