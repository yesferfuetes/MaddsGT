<!-- VISTA PEDIDOS DE LA PARTE ADMINISTRADOR -->
<?php 
    headerAdmin($data);//extrallendo header del admin 
    //getModal('modalProductos',$data);
?>
    <div id="divModal"></div>
    <main class="app-content">
      <div class="app-title">
        <div>
            <h1><i class="fas fa-box"></i> <?= $data['page_title'] ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <!-- <li><i class="fa fa-home fa-lg"></i></li> -->
          <!-- <li class="breadcrumb-item"><a href="<?= base_url(); ?>/pedidos"><?= $data['page_title'] ?></a></li> -->
        </ul>
      </div>
        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <br>
                    <table class="table table-hover table-bordered display nowrap" cellspacing="0" id="tablePedidos"><!-- id de datatables -->
                      <thead>                      
                        <tr>
                          <th>ID</th>
                          <th>Ref. / Transacción</th>
                          <th>Fecha</th>
                          <th>Monto</th>
                          <th>Tipo pago</th>
                          <th>Estado</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </main>
<?php footerAdmin($data); ?>
    