<?php $this->titre = "Jean Forteroche"; ?>


<section class="col-lg-offset-2">
    <?php if(array_key_exists('errors', $_SESSION)): ?>
    <div class="alert alert-danger">
        <?= implode('<br/>', $_SESSION['errors']); ?>
    </div>
    <?php endif; ?>


    <?php if(array_key_exists('success', $_SESSION)): ?>
    <div class="alert alert-success">
        Votre email a été envoyé avec succés !
    </div>
    <?php endif; ?>



    <h2>Une question, un renseignement, contactez-moi !</h2><br/>

    <form action="formmail.php" method="post" class="form-inline">
        <div class="form-group">
            <label for="inputName">Vos prénoms et noms : </label>
            <input type="text" name="name" class="form-control" id="inputName" placeholder="Jean Forteroche" value="<?= isset($_SESSION['inputs']['name']) ? $_SESSION['inputs']['name'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="inputEmail">Votre email : </label>
            <input type="text" name="email" class="form-control" id="inputEmail" placeholder="jean.forteroche@example.com" value="<?= isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email'] : ''; ?>">
        </div>
    </form>
    <br/>

    <label for="inputMessage">Votre message : </label><br/>
    <textarea name="message" class="form-control" id="inputMessage" rows="10"><?= isset($_SESSION['inputs']['message']) ? $_SESSION['inputs']['message'] : ''; ?></textarea><br/><br/>
    <button type="submit" class="btn btn-default"><strong>Envoyer le message </strong><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
</section>

<?php
        unset($_SESSION['inputs']);
        unset($_SESSION['success']);
        unset($_SESSION['errors']);
    ?>
