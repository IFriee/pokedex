
<div class="titre2"> <h2>Liste de Pokémons Favoris</h2></div>
<div class="favorites-list">
    <?php foreach($pokemons as $pokemon): ?>
    <div class="pokemon-card2">
        <div class="sprite">
            <img src="<?= $pokemon->url ?>" alt="">
        </div>
        <div class="idfav"><?= $pokemon->id ?></div>
        <div class="namefav"><?= $pokemon->name ?></div>
        <div class="typefav"><?= $pokemon->type ?></div>
        <button class="unfavorite-button"></button>
    </div>
    <?php endforeach; ?>
</div>
