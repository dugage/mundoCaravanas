<table class="table table-striped">

    <thead>

        <tr>

            <th>#</th>

            <th>Recibo</th>

            <th>Fecha</th>

            <th>Estado</th>

            <th>Acciones</th>

        </tr>

    </thead>

    <tbody>

        <?php if( $getCollections ): ?>

            <?php foreach ($getCollections as $key => $collection): ?>

                <tr>

                    <td><?= $collection->getId() ?></td>

                    <td><?= $collection->getCdate() ?></td>

                    <td><?= $collection->getDischargedate()->format('d-m-Y') ?></td>

                    <td>Pagado</td>

                    <td></td>

                </tr>

            <?php endforeach ?>   

        <?php endif ?>

        <?php if( $getCollectionNoPayment ): ?>

        <?php foreach ($getCollectionNoPayment as $key => $collection): ?>

            <tr>

                <td>-</td>

                <td><?= $collection ?></td>

                <td>-</td>

                <td>Impagado</td>

                <td>
                    <button type="button" class="btn btn-danger pay-collection">Pagar</button>
                </td>

            </tr>

        <?php endforeach ?>   

        <?php endif ?>

    </tbody>

</table>