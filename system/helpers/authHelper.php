<?php
	
	class authHelper{
		
		public $email, $url, $senha, $senha2;
		
		
		public function checaEmail( $email ){
			
			$m	=	new Model;
			$q	=	$m->read("tbl_users", "`email`='$email'");
			
			if(count($q) != NULL)// se houver email no BD
				return "Já existe uma conta com este e-mail";
			else // se NÃO tiver, se estiver livre pra registro
				return true;			
		
		}
		
		public function checaSenha( $senha, $senha2 ){
			
			if($senha != $senha2)
				return "As senhas não conferem.";
			else
				return true;
			
		}
		
		public function checaUrl( $url ){
			
			$m	=	new Model();
			$q	=	$m->read("tbl_users", "`url`='$url'");
			
			if(count($q) != NULL)// se houver email no BD
				return "Já existe uma conta com esta url";
			else // se NÃO tiver, se estiver livre pra registro
				return true;			
		
		
		}
		
		
		public function verificaCadastro( $email, $url, $senha, $senha2 ){
			
			if($this->checaSenha($senha, $senha2) != true){
				return $this;
			}elseif($this->checaEmail($email) != true ){
				return $this;
			}elseif($this->checaUrl($url) != true){
				return $this;
			}else{
				return true;
			}
			
			
		}
		
		
		
		}

?>