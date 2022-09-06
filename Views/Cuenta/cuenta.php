<!-- VISTA DE LOGIN DE PARTE ADMIN Y FRONTEND -->
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="YFDev">
    <meta name="theme-color" content="#c2899d">
    <link rel="shortcut icon" href="<?= media();?>/tienda/images/favicon.png">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/style.css">
    
    <title><?= $data['page_tag']; ?></title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1 class="logo_login"><a href="<?= base_url(); ?>" target="_blank"><?= $data['page_title']; ?></a></h1>
      </div>
      <div class="login-box">
      <div id="divLoading" >
          <div>
            <img src="<?= media(); ?>/images/loading.svg" alt="Loading">
          </div>
        </div>
        <form class="login-form" name="formRegister" id="formRegister" action="">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Crear cuenta</h3>
          <p>Recuerda, por seguridad y para validar tu cuenta la contraseña se genera automatica y te estara llegando a tu correo electronico, puedes cambiarla despues en tu perfil.</p>
                <div class="row">
                    <div class="col col-md-6 form-group">
                        <label for="txtNombre">Nombres</label>
                        <input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" required="">
                    </div>
                    <div class="col col-md-6 form-group">
                        <label for="txtApellido">Apellidos</label>
                        <input type="text" class="form-control valid validText" id="txtApellido" name="txtApellido" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-6 form-group">
                        <label for="txtTelefono">Teléfono</label>
                        <input type="text" class="form-control valid validNumber" id="txtTelefono" name="txtTelefono" required="" onkeypress="return controlTag(event);">
                    </div>
                    <div class="col col-md-6 form-group">
                        <label for="txtEmailCliente">Email</label>
                        <input type="email" class="form-control valid validEmail" id="txtEmailCliente" name="txtEmailCliente" required="">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Regístrate</button>
                <br>
                <div class="form-group mt-3">
                  <p class="semibold-text mb-0"><a href="<?= base_url() ?>/login" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Regresar a Iniciar sesión</a></p>
                </div>
        </form>
      </div>
    </section>
    <script>
        const base_url = "<?= base_url(); ?>";
    </script>
    <!-- Essential javascripts for application to work-->
    <script src="<?= media(); ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?= media(); ?>/js/popper.min.js"></script>
    <script src="<?= media(); ?>/js/bootstrap.min.js"></script>
    <script src="<?= media(); ?>/js/fontawesome.js"></script>
    <script src="<?= media(); ?>/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="<?= media();?>/js/plugins/sweetalert.min.js"></script>
    <script src="<?= media(); ?>/js/<?= $data['page_functions_js']; ?>"></script>
  </body>
</html>