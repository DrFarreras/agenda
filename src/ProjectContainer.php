<?php

class ProjectContainer extends \Emeset\Container
{

    public function __construct($config){
        $this->sql = new Db($config);
        $this->config = $config;
    }
    public function Users(){
        return new Users($this->sql->get());
    }
    public function Events(){ 
        return new Events($this->sql->get()); 
    }
}