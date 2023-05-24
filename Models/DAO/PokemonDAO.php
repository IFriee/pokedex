<?php

class PokemonDAO extends DAO {
// Appelle le constructeur de la classe parent avec le nom de la table "pokemon"
    public function __construct() {
        parent::__construct("pokemon");
    }

    public function update($pokemon) {
        $statement = $this->db->prepare("UPDATE pokemon SET name = ?, url = ? WHERE id = ?");
        return parent::insert($statement, [$pokemon->name, $pokemon->url, $pokemon->id], $pokemon);
    }

    public function store($pokemon) {
        $statement = $this->db->prepare("INSERT INTO pokemon (name, url) VALUES (?, ?)");
        return parent::insert($statement, [$pokemon->name, $pokemon->url], $pokemon);
    // Utilise la méthode insert  la classe parent pour exécuter la requête avec les valeurs fournies et retourner l'objet Pokémon créé
    }

    public function create($data) {
        if (empty($data["id"])) {
            return false;
        }
        return new Pokemon(
            $data["id"] ?? false,
            $data["name"] ?? false,
            $data["url"] ?? false
        );
    }
}
