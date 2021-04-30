<section class="content_top" style="background-image: none; !important;">


    <div id="contact" class="contact">


        <form method="post" action="<?php echo \Lib\Application::$racine ?>admin/modifyedito">
            <div class="contact_form">
                <input type="hidden" name="id" id="id" value= "<?php echo $edito_edit->getId();?>" />
            </div>

            <div class="contact_form">
                <input type="text" name="titre" id="titre" value= "<?php echo $edito_edit->getTitre();?>" />
            </div>

            <textarea name="contenu" class="form-control" id="editor" rows="15" cols="150" value= "<?php echo $edito_edit->getContenu();?>"></textarea>


            <div class="contact_form">
                <input type="text" name="contenu" id="contenu" value= "<?php echo $edito_edit->getContenu();?>" />
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


