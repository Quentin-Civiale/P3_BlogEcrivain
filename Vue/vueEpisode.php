<?php $this->titre = "Jean Forteroche"; ?>

<section>
    <h2>Les Episodes</h2>
</section>

<?php foreach ($episodes as $episode):?>

<article>
    <div class="card col-lg-6">
        <div class="card-block">
            <h4 class="card-title">
                Épisode
                <?= $episode['ep_nb'] ?> :
            </h4>

            <h4 class="card-title">
                <?= $episode['ep_titre'] ?>
            </h4>

            <time><?= $episode['ep_date'] ?></time>

            <p class="card-text">
                <?= $episode['ep_contenu'] ?>
            </p>
            <form method="post" action="<?= " index.php?action=episode&id=" . $episode[ 'ep_id'] ?>">
                <button type="submit" class="btn btn-primary" value="Publier"><strong>Lire l'épisode </strong></button>
            </form>
        </div>
    </div>
</article>
<?php endforeach; ?>
