<?php $this->titre = "Jean Forteroche"; ?>

<a id="haut"></a>

<article class="episode">
    <h2 class="titreEpisode">
        Épisode
        <?= $episode['ep_nb'] ?> :
            <h3>
                <?= $episode['ep_titre'] ?>
            </h3>
    </h2>
    Publié le <time><?= $episode['ep_date'] ?></time>
    <p>
        <?= $episode['ep_contenu'] ?>
    </p>
</article>

<br/>


<section class="banComment">
    <h3 id="titreCommentaires"><span class="glyphicon glyphicon-comment" aria-hiden="true"></span> Commentaire de l'épisode
        <?= $episode['ep_nb'] ?><br/></h3>
</section>


<div class="commentForm">
    <form method="post" action="index.php?action=commenter">
        <label for="exampleInputName2">Votre nom ou pseudo :</label> <input id="auteur" name="auteur" type="text" required />
        <br/><br/>
        <label for="exampleInputName2">Votre commentaire </label><br/>
        <textarea id="txtCommentaire" name="contenu" style="width:80%;height:350px;" required></textarea><br/><br/>
        <input type="hidden" name="id" value="<?= $episode['ep_id'] ?>" />
        <button type="submit" class="btn btn-default" value="Publier"><strong>Poster votre commentaire </strong><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
    </form>
</div>

<hr/>

<?php foreach ($commentaires as $commentaire): ?>

<div class="blockquoteBorder">
    <div class="blockquoteCite1">
        <blockquote class="comment1">

            <p>
                <?= $commentaire['com_contenu'] ?>
            </p>

            <div class="publish"><cite>Publié le
            <?= $commentaire['com_date'] ?> <br/> par
                <?= $commentaire['com_auteur'] ?></cite>
            </div>

            <div class="col-lg-offset-10">
                <div class="signal">
                    <form method="post" action="index.php?action=signalement" onclick="return(confirm('Êtes-vous sûr de vouloir signaler ce commentaire ?'))">
                        <input type="hidden" name="idComm" value="<?= $commentaire['com_id'] ?>" />
                        <input type="hidden" name="idEp" value="<?= $episode['ep_id'] ?>" />
                        <button type="submit" class="btn btn-danger btn-xs" title="Signaler"><span class="glyphicon glyphicon-alert"><strong> Signaler ce commentaire </strong></span></button>
                    </form>
                </div>
            </div>

        </blockquote>
    </div>
</div>

<br/>

<?php endforeach; ?>

<div class="buttonUp">
    <a href="#haut" role="button" class="btn btn-primary btn-lg">
        <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
    </a>
</div>
