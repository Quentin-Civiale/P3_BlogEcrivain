<?php $this->titre = "Jean Forteroche"; ?>

<article>
    <header>
        <h1 class="titreEpisode">
            Épisode
            <?= $episode['ep_nb'] ?> :
                <?= $episode['ep_titre'] ?>
        </h1>
        <time><?= $episode['ep_date'] ?></time>
    </header>
    <p>
        <?= $episode['ep_contenu'] ?>
    </p>
</article>

<hr />

<header>
    <h1 id="titreCommentaires">Commentaires sur l'Episode
        <?= $episode['ep_nb'] ?>
    </h1>
</header>

<hr />
<br/>

<form method="post" action="index.php?action=commenter">
    <label for="exampleInputName2">Votre nom ou pseudo :</label> <input id="auteur" name="auteur" type="text" required />
    <br/><br/>
    <label for="exampleInputName2">Votre commentaire </label><br/>
    <textarea id="txtCommentaire" name="contenu" style="width:80%;height:350px;" required></textarea><br/><br/>
    <input type="hidden" name="id" value="<?= $episode['ep_id'] ?>" />
    <button type="submit" class="btn btn-default" value="Publier"><strong>Poster votre commentaire </strong><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
</form>

<br/>
<hr/>

<?php foreach ($commentaires as $commentaire): ?>

<p>
    <?= $commentaire['com_contenu'] ?>
</p>

<p><cite>Publié le
            <?= $commentaire['com_date'] ?> <br/> par
                <?= $commentaire['com_auteur'] ?></cite>
</p>

<div class="signal">
    <form method="post" action="index.php?action=signalement" onclick="return(confirm('Êtes-vous sûr de vouloir signaler ce commentaire ?'))">
        <input type="hidden" name="id" value="<?= $commentaire['com_id'] ?>" />
        <button type="submit" class="btn btn-danger btn-xs" title="Signaler"><span class="glyphicon glyphicon-alert">Signaler ce commentaire </span></button>
    </form>
</div>

<hr />

<?php endforeach; ?>

<br/>


<!--<form method="post" action="index.php?action=commenter">
    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" required /><br />
    <textarea id="txtCommentaire" name="contenu" rows="4" placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="id" value="<?= $episode['ep_id'] ?>" />
    <input type="submit" value="Commenter" />
</form>-->
