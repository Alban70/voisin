<nav>
    <?php
    include __DIR__ . '/myConnexionTopRightSousMenuImages.php';
    ?>
</nav>
<section class="content_top" style="background-image: none; !important;">
    <?php
    include __DIR__ . '/myConnexionSlogan.php';
    ?>

    <div id="contact" class="contact">
        <form method="post" id="formulaire" name="formulaire" action="<?php echo \Lib\Application::$racine ?>connexion/connect">
            <p>bonjour</p>
            <!--<fieldset>-->
            <legend>Vos coordonnées</legend> <!-- Titre du fieldset -->
            <input type="hidden" name="token" value="<?php echo $token; ?>" />

            <div class="contact_form">
                <input type="text" name="login" id="login" placeholder="Login*" />
            </div>

            <div class="contact_form">
            <input type="password" name="pass" id="pass"  /><br/>
            </div>
            <button type="submit" class="btn btn-primary" name="valider">Valider</button>
            <br>
            <a class="register-link" href="<?php echo \Lib\Application::$racine ?>theme_adminPo/web/connexion/register">Pas encore inscrit ? Inscrivez-vous</a>
        </form>
    </div>
</section>


