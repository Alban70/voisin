<nav>
    <?php
    //include __DIR__ . '/myContactTopRightSousMenu.php';
    ?>
</nav>
<section class="content_degrade">
    <?php
    include __DIR__ . '/myContactSlogan.php';
    ?>
<div style="padding: 2vh 0; !important;">
    <div id="contact" class="contact">
        <form method="post" action="<?php echo \Lib\Application::$racine ?>action/add">
            <div class="contact_form">
                <input style="background-color: white; border-radius:10px;
    border:1px solid inherit;" type="text" name="ste" id="ste" placeholder="Entreprise*" />
            </div>

            <div class="contact_form">
                <input style="background-color: white; border-radius:10px;
    border:1px solid inherit;" type="text" name="siteWeb" id="siteWeb" placeholder="Site Web*" /></br>
            </div>

            <div class="contact_form">
                <input style="background-color: white; border-radius:10px;
    border:1px solid inherit;" type="text" name="nom" id="nom" placeholder="Nom*" />
            </div>
            <div class="contact_form">
                <input style="background-color: white; border-radius:10px;
    border:1px solid inherit;" type="text" name="prenom" id="prenom" placeholder="Prénom*" /></br>
            </div>

            <div class="contact_form">
                <input style="background-color: white; border-radius:10px;
    border:1px solid inherit;" type="email" name="email" id="email" placeholder="Email*" />
            </div>

            <div class="contact_form">
                <input style="background-color: white; border-radius:10px;
    border:1px solid inherit;" type="text" name="tel" id="tel" placeholder="Téléphone*" /></br>
            </div>

            <div class="contact_form">
                    <textarea style="background-color: white; border-radius:10px;
    border:1px solid inherit;" type="text" name="Commentaires" id="Commentaires" placeholder="Commentaires">Message*</textarea>
            </div>

            <div class="content">
                <button type="submit" class=" btn btn-primary" name="ValContact">Valider</button>
            </div>

        </form>
    </div>
</div>
</section>

