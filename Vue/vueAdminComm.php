<?php $this->titre = "Jean Forteroche"; ?>

<section class="col-lg-offset-1 col-lg-10">
    <table border=6 cellspacing=10 cellpadding=10 width=100%>
        <thead>
            <th>ID</th>
            <th>Episode ID</th>
            <th>Auteur</th>
            <th>Commentaire</th>
            <th>Nombre de signalement</th>
            <th>Date de publication</th>
            <th>Modification</th>
        </thead>
        <tbody>
            <?php foreach ($commentaires as $commentaire): ?>
            <tr>
                <td>
                    <?= $commentaire['com_id'] ?>
                </td>
                <td>
                    <?= $commentaire['com_epId'] ?>
                </td>
                <td>
                    <?= $commentaire['com_auteur'] ?>
                </td>
                <td>
                    <?= $commentaire['com_contenu'] ?>
                </td>
                <td>
                    <?= $commentaire['com_signal'] ?>
                </td>
                <td>
                    <?= $commentaire['com_date'] ?>
                </td>
                <td>
                    <form method="post" action="index.php?action=editeurModifComm">
                        <input type="hidden" name="id" value="<?php echo $commentaire['com_id']; ?>" />
                        <button type="submit" class="btn btn-info btn-xs" title="Modifier"><span class="glyphicon glyphicon-edit">Modifier</span></button>
                    </form>

                    --

                    <form method="post" action="index.php?action=deleteComm" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?'))">
                        <input type="hidden" name="id" value="<?= $commentaire['com_id'] ?>" />
                        <button type="submit" class="btn btn-danger btn-xs" title="Supprimer"><span class="glyphicon glyphicon-trash">X</span></button>
                    </form>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table><br>
</section>
