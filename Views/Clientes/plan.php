<?php include "Views/Templates/header.php"; ?>
<button class="btn btn-info mb-2" type="button" data-toggle="modal" data-target="#modalPago">Realizar Pago</button>
<div class="card shadow-lg">
    <div class="card-body">
        <form id="formulario" onsubmit="registrarPlanCliente(event)">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="form-group mb-3">
                        <label for="select_cliente"><i class="fas fa-users"></i> Buscar Cliente</label>
                        <input type="hidden" id="id_cli" name="id_cli" required>
                        <input type="text" id="select_cliente" placeholder="Buscar..." class="form-control" required>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="form-group mb-3">
                        <label for="buscar_planes"><i class="fas fa-lista"></i> Buscar Plan</label>
                        <input type="hidden" id="id_plan" name="id_plan" required>
                        <input type="text" id="buscar_planes" class="form-control" placeholder="Buscar..." required>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="form-group mb-3">
                        <label for="precio_plan"><i class="fas fa-dollar-sign"></i> Precio Plan</label>
                        <input type="text" id="precio_plan" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="d-grid gap-2">
                        <label for="">Accion</label>
                        <button class="btn btn-outline-primary btn-block" type="submit"><i class="fas fa-sign-in-alt"></i><span id="btnAccion"> Procesar</span></button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row mb-2">
            <div class="col-md-4">
                <label for="">Desde</label>
                <input class="form-control" id="min" type="date" name="plan_min">
            </div>
            <div class="col-md-4">
                <label for="">Hasta</label>
                <input class="form-control" id="max" type="date" name="plan_max">
            </div>
        </div>
        <div class="table-responsive my-2">
            <table class="table table-striped table-hover display responsive nowrap" id="tblPlanCli" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>F. registro</th>
                        <th>N° CI</th>
                        <th>Cliente</th>
                        <th>Plan</th>
                        <th>Bs</th>
                        <th>F. Ini</th>
                        <th>F. Fin</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group mb-3">
                    <input class="form-control" id="cliente" type="text" readonly>
                    <input type="hidden" id="id">
                    <label for="cliente" class="form-label">Cliente</label>
                </div>
                <div class="form-group mb-3">
                    <input class="form-control" id="plan" type="text" readonly>
                    <label for="plan" class="form-label">Plan</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-outline-primary" onclick="generarPago();">Pagar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalPago" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frmPago" onsubmit="registrarPago(event)" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <!-- Campos básicos -->
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <input type="hidden" id="id_planCliente" name="id_planCliente" required>
                                <label for="nombre_cliente"><i class="fas fa-users"></i> Buscar Cliente</label>
                                <input type="text" id="nombre_cliente" class="form-control" placeholder="Buscar..." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="nombre_plan"><i class="fas fa-users"></i> Plan</label>
                                <input type="text" id="nombre_plan" class="form-control" required readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="vencimiento"><i class="fas fa-calendar-alt"></i> Fecha</label>
                                <input type="text" id="vencimiento" class="form-control" required readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="precio">Precio Plan</label>
                                <input type="text" id="precio" class="form-control" required readonly>
                            </div>
                        </div>

                        <!-- Método de pago -->
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="metodo_pago">Método de Pago</label>
                                <select id="metodo_pago" name="metodo_pago" class="form-control" onchange="mostrarCamposTarjeta()" required>
                                    <option value="">Seleccione</option>
                                    <option value="Efectivo">Efectivo</option>
                                    <option value="Tarjeta">Tarjeta</option>
                                </select>
                            </div>
                        </div>

                        <!-- Campos adicionales para tarjeta -->
                        <div id="camposTarjeta" class="col-md-12" style="display: none;">
                            <div class="form-group mb-3">
                                <label for="numero_tarjeta">Número de Tarjeta</label>
                                <input type="text" id="numero_tarjeta" name="numero_tarjeta" class="form-control" maxlength="16" pattern="\d{16}" placeholder="1234 5678 9012 3456">
                            </div>
                            <div class="form-group mb-3">
                                <label for="nombre_titular">Nombre del Titular</label>
                                <input type="text" id="nombre_titular" name="nombre_titular" class="form-control" placeholder="Nombre en la tarjeta">
                            </div>
                            <div class="form-group mb-3">
                                <label for="fecha_expiracion">Fecha de Expiración</label>
                                <input type="month" id="fecha_expiracion" name="fecha_expiracion" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="cvv">CVV</label>
                                <input type="text" id="cvv" name="cvv" class="form-control" maxlength="3" pattern="\d{3}" placeholder="123">
                            </div>
                            <div class="form-group mb-3">
                                <label for="direccion_facturacion">Dirección de Facturación</label>
                                <input type="text" id="direccion_facturacion" name="direccion_facturacion" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="codigo_postal">Código Postal</label>
                                <input type="text" id="codigo_postal" name="codigo_postal" class="form-control" pattern="\d{4}" placeholder="00000">
                            </div>
                            <div class="form-group mb-3">
                                <label for="correo">Correo Electrónico</label>
                                <input type="email" id="correo" name="correo" class="form-control" placeholder="correo@ejemplo.com">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-primary" type="submit">Procesar Pago</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
   function mostrarCamposTarjeta() {
    const metodoPago = document.getElementById("metodo_pago").value;
    const camposTarjeta = document.getElementById("camposTarjeta");

    if (metodoPago === "Tarjeta") {
        camposTarjeta.style.display = "block";
        // Hacer que los campos sean obligatorios
        ["numero_tarjeta", "nombre_titular", "fecha_expiracion", "cvv", "direccion_facturacion", "codigo_postal", "correo"].forEach(id => {
            document.getElementById(id).setAttribute("required", "true");
        });
    } else {
        camposTarjeta.style.display = "none";
        // Eliminar la obligatoriedad de los campos
        ["numero_tarjeta", "nombre_titular", "fecha_expiracion", "cvv", "direccion_facturacion", "codigo_postal", "correo"].forEach(id => {
            document.getElementById(id).removeAttribute("required");
        });
    }
}

</script>
<?php include "Views/Templates/footer.php"; ?>