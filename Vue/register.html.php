<section class="content4">
    <div class="view2" id="cm_vente">
        <div class="content_vente">
            <div class="content_titre_gray">
                <p class="txt_titre_black_left_margin">Essai gratuit 15 jours</p>
            </div>
            <div class="content_slogan_blue">
                <p class="txt_slogan_blue"><strong>Faites confiance à des spécialistes</strong></p>
            </div>
            <div class="content4">
                <p class="txt_slogan">Veuillez vous identifier afin de valider votre demande de test gratuit.</p>
            </div>

        </div>
        <div class="content_vente">
            <div class="imag_logiciel">
                <img src=".\uploads\Logo-Well-Com-Couleur.svg" class="imag_vente" alt="logo">
            </div>
        </div>
    </div>

    <section class="content_contact">
        <form method="post" action="<?php echo \Lib\Application::$racine ?>theme_adminPo/web/connexion/register">

            <div class="form">
                <input type="text" name="ste" id="ste" placeholder="Entreprise*" />
            </div>

            <div class="form">
                <input type="text" name="tel" id="tel" placeholder="Téléphone*" /></br>
            </div></br>

            <div class="form">
                <input type="text" name="nom" id="nom" placeholder="Nom*" />
            </div>

            <div class="form">
                <input type="text" name="prenom" id="prenom" placeholder="Prénom*" /></br>
            </div></br>

            <div class="form">
                <input type="email" name="email" id="email" placeholder="Email*" />
            </div>

            <div class="form">
                <input type="text" name="login" id="login" placeholder="Login*" /><br/>
            </div></br>

            <div class="form">
                <input type="password" name="pass" id="pass" placeholder="Password*" />
            </div></br>

            <input type="hidden" name="token" value="<?php echo $token; ?>" />



            <div class="content4">
                <button type="submit" class="btn btn-primary" name="valider">Valider</button>
            </div>

            <br>
            <a class="register-link" href="<?php echo \Lib\Application::$racine ?>connexion/register">Pas encore inscrit ? Inscrivez-vous</a>
        </form>

    </section>

</section>

