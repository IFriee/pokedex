<?php

interface PokemonDAO {
    public function fetch($id);
    public function fetchAll();
    public function insert(Pokemon $pokemon);
    public function delete($id);
}

class PokemonDAOImpl implements PokemonDAO {
    public function fetch($id) {
        // Logique pour récupérer un Pokémon par son ID depuis la base de données
    }
    
    public function fetchAll() {
        // Logique pour récupérer tous les Pokémon depuis la base de données
    }
    
    public function insert(Pokemon $pokemon) {
        // Logique pour insérer un nouveau Pokémon dans la base de données
    }
    
    public function delete($id) {
        // Logique pour supprimer un Pokémon de la base de données
    }
}
