<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Datos del Cliente</title>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow p-4" style="width: 100%; max-width: 500px;">
            <h3 class="text-center mb-4">Datos del Cliente</h3>
            <form action="index.php?controller=Carrito&action=procesarDatosCliente" method="POST">
                <!-- DNI -->
                <div class="form-group">
                    <label for="dni">CI</label>
                    <input type="text" class="form-control <?php echo isset($errores['dni']) ? 'is-invalid' : ''; ?>" id="dni" name="dni" placeholder="Ingrese su CI" value="<?php echo $_POST['dni'] ?? ''; ?>">
                    <?php if (isset($errores['dni'])): ?>
                        <div class="invalid-feedback"><?php echo $errores['dni']; ?></div>
                    <?php endif; ?>
                </div>

                <!-- Nombre -->
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control <?php echo isset($errores['nombre']) ? 'is-invalid' : ''; ?>" id="nombre" name="nombre" placeholder="Ingrese su nombre" value="<?php echo $_POST['nombre'] ?? ''; ?>">
                    <?php if (isset($errores['nombre'])): ?>
                        <div class="invalid-feedback"><?php echo $errores['nombre']; ?></div>
                    <?php endif; ?>
                </div>

                <!-- Teléfono -->
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control <?php echo isset($errores['telefono']) ? 'is-invalid' : ''; ?>" id="telefono" name="telefono" placeholder="Ingrese su teléfono" value="<?php echo $_POST['telefono'] ?? ''; ?>">
                    <?php if (isset($errores['telefono'])): ?>
                        <div class="invalid-feedback"><?php echo $errores['telefono']; ?></div>
                    <?php endif; ?>
                </div>

                <!-- Dirección -->
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control <?php echo isset($errores['direccion']) ? 'is-invalid' : ''; ?>" id="direccion" name="direccion" placeholder="Ingrese su dirección" value="<?php echo $_POST['direccion'] ?? ''; ?>">
                    <?php if (isset($errores['direccion'])): ?>
                        <div class="invalid-feedback"><?php echo $errores['direccion']; ?></div>
                    <?php endif; ?>
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-between">
                    <a href="/Views/index.php" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Continuar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
