<?php

class Pokemon {
    private $id;
    private $name;
    private $url;


    public function __construct ($id, $name, $recipes = false) {
        $this->id = $id;
        $this->name = $name;
        $this->url = $recipes;
    }
    
    // Définition des méthodes getter et setter pour chaque propriété
    
    // Autres méthodes pour interagir avec la base de données via le DAO
}