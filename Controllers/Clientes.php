<?php

use Luecano\NumeroALetras\NumeroALetras;

class Clientes extends Controller
{
    protected $id_user;
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url);
        }
        parent::__construct();
        $this->id_user = $_SESSION['id_usuario'];
    }
    public function index()
    {
        $this->views->getView($this, "index");
    }
    public function listar()
    {
        // Obtiene todos los clientes
        $data = $this->model->getClientes();
        
        for ($i = 0; $i < count($data); $i++) {
            // Cambia el estado visualmente basado en el valor del estado
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-warning">sin membresia</span>';
            } elseif ($data[$i]['estado'] == 2) {
                $data[$i]['estado'] = '<span class="badge bg-success">activo</span>';
            } elseif ($data[$i]['estado'] == 3) {
                $data[$i]['estado'] = '<span class="badge bg-danger">inactivo</span>'; // Estado inactivo en rojo
            }
            
            $data[$i]['editar'] = '<button class="btn btn-primary" type="button" onclick="btnEditarCli(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></button>';
            $data[$i]['eliminar'] = '<button class="btn btn-danger" type="button" onclick="btnEliminarCli(' . $data[$i]['id'] . ');"><i class="fas fa-trash-alt"></i></button>';
        }
        
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    
    
    public function registrar()
    {
        $dni = strClean($_POST['dni']);
        $nombre = strClean($_POST['nombre']);
        $telefono = strClean($_POST['telefono']);
        $direccion = strClean($_POST['direccion']);
        $id = strClean($_POST['id']);
        if (empty($nombre) || empty($telefono) || empty($direccion)) {
            $msg = array('msg' => 'Todo los campos son obligatorios', 'icono' => 'warning');
        } else {
            if ($id == "") {
                $data = $this->model->registrarCliente($dni, $nombre, $telefono, $direccion, $this->id_user);
                if ($data == "ok") {
                    $msg = array('msg' => 'Cliente registrado con éxito', 'icono' => 'success');
                } else if ($data == "existe") {
                    $msg = array('msg' => 'El cliente ya existe', 'icono' => 'warning');
                } else {
                    $msg = array('msg' => 'Error al registrar el cliente', 'icono' => 'error');
                }
            } else {
                $data = $this->model->modificarCliente($dni, $nombre, $telefono, $direccion, $id);
                if ($data == "modificado") {
                    $msg = array('msg' => 'Cliente modificado', 'icono' => 'success');
                } else {
                    $msg = array('msg' => 'Error al modificar el cliente', 'icono' => 'error');
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar($id)
    {
        $data = $this->model->editarCli($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar($id)
    {
        // Cambiar el estado del cliente a 3 (inactivo)
        $data = $this->model->accionCli(3, $id);
        
        if ($data == 1) {
            $msg = array('msg' => 'Cliente marcado como inactivo', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al marcar al cliente como inactivo', 'icono' => 'error');
        }
        
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    
    //Pagos
    public function pagos()
    {
        $this->views->getView($this, "pagos");
    }
    public function listar_pagos()
    {
        $data = $this->model->getPagos();
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['ver'] = '';
            $data[$i]['estado'] = '<span class="badge bg-success">Pagado</span>';
            $data[$i]['ver'] = '<a class="btn btn-outline-danger" href="' . base_url . 'clientes/pdfPago/' . $data[$i]['id'] . '" target="_blank"><i class="fas fa-file-pdf"></i></a>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function verpagos($id)
    {
        $data['pagos'] = $this->model->ver_pagos($id);
        $this->views->getView($this, "ver_pagos", $data);
    }
    //Plan
    public function plan()
    {
        $this->views->getView($this, "plan");
    }
    public function buscarCliente()
    {
        if (isset($_GET['cli'])) {
            $data = $this->model->buscarCliente($_GET['cli']);
            $datos = array();
            foreach ($data as $row) {
                $data['id'] = $row['id'];
                $data['label'] = $row['nombre'] . ' - ' . $row['direccion'];
                $data['value'] = $row['nombre'];
                $data['direccion'] = $row['direccion'];
                array_push($datos, $data);
            }
        }
        if (isset($_GET['plan'])) {
            $data = $this->model->buscarPlanCliente($_GET['plan']);
            $datos = array();
            foreach ($data as $row) {
                $data['id'] = $row['id_detalle'];
                $data['label'] = $row['nombre'] . ' - ' . $row['plan'] . ' - ' . $row['precio_plan'];
                $data['value'] = $row['nombre'];
                $data['plan'] = $row['plan'];
                $data['precio'] = $row['precio_plan'];
                $data['vencimiento'] = $row['fecha_venc'];
                array_push($datos, $data);
            }
        }
        echo json_encode($datos, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function buscarPlan($id)
    {
        $data = $this->model->buscarPlanes($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function buscar_planes()
    {
        if (isset($_GET['q'])) {
            $data = $this->model->buscar_planes($_GET['q']);
            $datos = array();
            foreach ($data as $row) {
                $data['id'] = $row['id'];
                $data['label'] = $row['plan'] . ' - ' . $row['precio_plan'];
                $data['value'] = $row['plan'];
                $data['precio_plan'] = $row['precio_plan'];
                array_push($datos, $data);
            }
            echo json_encode($datos, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
    public function listar_plan_clientes()
    {
        $data = $this->model->getPlanCliente();
        $fecha = date('Y-m-d');
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['fecha_actual'] = $fecha;
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Activo</span>';
                $data[$i]['accion'] = '<div>
                    <a class="btn btn-danger" href="' . base_url . 'clientes/verpagos/' . $data[$i]['id_cliente'] . '"><i class="fas fa-eye"></i></a>
                    <button class="btn btn-warning" type="button" onclick="desactivar(' . $data[$i]['id'] . ');"><i class="fas fa-ban"></i></button>
                </div>';
            } else {
                $data[$i]['estado'] = '<span class="badge bg-danger">Desabilitado</span>';
                $data[$i]['accion'] = '<a class="btn btn-outline-danger" href="' . base_url . 'clientes/verpagos/' . $data[$i]['id_cliente'] . '"><i class="fas fa-eye"></i></a>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function ver($id)
    {
        $data = $this->model->ver($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function procesarPago($id)
    {
        if (!is_numeric($id)) {
            $msg = array('msg' => 'Error desconocido', 'icono' => 'warning');
        } else {
            $lista = $this->model->ver($id);
            $id_cli = $lista['id_cli'];
            $id_plan = $lista['id_plan'];
            $precio = $lista['precio_plan'];
            $fecha = date('Y-m-d');
            $hora = date('H:i:s');
            
            // Registrar el pago
            $data = $this->model->registrarPagoCliente($id, $id_cli, $id_plan, $precio, $fecha, $hora, $this->id_user);
            
            if ($data > 0) {
                // Intentamos actualizar el estado del cliente
                $estadoActualizado = $this->model->actualizarEstadoCliente($id_cli, 2);  // Estado 2 = Activo
                
                if ($estadoActualizado) {
                    $msg = array('msg' => 'Pago registrado y cliente activado', 'icono' => 'success', 'id_pago' => $data);
                } else {
                    $msg = array('msg' => 'Pago registrado, pero error al actualizar el estado del cliente', 'icono' => 'warning');
                }
            } else {
                $msg = array('msg' => 'Error al realizar el pago', 'icono' => 'error');
            }
            
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    
    public function pdfPago($id)
{
    // Obtener los datos de la empresa
    $empresa = $this->model->getEmpresa();
    
    require('Libraries/fpdf/html2pdf.php');

    $pdf = new PDF_HTML('P', 'mm', array(80, 200)); // Tamaño de página ajustado
    $pdf->AddPage();
    $pdf->SetMargins(1, 0, 0);
    $pdf->SetTitle('Reporte Pago');

    // Agregar el logo centrado en la parte superior
    $logoX = ($pdf->GetPageWidth() - 50) / 2; // Centrado horizontal
    $pdf->Image('Assets/images/logo.png', $logoX, 10, 50); // Ajusta el tamaño y posición
    $pdf->Ln(50); // Deja espacio después del logo

    // Mostrar mensaje de agradecimiento centrado
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Gracias por comprar en Body Fit', 0, 1, 'C');

    // Generar el PDF
    $pdf->Output();
}
public function pdfPagos($id_cliente)
{
    // Obtener los datos de la empresa
    $empresa = $this->model->getEmpresa();
    
    require('Libraries/fpdf/html2pdf.php');

    $pdf = new PDF_HTML('L', 'mm', 'A4'); // Tamaño de página ajustado
    $pdf->AddPage();
    $pdf->SetMargins(10, 0, 0);
    $pdf->SetTitle('Reporte Pago');

    // Agregar el logo centrado en la parte superior
    $logoX = ($pdf->GetPageWidth() - 100) / 2; // Centrado horizontal
    $pdf->Image('Assets/images/logo.png', $logoX, 10, 100); // Ajusta el tamaño y posición
    $pdf->Ln(80); // Deja más espacio después del logo

    // Mostrar mensaje de agradecimiento centrado
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Gracias por comprar en Body Fit', 0, 1, 'C');

    // Generar el PDF
    $pdf->Output();
}

        
    function formatoFecha($fecha)
    {

        $num = date("j", strtotime($fecha));

        $anno = date("Y", strtotime($fecha));

        $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');

        $mes = $mes[(date('m', strtotime($fecha)) * 1) - 1];

        return $num . ' de ' . $mes . ' del ' . $anno;
    }
}
