<section class="content_top" style="background-image: none; !important;">


    <div id="contact" class="contact">


        <form method="post" action="<?php echo \Lib\Application::$racine ?>admin/modifyfamille">
            <div class="contact_form">
                <input type="hidden" name="id" id="id" value= "<?php echo $famille_edit->getFamId();?>" />
            </div>

            <div class="contact_form">
                <input type="text" name="libelle" id="libelle" value= "<?php echo $famille_edit->getLibelle();?>" />
            </div>

            <div class="contact_form">
                <input type="text" name="type" id="type" value= "<?php echo $famille_edit->getType();?>" />
            </div>

            <!--<div class="contact_form">
                <select class="form"  name="famille" id="famille">
                    <option value="0">Sélectionnez Famille...</option>
                    <?php //foreach ($familles as $famille): ?>
                        <option value="<?php //echo $famille->getFamId(); ?>" selected><?php //echo $famille->getLibelle(); ?></option>
                    <?php //endforeach; ?>

                </select>
            </div>-->





            <div class="content">
                <button type="submit" class=" btn btn-primary" name="ValEdito">Valider</button>
            </div>

        </form>
    </div>
</section>


