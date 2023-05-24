$(document).ready(function() {
  $('.search-button').on('click', function() {
    var pokemonName = $('#search-input').val().trim();
    if (pokemonName !== '') {
      getPokemonInfo(pokemonName);
    }
  });

  function getPokemonInfo(pokemonName) {
    $.ajax({
      url: 'https://pokeapi.co/api/v2/pokemon/' + pokemonName.toLowerCase(),
      method: 'GET',
      success: function(result) {
        displayPokemonInfo(result);
      },
      error: function(err) {
        console.warn('Error:', err);
        clearPokemonInfo();
        displayErrorMessage('Tu viens d inventer un nouveau pokemon ! Je rigole , tu t es juste trompé #NULLOS ');
      }
    });
  }

  function displayPokemonInfo(pokemon) {
    $('.pokemon-card .sprite img').attr('src', pokemon.sprites.front_default);
    $('.pokemon-card .id').text('#00' + pokemon.id);
    $('.pokemon-card .name').text(pokemon.name);
    $('.pokemon-card .type').html(getPokemonTypes(pokemon.types));
    clearErrorMessage();
  }

  function clearPokemonInfo() {
    $('.pokemon-card .sprite img').attr('src', '');
    $('.pokemon-card .id').empty();
    $('.pokemon-card .name').empty();
    $('.pokemon-card .type').empty();
  }

  function getPokemonTypes(types) {
    var typeNames = '';
    $.each(types, function(index, type) {
      typeNames += '<span class="' + type.type.name + '">' + type.type.name + '</span>';
    });
    return typeNames;
  }

  function displayErrorMessage(message) {
    $('.error-message').text(message);
  }

  function clearErrorMessage() {
    $('.error-message').empty();
  }
});
