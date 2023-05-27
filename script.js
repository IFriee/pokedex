$(document).ready(function() {
  // Lorsque le bouton de recherche est cliqué
  $('.search-button').on('click', function() {
    var pokemonName = $('#search-input').val().trim();
    if (pokemonName !== '') {
      getPokemonInfo(pokemonName);
    }
  });

  // Fonction pour obtenir les informations du Pokémon
  function getPokemonInfo(pokemonName) {
    $.ajax({
      url: 'https://pokeapi.co/api/v2/pokemon/' + pokemonName.toLowerCase(),
      method: 'GET',
      success: function(result) {
        // Afficher les informations du Pokémon
        displayPokemonInfo(result);
      },
      // En cas d'erreur de la requête
      error: function(err) {
        console.warn('Error:', err);
        clearPokemonInfo();
        // Afficher un message d'erreur
        displayErrorMessage("Tu viens d'inventer un nouveau pokemon ! Je rigole, tu t'es juste trompé #NULLOS");
      }
    });
  }

  // Fonction pour afficher les informations du Pokémon
  function displayPokemonInfo(pokemon) {
    var $pokemonCard = $('.pokemon-card');
    $pokemonCard.find('.sprite img').attr('src', pokemon.sprites.front_default);
    $pokemonCard.find('.id').text('#00' + pokemon.id);
    $pokemonCard.find('.name').text(pokemon.name);
    $pokemonCard.find('.type').html(getPokemonTypes(pokemon.types));
    $pokemonCard.find('.favorite-button').show(); 
    clearErrorMessage();
    $('#pokemon-container').show(); 
  }

  // Fonction pour obtenir les types du Pokémon
  function getPokemonTypes(types) {
    var typeNames = '';
    $.each(types, function(index, type) {
      typeNames += '<span class="' + type.type.name + '">' + type.type.name + '</span>';
    });
    return typeNames;
  }

  // Fonction pour effacer les informations du Pokémon
  function clearPokemonInfo() {
    var $pokemonCard = $('.pokemon-card');
    $pokemonCard.find('.sprite img').attr('src', '');
    $pokemonCard.find('.id').empty();
    $pokemonCard.find('.name').empty();
    $pokemonCard.find('.type').empty();
    $pokemonCard.find('.favorite-button').hide();
    $('#pokemon-container').hide();
  }

  // Fonction pour afficher un message d'erreur
  function displayErrorMessage(message) {
    $('.error-message').text(message);
  }

  // Fonction pour effacer le message d'erreur
  function clearErrorMessage() {
    $('.error-message').empty();
  }

  // Fonction pour ajouter un Pokémon aux favoris
  $(document).on('click', '.favorite-button', function() {
    //var pokemonList = $('#pokemonlist');
    var name = $('.name').text();
    var url = $('.sprite img').attr('src');
    var type = $('.type').text();

    $.post('http://localhost/ifosup/Dev-SGBD/Dev-SGBD/pokedex/pokedex/Pokemonfav.php?store=1', { name: name, url: url, type: type })
      .done(function(result) {
        //pokemonList.append(result);

      })
      .fail(function(err) {
        console.warn('Error:', err);
      });
  });



});

  // afficher liste favoris
  $(document).on('click', '.btn1', function() {
    var pokemonList = $('#pokemonlist');
    
    // Si la liste des favoris est déjà affichée, la cacher
    if (pokemonList.children().length > 0) {
      pokemonList.empty();
      return;
    }
    
    $.get('http://localhost/ifosup/Dev-SGBD/Dev-SGBD/pokedex/pokedex/Pokemonfav.php')
      .done(function(result) {
        pokemonList.append(result);
        var cssLink = $('<link rel="stylesheet" href="index.css">');
        $('head').append(cssLink);
      })
      .fail(function(err) {
        console.warn('Error:', err);
      });
  });
   


/*
  $(document).on('click', '.unfavorite-button', function() {
    var pokemonCard = $(this).closest('.pokemon-card2');
    var pokemonId = pokemonCard.find('.id').text();

    $.ajax({
      url: 'http://localhost/ifosup/Dev-SGBD/Dev-SGBD/pokedex/pokedex/Pokemonfav.php?destroy=1',
      type: 'POST',
      data: { id: pokemonId },
      success: function(result) {
          console.log('Pokemon deleted successfully');
          pokemonCard.remove();
      },
      error: function(err) {
          console.warn('Error:', err);
      }
  });
  
  
});
*/

$(document).on('click', '.unfavorite-button', function() {
  var pokemonCard = $(this).closest('.pokemon-card2');
  var pokemonId = pokemonCard.find('.id').text();

  $.post('http://localhost/ifosup/Dev-SGBD/Dev-SGBD/pokedex/pokedex/Pokemonfav.php?destroy=1',{id: pokemonId })
    .done(function(result) {
      //pokemonList.append(result);
      pokemonCard.remove();
    })
    .fail(function(err) {
      console.warn('Error:', err);
    })
    });