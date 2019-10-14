<form method="POST" action="">
    <select name="zona">
        <?php
            foreach ($zonas as $key => $zona) {
        ?>
            <option value="<?= $key ?>"><?= $zona->getTitle() ?> <?= $zona->getTickets() ?></option>
        <?php
            }
        ?>
    </select><br/>
    <input type="number" name="entradas" min="1" /><br/>
    <input type="submit" name="submit"/><br>
</form>