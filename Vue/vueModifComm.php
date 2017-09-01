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
            <h3>Modifier le commentaire</h3>

            <form method="post" action="index.php?action=modifComm">
                <input type="hidden" name="id" value="<?= $modifComm['com_id'] ?>">
                <input type="hidden" name="auteur" value="<?= $modifComm['com_auteur'] ?>">
                <input type="hidden" name="epId" value="<?= $modifComm['com_epId'] ?>">
                <input type="hidden" name="date" value="<?= $modifComm['com_date'] ?>">
                <input type="hidden" name="signal" value="<?= $modifComm['com_signal'] ?>">
                <p>Auteur du commentaire :
                    <?= $modifComm['com_auteur'] ?>
                </p>
                <p>Episode concerné :
                    <?= $modifComm['com_epId'] ?>
                </p>
                <p>Date de publication :
                    <?= $modifComm['com_date'] ?>
                </p>
                <p>Nombre de signalement :
                    <?= $modifComm['com_signal'] ?>
                </p>
                <br/>
                <textarea id="txtCommentaire" name="contenu" style="width:80%;height:350px;"><?= $modifComm['com_contenu'] ?></textarea><br/>
                <button type="submit" class="btn btn-default" value="Enregistrer la modification"><strong>Enregistrer la modification </strong><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
            </form>

        </div>
    </section>

    <br/>

    <div class="buttonUp">
        <a href="<?= " index.php?action=adminComm " ?>" role="button" class="btn btn-primary btn-lg">
            Retour vers la page Commentaire
        </a>
    </div>

</body>
