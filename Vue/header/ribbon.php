<nav id="h_hm_crm_nav_bar3" class="myheader2">
    <div class="contentDesktop">
        <section class="flex ribbon">
            <div>
                <a href="/consultants-seo/Web/app.php"><img
                            src="<?php echo \Lib\Application::$images; ?>Logo-Well-Com-Couleur.svg"></a>
            </div>
            <div class="menu-menu-header-container">
                <ul class="menu-menu-header-container ul">
                    <li>
                        <a class="arrow-down">Métiers</a>
                        <ul>
                            <li><a href="<?php echo \Lib\Application::$racine; ?>referencementNaturel">Boulangerie</a></li>
                            <li><a href="<?php echo \Lib\Application::$racine; ?>etudeVisibilite">Prêt à porter</a></li>
                            <li><a href="<?php echo \Lib\Application::$racine; ?>auditSeo">Alimentation</a>
                            </li>
                            <li><a href="<?php echo \Lib\Application::$racine; ?>experienceUtilisateur">Restaurant</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo \Lib\Application::$racine; ?>serp">E-commerce</a></li>
                    <li><a href="<?php echo \Lib\Application::$racine; ?>accompagnementSeo">loi fiscale</a>
                    <li><a href="<?php echo \Lib\Application::$racine; ?>Sea">revendeurs</a>
                    <li><a href="<?php echo \Lib\Application::$racine; ?>contact">Contact</a></li>
                </ul>
            </div>
            <div class="customize">
                <a href="<?php echo \Lib\Application::$racine; ?>contact">
                    <div class="ico-customize btn-customize"> Une démonstration ?</div>
                </a>
            </div>
        </section>
    </div>
    <div class="contentMobile">
        <section class="flex ribbon">
            <div>
                <a href="/consultants-seo/Web/app.php"><img
                            src="<?php echo \Lib\Application::$images; ?>Logo-Well-Com-Couleur.svg"></a>
            </div>
            <div class="customize">
                <a href="<?php echo \Lib\Application::$racine; ?>contact">
                    <div class="ico-customize btn-customize"> Une démonstration ?</div>
                </a>
            </div>

            <!--    Made by Erik Terwan    -->
            <!--   24th of November 2015   -->
            <!--        MIT License        -->

            <nav role="navigation">
                <div id="menuToggle">
                    <!--
                    A fake / hidden checkbox is used as click reciever,
                    so you can use the :checked selector on it.
                    -->
                    <input type="checkbox"/>

                    <!--
                    Some spans to act as a hamburger.

                    They are acting like a real hamburger,
                    not that McDonalds stuff.
                    -->
                    <span></span>
                    <span></span>
                    <span></span>

                    <!--
                    menu small simple ouvert
                    -->

                    <!--
                    menu small toogle
                    -->
                    <ul id="menu">
                        <li>
                        <label for="menu-accordion-toggle-referencement">Métiers</label>
                        <input type="checkbox" id="menu-accordion-toggle-referencement"/>
                        <ul id="menu-accordion-referencement">
                            <li><a href="<?php echo \Lib\Application::$racine; ?>referencementNaturel">Boulangerie</a></li>
                            <li><a href="<?php echo \Lib\Application::$racine; ?>etudeVisibilite">Prêt à porter</a></li>
                            <li><a href="<?php echo \Lib\Application::$racine; ?>etudeVisibilite">Alimentation</a></li>
                            <li><a href="<?php echo \Lib\Application::$racine; ?>etudeVisibilite">Restaurant</a></li>
                        </ul>
                        </li>
                        <li>
                            <a>E-commerce</a>
                        </li>
                        <li>
                            <a>Loi fiscale</a>
                        </li>
                        <li>
                            <a>Revendeurs</a>
                        <li>
                            <a>Contact</a>
                        </li>
                        <!--<div id='content'>Below content<div/>-->
                    </ul>
                </div>
            </nav>
        </section>
    </div>
</nav>