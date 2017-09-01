<?php $this->titre = "Jean Forteroche"; ?>

<section class="col-lg-offset-1 col-lg-10">
    <table border=6 cellspacing=10 cellpadding=10 width=100%>
        <thead>
            <th>ID</th>
            <th>Episode N°</th>
            <th>Titre</th>
            <th>Date de publication</th>
            <th>Modification</th>
        </thead>
        <tbody>
            <?php foreach ($episodes as $episode):?>
            <tr>
                <td>
                    <?= $episode['ep_id'] ?>
                </td>
                <td>
                    <?= $episode['ep_nb'] ?>
                </td>
                <td>
                    <?= $episode['ep_titre'] ?>
                </td>
                <td>
                    <?= $episode['ep_date'] ?>
                </td>
                <td>

                    <form method="post" action="index.php?action=editeurModifEp">
                        <input type="hidden" name="id" value="<?php echo $episode['ep_id']; ?>" />
                        <button type="submit" class="btn btn-info btn-xs" title="Modifier"><span class="glyphicon glyphicon-edit">Modifier</span></button>
                    </form>


                    --

                    <form method="post" action="index.php?action=deleteEp" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer cet épisode ?'))">
                        <input type="hidden" name="id" value="<?= $episode['ep_id'] ?>" />
                        <button type="submit" class="btn btn-danger btn-xs" title="Supprimer"><span class="glyphicon glyphicon-trash">X</span></button>
                    </form>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table><br>


    <div class="col-lg-offset-5 col-lg-5">
        <p><a href="index.php?action=editeur"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Ajouter un nouvel épisode</button></a></p>
    </div>


</section>
