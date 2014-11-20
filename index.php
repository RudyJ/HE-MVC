<?php
	define("MODELS", "app/models/");
	define("VIEWS", "app/views/");
	define("CONTROLLERS", "app/controllers/");
	define("HELPERS", "system/helpers/");
	
	require_once('system/system.php');
	require_once('system/controller.php');
	require_once('system/model.php');
	
	function __autoload($file){
		/* 
		
			função para criar automaticamente um require, exemplo :
			"$ex = new text();"
			
			Ao atribuir a variável 'ex' com a classe 'teste', automaricamente faz um require_once('app/models/testModel.php');
			
		*/
		
		if(file_exists(MODELS.$file.'.php')){
			require_once(MODELS.$file.'.php');
			}elseif(file_exists(HELPERS.$file.'.php')){
				require_once(HELPERS.$file.'.php');
				}else{
					die("Model ou Helper não encontrado.");
					}
		
	
		}
		
	$start	=	new System;
	$start->run();
        
        
?>
