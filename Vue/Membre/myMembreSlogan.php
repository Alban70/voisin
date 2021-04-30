<div class="content_top" style="padding: 3vh 0; !important;">
    <div class="view_content view_content_2cols_50" style="padding: 0; !important;">
        <div class="content">
            <div class="view_content content"
                 style="height: auto; margin: 0 auto; padding: 2vh; background-color: white; !important;">
                <div class="view_content" style="padding: 0 auto; margin: 0 auto; background-color: #1776d2; border-radius:10px;
    border:1px solid #1776d2; !important;">
                    <h1 class="txt_menu_white_centre" style="color: white; text-align: center; !important;">Liste des clients</h1>
                </div>
            </div>
        </div>

    <div id="contact" class="contact">
        <form method="post" action="<?php echo \Lib\Application::$racine ?>contact/add">

            <div class="contact_form">
            <input type="number" id="valeur_id" name="valeur_id" placeholder="Ref*" />
            </div>

            <div class="contact_form">
                <input type="text" name="ste" id="ste" placeholder="Entreprise*" />
            </div>

            <div class="contact_form">
                <input type="text" name="cp" id="cp" placeholder="Code postal*" />
            </div>

            <div class="contact_form">
                <input type="text" name="ville" id="ville" placeholder="Ville*" />
            </div>

            <!--<div class="content">
                <button type="submit" class=" btn btn-primary" name="ValContact">Valider</button>
            </div>-->

            <ul class="view_flex" style="justify-content: space-between; width:auto; margin: 0 25%; border-radius:10px;
    border:1px solid white;height: auto; background-color: white; !important;">
                <li style="margin: 0 1% 0 0; !important;">
            <button style="background-color: #1776d2; !important;" type="submit" class = "btn btn-primary" name="ajouter" formaction ="<?php echo \Lib\Application::$racine ?>theme_adminPo/web/article/add">Ajouter</button>
                </li>
                <li style="margin: 0 1% 0 0; !important;">
            <button style="background-color: #1776d2; !important;" type="submit" class = "btn btn-primary" name="modifier" >Modifier</button>
                </li>
                <li style="margin: 0 1% 0 0; !important;">
            <button style="background-color: #1776d2; !important;" type="submit" class = "btn btn-primary" name="supprimer" >Supprimer</button>
                </li>
                <li style="background-color: #1776d2; width: 6vw; border:#1776d2 1px solid; border-radius:5px; !important;">
            <a class="view_flex_row_uniquement" style="padding: 0 35%; !important;">
                <div class="imag_icon" style="margin: 0;width: 2vw; !important;">
                    <img src="<?php echo \Lib\Application::$racine; ?>\images\seo\loupe64.png">
                </div>
            </a>
                </li>
            </ul>
        </form>
    </div>
</div>
</div>


