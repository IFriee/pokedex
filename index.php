<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pokékouille</title>
    <style>
    </style>
    <link rel="stylesheet" href="views/index.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</head>
<body>
<h1>Pokédex</h1>

    <div class="search-bar">
        <input type="text" id="search-input" placeholder="Rechercher un Pokémon">
        <button type="submit" class="search-button">Rechercher</button>
    </div>


 

    <div class="error-message"></div>


    <div id="pokemon-container" class="hidden">
        <div class="pokemon-card">
            <div class="sprite">
                <img src="" alt="">
            </div>
            <div class="id"></div>
            <div class="name"></div>
            <div class="type"></div>
            <button class="favorite-button"></button>
            <p class="messageADD"></p>
        </div>
    </div>
    <div class="btnindex">
        <button class="btn1">Liste des Favoris</button>
    </div>
    <div id="pokemonlist">
    <p id="nothingfrere"></p>
    <p id="messagesuppr"></p>

    </div>
    


    
</body>
</html>
