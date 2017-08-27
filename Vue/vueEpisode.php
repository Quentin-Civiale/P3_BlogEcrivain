<?php $this->titre = "Jean Forteroche"; ?>

<?php foreach ($episodes as $episode):?>
<article>
    <header>
        <a href="<?= " index.php?action=episode&id=" . $episode['ep_id'] ?>">
            <h1 class="titreEpisode">
                Épisode
                <?= $episode['ep_nb'] ?> :
                    <?= $episode['ep_titre'] ?>
            </h1>
        </a>
        <time><?= $episode['ep_date'] ?></time>
    </header>
    <p>
        <?= $episode['ep_contenu'] ?>
    </p>
</article>
<hr />
<?php endforeach; ?>
