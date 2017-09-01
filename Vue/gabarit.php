<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="Contenu/style.css" />
    <link rel="icon" type="image/png" href="Contenu/favicon.ico" />
    <title>
        <?= $titre ?>
    </title>
</head>

<body>
    <div class="global">
        <header>

            <!--<p>Le nouveau roman de Jean Forteroche sous forme de blog !</p>-->

            <?php if(!($_SESSION['Auth'])){ ?>

            <a href="index.php">
                <h1 id="titreBlog">Billet simple pour l'Alaska <small class="signature">par Jean Forteroche</small></h1>
            </a>

            <div class="row">
                <div class="col-lg-12">
                    <nav>
                        <ul class="nav nav-pills nav-justified">

                            <li role="nav">
                                <a href="index.php" role="button">
                                    <span class="glyphicon glyphicon-home" aria-hiden="true"></span> Accueil</a>
                            </li>

                            <li role="nav">
                                <a href="<?= " index.php?action=Episodes " ?>">
                                    <span class="glyphicon glyphicon-list" aria-hiden="true"></span> Episodes</a>
                            </li>

                            <li role="nav">
                                <a href="<?= " index.php?action=contact " ?>" role="button">
                                    <span class="glyphicon glyphicon-envelope" aria-hiden="true"></span> Contact</a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>

            <div class="col-lg-offset-2 col-lg-2">
                <a href="index.php?action=formulaire"><button type="button" class="btn btn-danger" title="Connexion"><span class="glyphicon glyphicon-log-in"></span> Connexion</button></a>
            </div>



            <?php }


                    else { ?>

            <h1 id="titreBlog">Billet simple pour l'Alaska <small class="signature">par Jean Forteroche</small></h1>

            <p>Administration du site</p>

            <hr/>

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
                    <a href="index.php?action=deconnexion" onclick="return(confirm('Êtes-vous sûr de vouloir vous déconnecter ?'))">
                        <button type="button" class="btn btn-danger" title="Deconnexion"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</button>
                    </a>
                </div>
            </div>
            <?php } ?>

        </header>

        <br/>

        <div id="contenu">
            <?= $contenu ?>
        </div>
        <!-- #contenu -->

    </div>
    <!-- #global -->

    <footer>
        <div>
            <div class="row">
                <div class="col-lg-4">
                    <h2>Billet simple pour l'Alaska <br/> <small class="signature">par Jean Forteroche</small></h2>
                </div>
                <div class="col-lg-4">
                    <h3>Copyright 2017 <br/> Jean Forteroche <br/> All Right Reserved</h3>
                </div>
                <div class="col-lg-4">
                    <h3></h3>
                </div>
            </div>
        </div>
    </footer>


</body>

</html>
