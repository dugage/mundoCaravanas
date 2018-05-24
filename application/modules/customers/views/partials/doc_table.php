<form action="doc_table_submit" method="get" accept-charset="utf-8">
  
  <div class="alert m-alert m-alert--default" role="alert">
    
    <div class="form-group m-form__group row">

      <div class="col-md-5">
        
        <input class="form-control m-input" placeholder="Nombre del docuemtno" value="" id="example-text-input" type="text">

      </div>

      <div class="col-md-5">
        
        <label class="custom-file">
                  <input id="file2" class="custom-file-input" type="file">
                  <span class="custom-file-control"></span>
                </label>

      </div>

      <div class="col-md-2">
        
        <button name="submit-form" type="submit" class="btn btn-primary"><i class="la la-floppy-o"></i> Gurdar</button>

      </div>

    </div>
                          
  </div>

</form>

<?php if( $getResult ): ?>

  <table class="table table-striped">

    <thead>

      <tr>

        <th>#</th>

        <th>Nombre</th>

        <th>Archivo</th>

        <th>Fecha</th>

        <th></th>

      </tr>

    </thead>

    <tbody>
      
      <?php foreach ($getResult as $key => $value): ?>
        

        <tr>

          <th scope="row"><?= $value->getId() ?></th>

          <td><?= $value->getName() ?></td>

          <td><?= $value->getAttached() ?></td>

          <td><?= $value->getDischargeDate()->format('d/m/Y') ?></td>

          <td>
          	
          	<a target="_blank" href="<?= site_url('clientes/doc/'.$value->getId()) ?>" class="btn btn-brand m-btn m-btn--icon m-btn--icon-only">

          		<i class="fa fa-eye"></i>
          		
          	</a>

          	<a href="<?= site_url('customers/deleteDoc/'.$value->getId()) ?>" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only">
          		<i class="fa flaticon-circle"></i>
          	</a>

          </td>

        </tr>

      <?php endforeach ?>

    </tbody>

  </table>

<?php else: ?>

<div class="alert alert-warning" role="alert">Sin documentos adjuntos.</div>

<?php endif ?>