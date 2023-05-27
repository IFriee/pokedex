
<div class="titre2"> <h2>Liste de Pokémons Favoris</h2></div>
<div class="favorites-list">
    <?php foreach($pokemons as $pokemon): ?>
    <div class="pokemon-card2">
        <div class="sprite">
            <img src="<?= $pokemon->url ?>" alt="">
        </div>
        <div class="id"><?= $pokemon->id ?></div>
        <div class="name"><?= $pokemon->name ?></div>
        <div class="type"><?= $pokemon->type ?></div>
        <button class="unfavorite-button"></button>
    </div>
    <?php endforeach; ?>
</div>
