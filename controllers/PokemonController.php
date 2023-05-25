<?php 

class PokemonController {
    
    public function index () {
        $pokemons = Pokemon::all();
        return include 'views/favoris.php';
    }
    
    public function show ($id) {
        $pokemon = Pokemon::find($id);
        if ($pokemon) {
            return include 'views/Categories/one.php';
        }
        return include 'views/Categories/notfound.php';
    }
    
    public function create () {
        $pokemons = Pokemon::all();
        return include 'views/Categories/create.php';
    }
    
    public function store ($data) {
        $pokemon = new Pokemon(false, $data["name"], $data["url"], $data["type"]);

        $pokemon->save();
        $pokemons = Pokemon::all();
        return include 'views/favoris.php';
    }
    
    public function edit ($id) {
        $pokemon = Pokemon::find($id);
        return include 'views/Categories/edit.php';
    }
    
    public function update ($data) {
        $pokemon = Pokemon::find($data["id"]);
        $pokemon->name = $data["name"];
        $pokemon->save();
        return include 'views/Categories/one.php';
    }
    
    public function destroy ($id) {
        $pokemon = Pokemon::find($id);
        $pokemon->remove('recipes');
        $pokemon->delete();
    }
}