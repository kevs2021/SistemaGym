<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BodyFit</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url; ?>Assets/vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url; ?>Assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url; ?>Assets/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url; ?>img/gymLogo1.png" />
  <style>
    form .form-group {
      display: flex;
      flex-direction: column; 
      align-items: flex-start; 
    }
    form .form-group label {
      font-weight: bold;
      color: #392C70 ; 
    }
  </style>
</head>

<body style="background-color: #f4eef9;">
  <div class="container-scroller d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-lg-4 col-md-6 col-sm-8 d-flex align-items-center justify-content-center">
      <div class="auth-form-transparent text-center p-4">
        <div class="brand-logo mb-4">
          <img src="<?php echo base_url; ?>img/gymLogo1.png" alt="logo" style="max-width: 100px;">
        </div>
        <h4 class="text-primary">Bienvenido a bodyFit</h4>
        <h6 class="font-weight-bold " style="font-size: 21px; color:#7f0dff;">Inicio de Sesion</h6>
        <div class="alert alert-danger d-none" role="alert" id="alerta"></div>
        <form class="pt-3" id="frmLogin" onsubmit="frmLogin(event)">
          <div class="form-group">
            <label for="usuario">Usuario:</label>
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                <span class="input-group-text bg-transparent border-right-0">
                  <i class="fa fa-user text-primary"></i>
                </span>
              </div>
              <input type="text" class="form-control form-control-lg border-left-0" id="usuario" placeholder="Ingresa tu usuario" name="usuario">
            </div>
          </div>
          <div class="form-group">
            <label for="clave">Contraseña:</label>
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                <span class="input-group-text bg-transparent border-right-0">
                  <i class="fa fa-lock text-primary"></i>
                </span>
              </div>
              <input type="password" class="form-control form-control-lg border-left-0" id="clave" name="clave" placeholder="Ingresa tu contraseña">                        
            </div>
          </div>
          <div class="my-3">
            <button class="btn btn-primary btn-lg btn-block font-weight-medium auth-form-btn" type="submit" id="btnAccion">INICIAR</button>
          </div>
          <!-- Enlace de Olvidaste tu contraseña -->
          <div class="my-3">
            <a href="<?php echo base_url . 'Views/olvidaste-tu-contrasena.php'; ?>" class="text-decoration-none" style="color:#7f0dff;">Olvidaste tu contraseña?</a>
          </div>

        </form>
      </div>
    </div>
  </div>
  <!-- plugins:js -->
  <script src="<?php echo base_url; ?>Assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url; ?>Assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <script src="<?php echo base_url; ?>Assets/js/off-canvas.js"></script>
  <script src="<?php echo base_url; ?>Assets/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url; ?>Assets/js/misc.js"></script>
  <script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
  <script>
    const base_url = '<?php echo base_url; ?>';
  </script>
  <script src="<?php echo base_url; ?>Assets/js/login.js"></script>
</body>
</html>