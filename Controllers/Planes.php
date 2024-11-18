<?php

class Planes extends Controller
{
    protected $user;
    protected $clientesModel;  // Declarar la propiedad

    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url);
        }
        parent::__construct();
        $this->clientesModel = $this->loadModel('ClientesModel'); // Cargar el modelo de clientes en el constructor
        $this->user = $_SESSION['id_usuario'];
    }
    // Método para cargar modelos
    public function loadModel($modelName)
    {
        // Generar el nombre completo del archivo del modelo
        $modelPath = 'models/' . $modelName . '.php';
        
        // Verificar si el archivo existe
        if (file_exists($modelPath)) {
            // Incluir el archivo del modelo
            require_once $modelPath;

            // Crear una instancia del modelo
            $model = new $modelName();

            // Devolver la instancia del modelo
            return $model;
        } else {
            // Si no se encuentra el archivo, lanzar un error
            die("El modelo '$modelName' no existe.");
        }
    }
    public function index()
    {
        if ($_SESSION['rol'] != 1) {
            header('Location: ' . base_url . 'administracion/permisos');
            exit;
        }
        $this->views->getView($this, "index");
    }
    public function listar()
    {
        if ($_SESSION['rol'] != 1) {
            header('Location: ' . base_url . 'administracion/permisos');
            exit;
        }
        $data = $this->model->getPlanes(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['estado'] = '<span class="badge bg-success">Activo</span>';
            $data[$i]['imagen'] = '<img class="img-thumbnail" src="' . base_url . "Assets/images/planes/" . $data[$i]['imagen'] . '" width="50">';
            $data[$i]['editar'] = '<button class="btn btn-primary" type="button" onclick="btnEditarPlan(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></button>';
            $data[$i]['eliminar'] = '<button class="btn btn-danger" type="button" onclick="btnEliminarPlan(' . $data[$i]['id'] . ');"><i class="fas fa-trash-alt"></i></button>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar()
    {
        if ($_SESSION['rol'] != 1) {
            header('Location: ' . base_url . 'administracion/permisos');
            exit;
        }
        $nombre = strClean($_POST['nombre']);
        $descripcion = strClean($_POST['descripcion']);
        $precio_plan = strClean($_POST['precio_plan']);
        $condicion = strClean($_POST['condicion']);
        $img = $_FILES['imagen'];
        $name = $img['name'];
        $tmpname = $img['tmp_name'];
        $fecha = date("YmdHis");
        $id = strClean($_POST['id']);
        if (empty($nombre) || empty($descripcion) || empty($precio_plan)) {
            $msg = array('msg' => 'Todo los campos son obligatorios', 'icono' => 'warning');
        } else {
            if (!empty($name)) {
                $extension = pathinfo($name, PATHINFO_EXTENSION);
                $formatos_permitidos =  array('png', 'jpeg', 'jpg');
                $extension = pathinfo($name, PATHINFO_EXTENSION);
                if (!in_array($extension, $formatos_permitidos)) {
                    $msg = array('msg' => 'Archivo no permitido', 'icono' => 'warning');
                } else {
                    $imgNombre = $fecha . ".jpg";
                    $destino = "Assets/images/planes/" . $imgNombre;
                }
            } else if (!empty($_POST['foto_actual']) && empty($name)) {
                $imgNombre = $_POST['foto_actual'];
            } else {
                $imgNombre = "default.png";
            }
            if ($id == "") {
                $data = $this->model->registrarPlan($nombre, $descripcion, $precio_plan, $condicion, $imgNombre, $this->user);
                if ($data == "ok") {
                    if (!empty($name)) {
                        move_uploaded_file($tmpname, $destino);
                    }
                    $msg = array('msg' => 'Plan registrado con éxito', 'icono' => 'success');
                } else if ($data == "existe") {
                    $msg = array('msg' => 'El plan ya existe', 'icono' => 'warning');
                } else {
                    $msg = array('msg' => 'Error al registrar', 'icono' => 'error');
                }
            } else {
                $imgDelete = $this->model->editarPlan($id);
                if ($imgDelete['imagen'] != 'default.png') {
                    if (file_exists("Assets/images/planes/" . $imgDelete['imagen'])) {
                        unlink("Assets/images/planes/" . $imgDelete['imagen']);
                    }
                }
                $data = $this->model->modificarPlan($nombre, $descripcion, $precio_plan, $condicion, $imgNombre ,$id);
                if ($data == "modificado") {
                    if (!empty($name)) {
                        move_uploaded_file($tmpname, $destino);
                    }
                    $msg = array('msg' => 'Plan modificado', 'icono' => 'success');
                } else {
                    $msg = array('msg' => 'Error al modificar', 'icono' => 'error');
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar($id)
    {
        if ($_SESSION['rol'] != 1) {
            header('Location: ' . base_url . 'administracion/permisos');
            exit;
        }
        $data = $this->model->editarPlan($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar($id)
    {
        if ($_SESSION['rol'] != 1) {
            header('Location: ' . base_url . 'administracion/permisos');
            exit;
        }
        $data = $this->model->accionPlan(0, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Plan dado de baja', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al eliminar', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrarPlanCliente() {
        // Configurar zona horaria para Bolivia
        date_default_timezone_set('America/La_Paz');
    
        // Recibir datos del formulario
        $id_cli = strClean($_POST['id_cli']);
        $id_plan = strClean($_POST['id_plan']);
        $fecha_venc = date('Y-m-d'); // Fecha actual (inicio del plan)
        $hora = date('H:i:s');       // Hora actual
    
        // Obtener los detalles del plan, incluyendo 'condicion' (duración o tipo)
        $consultaPlan = $this->model->editarPlan($id_plan);
        $condicion = $consultaPlan['condicion']; // Puede ser 'MENSUAL', 'ANUAL' o una duración en días
    
        // Calcular la fecha límite
        if ($condicion == 'MENSUAL') {
            // Si es mensual, sumamos un mes a la fecha de inicio
            $fecha_limite = date("Y-m-d", strtotime($fecha_venc . ' +1 month'));
        } else if ($condicion == 'ANUAL') {
            // Si es anual, sumamos un año
            $fecha_limite = date("Y-m-d", strtotime($fecha_venc . ' +1 year'));
        } else {
            // Si es un número, interpretamos como días
            $duracion = (int)$condicion; // Convertimos a entero
            $fecha_limite = date("Y-m-d", strtotime($fecha_venc . ' +' . $duracion . ' days'));
        }
    
        // Validar campos
        if (empty($id_cli) || empty($id_plan)) {
            $msg = array('msg' => 'Todos los campos son obligatorios', 'icono' => 'warning');
        } else {
            // Registrar el plan
            $data = $this->model->registrarPlanCliente($id_cli, $id_plan, $fecha_venc, $hora, $fecha_venc, $fecha_limite, $this->user);
            if ($data == "ok") {
                $msg = array('msg' => 'Plan registrado con éxito', 'icono' => 'success');
            } else if ($data == "existe") {
                $msg = array('msg' => 'El plan ya existe', 'icono' => 'warning');
            } else {
                $msg = array('msg' => 'Error al registrar', 'icono' => 'error');
            }
        }
    
        // Retornar respuesta en JSON
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    
    
    public function desactivar($id)
    {
        $data = $this->model->desactivarPlan(0, $id);
        if ($data == 'ok') {
            $msg = array('msg' => 'Plan desactivado con éxito', 'icono' => 'success');
        }else{
            $msg = array('msg' => 'Error al desactivar', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrarPago($id)
{
    if (!empty($id) || is_integer($id)) {
        $consultar = $this->model->consultarDetalle($id);
        $empresa = $this->model->getEmpresa();
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $consultaPlan = $this->model->editarPlan($consultar['id_plan']);
        
        // Lógica para calcular la fecha de vencimiento
        if ($consultaPlan == 'MENSUAL') {
            $fecha_venc = date("Y-m-d", strtotime($consultar['fecha_venc'] . '+1 month'));
        } else {
            $fecha_venc = date("Y-m-d", strtotime($consultar['fecha_venc'] . '+1 year'));
        }
        
        $fecha_limite = date("Y-m-d", strtotime($fecha_venc . '+ ' . $empresa['limite'] . ' days'));
        
        // Registrar el pago
        $data = $this->model->registrarPago($fecha_venc, $fecha_limite, $id);
        
        if ($data == 'ok') {
            // Registrar el detalle del pago
            $detalle = $this->model->registrarDetallePago($id, $consultar['id_cliente'], $consultar['id_plan'], $consultar['precio_plan'], $fecha, $hora, $this->user);
            
            if ($detalle > 0) {
                // Cambiar el estado del cliente a 2 (activo)
                $estado_cliente = 2; // Asumiendo que 2 es el estado "activo"
                $clienteModel = $this->loadModel('ClientesModel'); // Cargar el modelo de clientes
                $actualizado = $clienteModel->actualizarEstadoCliente($consultar['id_cliente'], $estado_cliente);
                
                // Verificar si se actualizó el estado
                if ($actualizado) {
                    $mensaje = array(
                        'msg' => 'Pago Registrado y Estado de Cliente Actualizado',
                        'icono' => 'success',
                        'id_pago' => $detalle
                    );
                } else {
                    $mensaje = array(
                        'msg' => 'Pago Registrado, pero Error al Actualizar Estado del Cliente',
                        'icono' => 'warning'
                    );
                }
            } else {
                $mensaje = array('msg' => 'Error al Registrar Detalle Pago', 'icono' => 'error');
            }
        } else {
            $mensaje = array('msg' => 'Error al Registrar el Pago', 'icono' => 'error');
        }
    } else {
        $mensaje = array('msg' => 'Error Fatal', 'icono' => 'error');
    }
    
    echo json_encode($mensaje);
    die();
}

}
