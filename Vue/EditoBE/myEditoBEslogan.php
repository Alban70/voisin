<div class="content_top" style="padding: 3vh 0; !important;">
    <div class="view_content view_content_2cols_50" style="padding: 0; !important;">
        <div class="content">
            <div class="view_content content"
                 style="height: auto; margin: 0 auto; padding: 2vh; background-color: white; !important;">
                <div class="view_content" style="padding: 0 auto; margin: 0 auto; background-color: #1776d2; border-radius:10px;
    border:1px solid #1776d2; !important;">
                    <h1 class="txt_menu_white_centre" style="color: white; text-align: center; !important;">Liste des éditos</h1>
                </div>
            </div>
        </div>

    <div id="contact" class="contact">
        <form method="post" action="">

            <div class="contact_form">
            <input type="hidden" id="valeur_id" name="valeur_id" placeholder="Ref*" />
            </div>

            <div class="contact_form">
                <input type="text" name="titre" id="titre" placeholder="Titre*" />
            </div>

            <div class="contact_form">
                <input type="text" name="type" id="type" placeholder="Type*" />
            </div>


            <!--<div class="content">
                <button type="submit" class=" btn btn-primary" name="ValContact">Valider</button>
            </div>-->

            <ul class="view_flex" style="justify-content: space-between; width:auto; margin: 0 25%; border-radius:10px;
    border:1px solid white;height: auto; background-color: white; !important;">
                <li style="width: 6vw; margin: 0 1% 0 0; !important;">
                    <!--<a style="background-color: #1776d2; !important;" type="submit" class = "btn btn-primary" name="ajouter" href="<?php //echo \Lib\Application::$racine ?>edito/add">Ajouter</a>-->
            <button style="background-color: #1776d2; !important;" type="submit" class = "btn btn-primary" name="ajouter" formaction ="<?php echo \Lib\Application::$racine ?>edito/add">Ajouter</button>
<!--remettre en button le ajouter et faire 2 controleur 1 pour add et l'autre pour valider avec 2 post action different par ecran-->

                </li>
                <li style="margin: 0 1% 0 0; !important;">
            <button style="background-color: #1776d2; !important;" type="submit" class = "btn btn-primary" name="modifier" formaction ="<?php echo \Lib\Application::$racine ?>edito/modify">Modifier</button>
                </li>
                <li style="margin: 0 1% 0 0; !important;">
                    <button style="background-color: #1776d2; !important;" type="submit" class = "btn btn-primary" name="supprimer" formaction ="<?php echo \Lib\Application::$racine ?>edito/delete">Supprimer</button>
                </li>

                <!--<li style="margin: 0 1% 0 0; width: 6vw; height: 4vh; border:#1776d2 1px solid; border-radius:5px; !important;">
                    <button style="/*background-image: url(http://localhost/cms/web/images/seo/loupe64.png);
    background-repeat: no-repeat;
    background-position: center;
    overflow: hidden;*/background-color: #1776d2;width: 100%;height: 100%; margin: 0; !important;" type="submit" class = "imag_icon" name="search" formaction ="<?php echo \Lib\Application::$racine ?>edito/search">
                        <img src="<?php //echo \Lib\Application::$racine; ?>\images\seo\loupe64.png" style="margin: 0;width: 25%; !important;">
                    </button>
                </li>-->
                <li style="width: 6vw; margin: 0 1% 0 0; !important;">
                    <button style="background-color: #1776d2; !important;" type="submit" class = "btn btn-primary" name="supprimer" formaction ="<?php echo \Lib\Application::$racine ?>edito/search">Search</button>
                </li>

                <li style="width: 6vw; margin: 0 1% 0 0; !important;">
                    <button style="background-color: #1776d2; !important;" type="submit" class = "btn btn-primary" name="supprimer" formaction ="<?php echo \Lib\Application::$racine ?>edito/blank">All</button>
                </li>
            </ul>
        </form>

    </div>
</div>
</div>


