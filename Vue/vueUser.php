<?php $this->titre = "Jean Forteroche"; ?>

<div class="col-lg-offset-4 col-lg-4">
    <div class="login">
        <h2>Identification</h2>

        <p>Veuillez vous identifier pour vous connecter à l'administration du site :</p>

        <form action="index.php?action=connexion" method="post">
            <p><strong>Identifiant</strong> <input type="text" name="login" /><br/>
                <p><strong>Mot de passe</strong> <input type="password" name="pass" /><br/>
                    <p><input type="submit" value="Se connecter" /></p>
        </form>

        <p>Cette page est réservée à l'administrateur du blog de Jean Forteroche.</p>
    </div>
</div>
