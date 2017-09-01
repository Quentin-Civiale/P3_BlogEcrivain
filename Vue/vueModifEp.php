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
            <h3>Modifier l'épisode</h3>

            <form method="post" action="index.php?action=modifEp">
                <input type="hidden" name="id" value="<?= $modifEp['ep_id'] ?>">
                <p>Titre de l'épisode : <input type="text" id="titre" name="titre" value="<?= $modifEp['ep_titre'] ?>" />
                </p>
                <br/>
                <textarea id="txtEpisode" name="contenu" style="width:80%;height:350px;"><?= $modifEp['ep_contenu'] ?></textarea><br/>
                <button type="submit" class="btn btn-default" value="Enregistrer la modification"><strong>Enregistrer la modification </strong><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
            </form>

        </div>
    </section>

    <br/>

    <div class="buttonUp">
        <a href="<?= " index.php?action=adminEp " ?>" role="button" class="btn btn-primary btn-lg">
            Retour vers la page Episode
        </a>
    </div>

</body>
