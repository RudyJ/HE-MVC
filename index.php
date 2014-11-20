<?php
	define("MODELS", "app/models/");
	define("VIEWS", "app/views/");
	define("CONTROLLERS", "app/controllers/");
	define("HELPERS", "system/helpers/");
	
	require_once('system/system.php');
	require_once('system/controller.php');
	require_once('system/model.php');
	
	function __autoload($file){
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