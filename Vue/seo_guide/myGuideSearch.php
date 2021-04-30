<div class="content" style="padding: 0; background-color: white; !important;">
    <div class="content" style="width: 96%; margin: 0 auto; padding: 0; background-color: #1776d2; border-radius:10px;
    border:1px solid #1776d2;  !important;">
        <div class="view_content view_content_2cols_50" style="padding: 0; margin: auto; !important;">
            <div class="content">
                <div class="view_content content"
                     style="height: auto; margin: 0 auto; padding: 2vh; background-color: #1776d2; !important;">
                    <div class="view_content" style="padding: 0 auto; margin: 0 auto; background-color: #1776d2; border-radius:10px;
    border:1px solid #1776d2; !important;">
                        <h1 class="txt_menu_white_centre" style="color: white; text-align: center; !important;">Search
                            your best tour</h1>
                    </div>
                </div>
            </div>

            <div id="contact" class="contact">
                <form method="post" action="">

                    <div class="contact_form">
                        <input style="background-color: white" type="number" id="valeur_id" name="valeur_id"
                               placeholder="Ref*"/>
                    </div>

                    <div class="contact_form">
                        <input style="background-color: white" type="text" name="titre" id="titre"
                               placeholder="Titre*"/>
                    </div>

                    <div class="contact_form">
                        <input style="background-color: white" type="text" name="type" id="type" placeholder="Type*"/>
                    </div>

                    <div class="contact_form">
                        <select class="form" name="fam_id" id="fam_id">
                            <option value="0">Sélectionnez un pays...</option>
                            <?php //foreach ($all_pays as $pays): ?>
                                <?php //var_dump($pays); ?>
                                <option value="<?php //echo $pays->getId(); ?>"
                                        selected><?php //echo $pays->getLibelle2(); ?></option>
                            <?php //endforeach; ?>
                        </select>
                    </div>
                    <!--<div class="contact_form">
                        <select class="form" name="fam_id" id="fam_id">
                            <option value="0">Sélectionnez un parent...</option>
                            <?php //foreach ($all_FamilleSlugs as $FamilleSlugs): ?>
                                <option value="<?php //echo $FamilleSlugs->getFamId(); ?>"
                                        selected><?php //echo $FamilleSlugs->getLibelle(); ?></option>
                            <?php //endforeach; ?>
                        </select>
                    </div>-->

                    <ul class="view_flex" style="justify-content: space-between; width:auto; margin: 0 35%; /*border-radius:10px;
    border:1px solid white;*/ height: auto; background-color: #1776d2; !important;">
                        <li style="margin: 0 1% 0 0; !important;">
                            <button style="width: 6vw; background-color: #ee3954; !important;" type="submit"
                                    class="btn btn-primary" name="supprimer"
                                    formaction="<?php //echo \Lib\Application::$racine ?>home/search">Search
                            </button>
                        </li>

                        <li style="margin: 0 1% 0 0; !important;">
                            <button style="width: 6vw; background-color: #ee3954; !important;" type="submit"
                                    class="btn btn-primary" name="supprimer"
                                    formaction="<?php //echo \Lib\Application::$racine ?>home">All
                            </button>
                        </li>
                    </ul>

                </form>

            </div>
        </div>
        <?php
        include __DIR__ . '/myGuideResultTexte.php';
        //include __DIR__ . '/myHomeCardResult.php';
        ?>
    </div>
</div>


