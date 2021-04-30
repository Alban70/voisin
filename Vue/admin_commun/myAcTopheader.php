<section class="topheader">
    <div class="logo">
        <a href="<?php echo \Lib\Application::$racine; ?>">WC</a>
    </div>
    <div class="contentDesktop content_auto" style="padding-left: 1%; /*width: 27rem;*/ !important;">
    <?php
    //include __DIR__ . '/../inc/' . $file;
    include __DIR__ . '/myAcnReseauSociaux.php';
    ?>
    </div>



    <div class="coordonnees" style="padding-left: 18%; !important">
        <ul>
            <li class="goog">
                <img src="<?php echo \Lib\Application::$racine; ?>\images\icon\tel-icon.png" alt"facebook">
                <a style ="letter-spacing: 1px; text-decoration: none; !important;" href="#">04 42 65 12 55</a>
            </li>
            <li class="email">
                <img src="<?php echo \Lib\Application::$racine; ?>\images\icon\mail-icon.png" alt"facebook">
                <!--<a href="<?php echo \Lib\Application::$racine; ?>contact">Contact@well-com-solutions.com</a>-->
                <a href="<?php echo \Lib\Application::$racine; ?>contact" class="txt_lien_blue">Contact@well-com-solutions.com</a>
            </li>
        </ul>
    </div>

    <div class="essai" style="padding: 0.35% 0 0 31.1%;">
        <ul>
        <?php if (isset($_SESSION['auth']) AND $_SESSION['auth'] === true) : ?>
            <li class="demo">
                <a style="/*vertical-align: center;*/ background-color: #ee3954; !important;" href="?page=deconnexion" class="myButton_crm">Déconnexion</a>
            </li>
        <?php else: ?>
            <li class="demo">
                <a class="myButton_crm" href="<?php echo \Lib\Application::$racine; ?>connexion">Connexion</a>
            </li>
        <?php endif; ?>
        </ul>
    </div>
</section>

