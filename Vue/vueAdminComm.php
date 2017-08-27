<?php $this->titre = "Jean Forteroche"; ?>

<p>Administration du site</p>

<div class="row">
    <div class="col-lg-offset-4 col-lg-4">
        <nav>
            <ul class="nav nav-pills nav-justified">

                <li role="nav">
                    <a href="<?= " index.php?action=adminEp " ?>" role="button">
                        <span class="glyphicon glyphicon-list" aria-hiden="true"></span> Episodes</a>
                </li>

                <li role="nav">
                    <a href="<?= " index.php?action=adminComm " ?>" role="button">
                        <span class="glyphicon glyphicon-comment" aria-hiden="true"></span> Commentaires</a>
                </li>

            </ul>
        </nav>
    </div>
    <div class="col-lg-offset-2 col-lg-2">
        <a href="index.php"><button type="button" class="btn btn-danger" title="Deconnexion"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</button></a>
    </div>
</div>

<br/>

<hr/>

<section class="col-lg-offset-1 col-lg-10">
    <table border=6 cellspacing=12 cellpadding=20 width=100%>
        <thead>
            <th>ID</th>
            <th>Episode ID</th>
            <th>Auteurs</th>
            <th>Commentaires</th>
            <th>Nombre de signalement</th>
            <th>Date de publication</th>
            <th>Modification</th>
        </thead>

        <tbody>

            <?php
                
                try {
                    $dbh = new PDO('mysql:host=localhost;dbname=p3', 'root', '');
                    foreach($dbh->query('SELECT * FROM commentaires ORDER BY `commentaires`.`id` ASC') as $data) 
                    
                    {
                        echo "<tr>";
                        echo "<td>". $data["id"] ."</td>";
                        echo "<td>". $data["parent_id"] ."</td>";
                        echo "<td>". $data["author"] ."</td>";
                        echo "<td>". $data["content"] ."</td>";
                        echo "<td>". $data["signal_number"] ."</td>";
                        echo "<td>". $data["publish_date"] ."</td>";
                        echo "<td>
                                    <a href=\"http://localhost/P3/Admin/Model/Commentaires/editCommentaire.php?id={$data["id"]}\">
                                        <button type=\"button\" class=\"btn btn-info btn-xs\" title=\"Modifier\"><span class=\"glyphicon glyphicon-edit\"> Modifier</span></button>
                                    </a>
                                        
                                    --
                                    
                                    <a href=\"http://localhost/P3/Admin/Model/Commentaires/supprCommentaire.php?id={$data["id"]}\" class=\"button delete\" onclick=\"return(confirm('Êtes-vous sur de vouloir supprimer ce commentaire ?'));\">
                                        <button type=\"button\" class=\"btn btn-danger btn-xs\" title=\"Supprimer\"><span class=\"glyphicon glyphicon-trash\"></span>X</button>
                                    </a>
                              </td>";
                        echo "</tr>";
                    }
                    
                    $dbh = null;
                    
                    } 
                
                catch (PDOException $e)
                {
                    print "Erreur !: " . $e->getMessage() . "<br/>";
                    die();
                }
                
                
                

                ?>

        </tbody>
    </table><br>
</section>

<hr/>

<!--<section class="col-lg-offset-1 col-lg-10">
    <table border=6 cellspacing=10 cellpadding=10 width=100%>
        <thead>
            <th>ID</th>
            <th>Episode N°</th>
            <th>Titre</th>
            <th>Date de publication</th>
            <th>Modification</th>
        </thead>
        <tbody>
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
                    <a href="<?= " index.php?action=episode&id=" . $episode['ep_id'] ?>">
                        <button type="button" class="btn btn-info btn-xs" title="Modifier"><span class="glyphicon glyphicon-edit"> Modifier</span></button>
                    </a>

                    --

                    <a href="<?= " index.php?action=episode&id=" . $episode['ep_id'] ?>" class="button delete" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer cet épisode ?'));">
                        <button type="button" class="btn btn-danger btn-xs" title="Supprimer"><span class="glyphicon glyphicon-trash">X</span></button>
                    </a>-

                </td>
            </tr>
        </tbody>
    </table><br>


    <div class="col-lg-offset-5 col-lg-5">
        <p><a href="gestionPage.php?p=View/editeur"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Ajouter un nouvel épisode</button></a></p>
    </div>


</section>-->