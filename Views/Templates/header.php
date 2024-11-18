<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gimnasio</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/vendors/iconfonts/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/snackbar.min.css">
    <link href="<?php echo base_url; ?>Assets/css/jquery-ui.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="<?php echo base_url; ?>img/gymLogo1.png" />
</head>

<body>
    <div class="container-scroller" style="background: linear-gradient(85deg, #392c70, #6a005b);">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar" style="background: linear-gradient(85deg, #392c70, #6a005b);">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="<?php echo base_url; ?>administracion/home">BodyFit</a>
                <a class="navbar-brand brand-logo-mini" href="<?php echo base_url; ?>administracion/home">Gym</a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="fas fa-bars"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="<?php echo base_url; ?>Assets/images/user.png" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="<?php echo base_url; ?>usuarios/perfil">
                                <i class="fas fa-cog text-primary"></i>
                                Configurar
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo base_url; ?>usuarios/salir">
                                <i class="fas fa-power-off text-primary"></i>
                                Cerrar Sesion
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="fas fa-bars"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
            </div>
            <div id="right-sidebar" class="settings-panel">
                <i class="settings-close fa fa-times"></i>
                <ul class="nav nav-tabs" id="setting-panel" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
                    </li>
                </ul>
            </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas shadow-lg" id="sidebar" style="background: linear-gradient(85deg, #392c70, #6a005b);">
                <ul class="nav">
                    <li class="nav-item nav-profile" style="color: #FFFFFF;">
                        <div class="nav-link" style="color: #FFFFFF;">
                            <div class="profile-image">
                                <img src="<?php echo base_url; ?>Assets/images/user.png" alt="image" />
                            </div>
                            <div class="profile-name" style="color: #FFFFFF;">
                                <p class="name">
                                <?php echo $_SESSION['nombre']; ?>
                                </p>
                                <p class="designation" style="color: #FFFFFF;">
                                <?php echo $_SESSION['usuario']; ?>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url . 'administracion/home'; ?>">
                            <i class="fa fa-home menu-icon" ></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url; ?>usuarios">
                            <i class="fa fa-user menu-icon" ></i>
                            <span class="menu-title">Empleados</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url; ?>planes">
                            <i class="fa fa-list-alt menu-icon" ></i>
                            <span class="menu-title">Planes de membresia</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
                            <i class="fa fa-users menu-icon"></i>
                            <span class="menu-title" >Clientes</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="page-layouts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="<?php echo base_url; ?>clientes">Listado</a></li>
                                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="<?php echo base_url; ?>clientes/plan">registrar membresia</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url; ?>clientes/pagos">Pagos</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url; ?>asistencias">
                            <i class="fa fa-calendar menu-icon" ></i>
                            <span class="menu-title">Asistencias</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url; ?>rutinas">
                            <i class="fa fa-list menu-icon"></i>
                            <span class="menu-title">Clases</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url; ?>entrenador">
                            <i class="fa fa-user menu-icon" ></i>
                            <span class="menu-title" >Entrenador</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url; ?>administracion">
                            <i class="fa fa-cog menu-icon"></i>
                            <span class="menu-title">Ajustes</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    
                