<section class="contant3"
<div class="alert alert-danger">
    <?php //echo $erreur; ?>
</div>
<?php //endif; ?>

<?php //if (isset($success)): ?>
<div class="alert-success">
    <?php //echo $success; ?>
</div>
<?php //endif; ?>

<form method="POST" action="?page=adminAction">
<div class="form-group"

    <label for="id">id :</label>
    <input type="number" class="form-control" name="id" id="id" value= "<?php echo $article['article_id'];?>" >

    <label for="libelle">libelle</label>
    <input type="text" class="form-control" name="libelle" id="libelle" value= "<?php echo $article['libelle'];?>">

    <label for="designation">designation</label>
    <input type="text" class="form-control" name="designation" id="designation">

    <label for="prixHT">prix HT</label>
    <input type="decimal" class="form-control" name="prixHT" id="prixHT" value="0">

    <label for="tva">tva</label>
    <input type="decimal" class="form-control" name="tva" id="tva" value="0">

    <label for="prixTTC">prix TTC</label>
    <input type="decimal" class="form-control" name="prixTTC" id="prixTTC" value="0">

    <label for="actif">actif</label>
    <input type="text" class="form-control" name="actif" id="actif">

    <label for="type">type</label>
    <input type="text" class="form-control" name="type" id="type">

</div>

        <button type="submit" class=" btn btn-primary" name="modArticle">Valider la creation</button>

</form>
</section>
