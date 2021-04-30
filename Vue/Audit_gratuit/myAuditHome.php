<nav>
    <?php
    include __DIR__ . '/myAuditTopRightSousMenuImages.php';
    ?>
</nav>
<section class="content_top" style="background-image: none; !important;">
    <?php
    include __DIR__ . '/myAuditSlogan.php';
    ?>

    <div id="contact" class="contact">


        <form method="post" action="<?php echo \Lib\Application::$racine ?>action/audit">

            <div class="contact_form">
                <input type="text" name="ste" id="ste" placeholder="Entreprise*" />
            </div>

            <div class="contact_form">
                <input type="text" name="tel" id="siteWeb" placeholder="Site Web*" /></br>
            </div>

            <div class="contact_form">
                <input type="text" name="nom" id="nom" placeholder="Nom*" />
            </div>

            <div class="contact_form">
                <input type="text" name="prenom" id="prenom" placeholder="Prénom*" /></br>
            </div>

            <div class="contact_form">
                <input type="email" name="email" id="email" placeholder="Email*" />
            </div>

            <div class="contact_form">
                <input type="text" name="tel" id="tel" placeholder="Téléphone*" /></br>
            </div>

            <div class="contact_form">
                    <textarea type="text" name="Commentaires" id="Commentaires" placeholder="Commentaires">
                    </textarea>
            </div>

            <div class="content">
                <button type="submit" class=" btn btn-primary" name="ValContact">Valider</button>
            </div>

        </form>
    </div>
</section>


