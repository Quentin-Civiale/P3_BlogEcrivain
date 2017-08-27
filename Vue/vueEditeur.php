<h3>Ecrire un nouvel épisode</h3>

<form method="post" action="index.php?action=editer">
    <label for="exampleInputName2">Numero de l'épisode :</label> <input id="episodeNb" name="episodeNb" type="text" required />
    <br/><br/>
    <label for="exampleInputName2">Titre de l'épisode :</label> <input id="titre" name="titre" type="text" required />
    <br/><br/>
    <label for="exampleInputName2">Nouvel Episode :</label><br/>
    <textarea id="txtEpisode" name="contenu" style="width:80%;height:350px;" required></textarea><br/><br/>
    <button type="submit" class="btn btn-default" value="Publier"><strong>Poster votre épisode </strong><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
</form>

<br/>

<div class="buttonUp">
    <a href="<?= " index.php?action=adminEp " ?>" role="button" class="btn btn-primary btn-lg">
            Retour
        </a>
</div>

<hr/>

<!--
<head>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=plr4j6thzz7be0gg07sn7v9bamkgjmd6jte6e5eztyy4ufnr"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            width: 1000,
            language_url: 'http://localhost/P1/Contenu/tinymce_4.6.2/tinymce/js/tinymce/langs/fr_FR.js'

        });

    </script>
</head>

<body>

    <section class="col-lg-offset-3">
        <div class="edit">
            <h3>Ecrire un nouvel épisode</h3>

            <form method="post" action="index.php?action=editer">
                <p>Numéro de l'épisode : <input type="text" id="episodeNb" name="episodeNb" /> Titre de l'épisode : <input type="text" id="titre" name="titre" /></p>
                <br/>
                <textarea id="txtEpisode" name="contenu" style="width:80%;height:350px;" required></textarea><br/>
                <button type="submit" class="btn btn-default" value="Publier"><strong>Poster votre épisode </strong><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
            </form>

        </div>
    </section>

    <div class="buttonUp">
        <a href="<?= " index.php?action=adminEp " ?>" role="button" class="btn btn-primary btn-lg">
            Retour
        </a>
    </div>

</body>
-->
