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
            <a href="index.php">
                <h1 id="titreBlog">Billet simple pour l'Alaska <small class="signature">par Jean Forteroche</small></h1>
            </a>
            <!--<p>Le nouveau roman de Jean Forteroche sous forme de blog !</p>-->
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

<!--<header class="navigationbar">

    <h1>Billet simple pour l'Alaska <small class="signature">par Jean Forteroche</small></h1>

    <div class="row">
        <div class="col-lg-12">
            <nav>
                <ul class="nav nav-pills nav-justified">

                    <li role="nav">
                        <a href="index.php?p=home" role="button">
                            <span class="glyphicon glyphicon-home" aria-hiden="true"></span> Accueil</a>
                    </li>

                    <li role="nav">
                        <a href="index.php?p=View/episodes" role="button">
                            <span class="glyphicon glyphicon-list" aria-hiden="true"></span> Episodes</a>
                    </li>

                    <li role="nav">
                        <a href="index.php?p=View/contact" role="button">
                            <span class="glyphicon glyphicon-envelope" aria-hiden="true"></span> Contact</a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>

</header>-->
