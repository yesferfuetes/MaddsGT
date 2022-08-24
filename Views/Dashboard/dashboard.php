<?php headerAdmin($data); ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> <?= $data['page_title'] ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
        </ul>
      </div>
      <!-- <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">Dashboard</div>
          </div>
        </div>
      </div>  -->

      <!-- WIDGETS -->  
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <a href="<?= base_url() ?>/usuarios" class="linkw">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
              <div class="info">
                <h4>Usuarios</h4>
                <p><b>5</b></p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-6 col-lg-3">
          <a href="<?= base_url() ?>/clientes" class="linkw">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-user fa-3x"></i>
              <div class="info">
                <h4>Clientes</h4>
                <p><b>25</b></p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-6 col-lg-3">
          <a href="<?= base_url() ?>/productos" class="linkw">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-shopping-cart fa-3x"></i>
              <div class="info">
                <h4>Productos</h4>
                <p><b>10</b></p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-6 col-lg-3">
          <a href="<?= base_url() ?>/pedidos" class="linkw">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-truck fa-3x"></i>
              <div class="info">
                <h4>Pedidos</h4>
                <p><b>500</b></p>
              </div>
            </div>
          </a>  
        </div>
      </div>  
    </main>
<?php footerAdmin($data); ?>
<div class="container">
      <p class="stext-107">
       <a class="fa fa-copyright"> 2022 Copyright | <?= NOMBRE_EMPESA; ?> | Todos los Derechos Reservados | YFDev.</a>
      </p>
</div>
    