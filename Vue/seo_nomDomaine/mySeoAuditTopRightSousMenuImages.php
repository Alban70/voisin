<div class="myheader2">
    <div id="h_hm_crm_nav_bar3" class="hpTop" style="background-color: #4A89DC; !important;">
        <div id="hamburger" class="hamburger">
            <div class="menu-menu-seo-container">
                <ul class="menu-menu-seo-container ul">
                    <li>
                            <a href="<?php echo \Lib\Application::$racine; ?>auditSeo" style="color: #ffc107; !important;">Audit</a>
                    </li>
                    <li>
                            <a href="<?php echo \Lib\Application::$racine; ?>accompagnementSeo" style="color:white; !important;">Accompagnement</a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="cross" class="contentCacher">
            <ul id="menuID" class="menu-menu-header-container ul">
                <li><a href="<?php echo \Lib\Application::$racine; ?>societe">Société</a></li>
                <li><a href="<?php echo \Lib\Application::$racine; ?>referencementNaturel">Référencement</a></li>
                <li><a href="<?php echo \Lib\Application::$racine; ?>Sea">Google Adwords</a></li>
                <li><a href="<?php echo \Lib\Application::$racine; ?>ReseauxSociaux">Réseaux sociaux</a></li>
                <li><a href="<?php echo \Lib\Application::$racine; ?>formationReferencementNaturel">Formation</a></li>
                <li><a href="<?php echo \Lib\Application::$racine; ?>tarifs">Tarifs</a></li>
                <li><a href="<?php echo \Lib\Application::$racine; ?>blog">Blog</a></li>
                <li><a href="<?php echo \Lib\Application::$racine; ?>GuideSeo">Guide</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div id="dHamburger" class="container">
            <div class="bar1" style="color:#ffc107; !important;"></div>
            <div class="bar2" style="color:#ffc107; !important;"></div>
            <div class="bar3" style="color:#ffc107; !important;"></div>
        </div>
        <div id="dCross" class="changeCacher">
            <div class="bar1" style="color:#ffc107; !important;"></div>
            <div class="bar2" style="color:#ffc107; !important;"></div>
            <div class="bar3" style="color:#ffc107; !important;"></div>
        </div>
    </div>
    <div class="content">
        <?php
        include __DIR__ . '/mySeoAuditHeader2PrestationDesktop.php';
        include __DIR__ . '/mySeoAuditPrestaHorizMenuClickFlexMobileUniquement.php'; /*activer aussi le php dans mySeoAuditTopRightSousMenuImages.php*/
        ?>
    </div>
</div>