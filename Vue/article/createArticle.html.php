<div class="alert alert-danger">
    <?php //echo $erreur; ?>
</div>
<?php //endif; ?>

<?php //if (isset($success)): ?>
<div class="alert-success">
    <?php //echo $success; ?>
</div>
<?php //endif; ?>

<form method="POST" enctype="multipart/form-data">
<div class="form-group"
    <label for="libelle">libelle</label>
    <input type="text" class="form-control" name="libelle" id="libelle">

    <!--<label for="designation">designation</label>
    <input type="text" class="form-control" name="designation" id="designation">

    <label for="prixHT">prix HT</label>
    <input type="number" class="form-control" name="prixHT" id="prixHT" value="0">

    <label for="tva">tva</label>
    <input type="decimal" class="form-control" name="tva" id="tva" value="0">

    <label for="prixTTC">prix TTC</label>
    <input type="decimal" class="form-control" name="prixTTC" id="prixTTC" value="0">

    <label for="actif">actif</label>
    <input type="text" class="form-control" name="actif" id="actif">

    <label for="type">type</label>
    <input type="text" class="form-control" name="type" id="type">

    <label for="statut">Statut</label>
    <input type="text" class="form-control" name="statut" id="statut">-->


    </div>




    <!--<div class="form-group">

        <label>  Famille : </label> <select class="form-control" name="famille">
            <option value="0">Sélectionnez...</option>
            <?php //foreach ($familles as $famille): ?>
                <option value="<?php //echo $famille['fam_id']; ?>" <?php //if ($id == $famille['fam_id']): ?>selected <?php //endif; ?>><?php //echo $famille['libelle']; ?></option>
            <?php //endforeach; ?>

        </select>
    </div>-->



        <button type="submit" class=" btn btn-primary" name="ok">Valider la creation</button>

</form>

