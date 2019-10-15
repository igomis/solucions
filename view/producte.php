
<div style="float:left;margin: 80px;">
    <img src="images/<?= $producte->imatge ?>" width="300" height="300"><br/>
    <h3><?= $producte->desc ?></h3>
    <p><strong>Preu :</strong> <?= $producte->preu ?></p>
    <p><strong>Unitats :</strong> <?= $producte->unitats ?></p>
    <form method="post">
    <input type="'hidden" name='id' value="<?= $producte->id ?>" />
    <?php if ($estaCistella === false){ ?>
        <input type="submit" name="afegir" value="afegir">
    <?php } else { ?>
        <input type="submit" name="esborrar" value="esborrar">
    <?php } ?>
    </form>
</div>