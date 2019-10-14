
<h1> Factura data <?= $factura->getDate() ?> </h1>
<div id="factura">
    <h3>Import Brut : <?= $factura->getBaseI() ?> </h3>
    <h3>Iva : <?= $factura::IVA ?></h3>
    <h3>Recàrrec : <?= $factura->getTaxes() ?></h3>
    <h3>Import Total : <?= $factura->getNetI() ?></h3>
    <h4><?= ($factura->getState())?'Pagada':'Per cobrar' ?></h4>
</div>

