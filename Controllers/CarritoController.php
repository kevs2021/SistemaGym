<?php
class CarritoController {
    public function datosCliente() {
        require_once 'views/carrito/formulario_cliente.php';
    }

    public function procesarDatosCliente() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errores = [];

            // Validaciones
            $dni = $_POST['dni'] ?? '';
            $nombre = $_POST['nombre'] ?? '';
            $telefono = $_POST['telefono'] ?? '';
            $direccion = $_POST['direccion'] ?? '';

            if (!preg_match('/^[0-9]{7,8}$/', $dni)) {
                $errores['dni'] = 'El CI debe tener entre 7 y 8 dígitos.';
            }

            if (empty($nombre) || strlen($nombre) < 3) {
                $errores['nombre'] = 'El nombre es obligatorio y debe tener al menos 3 caracteres.';
            }

            if (!preg_match('/^[0-9]{7,}$/', $telefono)) {
                $errores['telefono'] = 'El teléfono debe tener al menos 7 dígitos.';
            }

            if (empty($direccion)) {
                $errores['direccion'] = 'La dirección es obligatoria.';
            }

            if (count($errores) > 0) {
                require_once 'views/carrito/formulario_cliente.php';
            } else {
                // Procesar datos y redirigir al siguiente paso
                header('Location: index.php?controller=Carrito&action=confirmacion');
                exit;
            }
        }
    }
}
?>
