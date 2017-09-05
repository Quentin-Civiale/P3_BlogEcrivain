<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Contenu/style.css" />
    <link href="Contenu/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="Contenu/favicon.ico" />
    <title>
        <?= $titre ?>
    </title>
</head>


<body>
    <header class="navigationbar">

        <!--<p>Le nouveau roman de Jean Forteroche sous forme de blog !</p>-->

        <?php if(!($_SESSION['Auth'])){ ?>

        <a href="index.php">
            <h1 id="titreBlog">Billet simple pour l'Alaska <small class="signature">par Jean Forteroche</small></h1>
        </a>

        <div class="row">
            <div class="col-lg-offset-1 col-lg-8">
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
            <div class="col-lg-3">
                <a href="index.php?action=formulaire"><button type="button" class="btn btn-success" title="Connexion"><span class="glyphicon glyphicon-log-in"></span> Connexion</button></a>
            </div>
        </div>





        <?php }


                    else { ?>

        <h1 id="titreBlog">Billet simple pour l'Alaska <small class="signature">par Jean Forteroche</small></h1>

        <div class="admin">
            <h2>Administration du site</h2>
        </div>

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

    <div class="row">
        <div class="bannerImage">
        </div>
    </div>

    <div id="contenu">
        <?= $contenu ?>
    </div>


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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="Contenu/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>



</body>

</html>
