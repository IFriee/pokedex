<?php

class Pokemon extends Entity {
    protected $id;
    protected $name;
    protected $url;
    protected $type;

    protected static $dao ="PokemonDAO";


    public function __construct ($id =  false, $name, $url,$type) {
        $this->id = $id;
        $this->name = $name;
        $this->url = $url;
        $this->type = $type;
    }
    
    // Définition des méthodes getter et setter pour chaque propriété
    public function __toString(){
        return "{$this->id} : {$this->name}";
    }
    // Autres méthodes pour interagir avec la base de données via le DAO
    public function __get($prop){
        if(property_exists($this,$prop)){
            return $this->$prop;
        }
    }
}