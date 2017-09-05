<?php $this->titre = "Jean Forteroche"; ?>

<div class="col-lg-offset-4 col-lg-4">
    <div class="login1">
        <h2>Identification</h2>

        <hr/>

        <p>Cette page est réservée à l'administrateur du blog de Jean Forteroche.</p>
        <p>Veuillez vous identifier pour vous connecter à l'administration du site :</p>

        <hr/>

        <div class="login2">

            <form action="index.php?action=connexion" method="post">
                <p><strong>Identifiant</strong><br/>
                    <input type="text" name="login" /></p>
                <p><strong>Mot de passe</strong><br/>
                    <input type="password" name="pass" /></p><br/>
                <input type="submit" value="Se connecter" />
            </form>

        </div>

    </div>
</div>
