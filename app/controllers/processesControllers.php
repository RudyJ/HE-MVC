<?php


    class processes extends Controller{
        
     
        public function index(){
            
            $this->openPage("processes");
            
        }
        
        public function cpu(){
            
            $this->openPage("cpu");
            
        }
        
        public function network(){
            
            $this->openPage("network");
            
        }
        
        public function running(){
            
            $this->openPage("running");
            
        }
        
        
    }

    ?>
