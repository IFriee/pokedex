<?php

class PokemonDAO extends DAO {

    public function __construct () {
        parent::__construct("pokemon");
    }
    
    /*public function update($pokemon) {
        $statement = $this->db->prepare("UPDATE favoris SET name = ?, name = ? WHERE id = ?");
        return parent::insert($statement, [$pokemon->name, $pokemon->url, $pokemon->id], $pokemon);
    }*/
    
    public function store($pokemon) {
        $statement = $this->db->prepare("INSERT INTO pokemon (name, url, type) VALUES (?, ?, ?)");
        return parent::insert($statement, [$pokemon->name, $pokemon->url, $pokemon->type], $pokemon);
    }
    
    
    public function create ($data) {
        if (empty($data["id"])) {
            return false;
        }
        return new Pokemon(
            $data["id"] ?? false,
            $data["name"] ?? false,
            $data["url"] ?? false,
            $data["type"] ?? false
        );
    }
}