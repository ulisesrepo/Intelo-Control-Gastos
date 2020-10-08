<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>SOLICITUD BENECASH - BENELIFE</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url();?>/assets/img/intelo_ico.ico" />
    <!--Let browser know website is optimized for mobile-->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
    <!--Import Google Icon Font-->
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <!--Import materialize.css-->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
    <!--Import font-awesome.css-->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"> -->
    <!--Import datatables.css-->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
    <!-- <link href="<?=base_url();?>static/css/benelife.css" type="text/css" rel="stylesheet" media="screen,projection" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="<?=base_url();?>static/css/sweetalert.css" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="<?=base_url();?>static/css/styleFormValidation.css" /> -->

    <!-- <link rel="stylesheet" href="<?=base_url();?>static/css/normalize.css"> -->
    <!-- <link rel="stylesheet" href="<?=base_url();?>static/css/main.css"> -->
<!-- </head>  -->

<!-- 
<body>
    <!-- <?=$header;?>  -->
    <!-- Start Content -->
    <div class="section">
        <div class="col s12 m12 l12">
            <div class="col s12 m12 l12">
                <div class="col s12 m6 l12" style="padding-left: 10px;">
                    <a class="btn blue waves-effect waves-light  cyan accent-4" href="<?=base_url();?>gestion_cliente">
                        <i class="material-icons left">arrow_back</i>
                        Regresar a pagina de Clientes
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="row ">
            <h6 style="padding-left: 10px;">Empleados de Empresa: <b class="b-bene-text  blue-text" id="nombre_empresa_label"> </b></h6>
            <div class="col s12 m12 l12">
                <table id="data_table_empleados" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Clave de Empleados</th>
                            <th>Nombre Empleado</th>
                            <th>Fecha de Alta</th>
                            <th>Teléfono</th>
                            <th>App Activa</th>
                            <th>Agregar Producto</th>
                             <th>Productos Asociados</th>
                            <th>Editar</th>
                            <th>Baja Empleado</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Clave de Empleados</th>
                            <th>Nombre Empleado</th>
                            <th>Fecha de Alta</th>
                            <th>Teléfono</th>
                            <th>App Activa</th>
                            <th>Agregar Producto</th>
                            <th>Productos Asociados</th>
                            <th>Editar</th>
                            <th>Baja Empleado</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!--Modal de actualizacion de los datos del empleado-->
    <div id="modal_actualizar_empleado" class="modal">
        <div class="modal-content">
            <div class="row">
                <form id="form_validation_update_empleado">
                    <h6>Empresa: <b class="b-bene-text blue-text" id="nombre_empresa_2"></b></h6>
                    <input type="text" id="id_empleado_update_modal" style="display:none">
                    <div class="input-field col s12 m4 l4 text-bene-helvetica-45">
                        <input type="email" id="email_emp_update_modal" name="email_emp_update_modal" maxlength="50"
                            placeholder="">
                        <label for="email" class="active">Correo Electronico</label>
                    </div>
                    <div class="input-field col s12 m4 l4 text-bene-helvetica-45">
                        <input type="number" id="tel_cel_emp_update_modal" name="tel_cel_emp_update_modal" maxlength="10" min="0"
                            placeholder="">
                        <label for="email" class="active">Numero de telefono</label>
                    </div>
                    <div class="input-field col s12 m4 l4 text-bene-helvetica-45">
                        <label for="filled-in-box">
                            <input type="checkbox" class="checkbox" id="filled-in-box" name="app_activa" />
                            <span>Activar o desactivar App Movil</span>
                        </label>
                    </div>
                    <div class="col s12 m12 l12 right-align  text-bene-helvetica-45">
                        <a class="waves-effect waves-light btn b-bene modal-action modal-close"
                            id="btn_modal_cerrar_usuario">Cancelar</a>
                        <button class="waves-effect waves-light btn b-bene" type="submit">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col s12 m12 l12 g-bene"><br></div>
        <div class="modal-footer  text-bene-helvetica-45">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">CERRAR</a>
        </div>
    </div>
    <!-- modal para mostrar los productos que tiene contratado el empleado -->
    <div id="modal_detalles_productos_emp" class="modal" style="width: 80vw;">
        <div class="modal-content">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h6>Empresa: <b class="b-bene-text blue-text" id="nombre_empresa_3"></b></h6>
                </div>
                <table id="data_table_productos_emp" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Referencia</th>
                            <th>Fecha de Contratación</th>
                            <th>Vigencia</th>
                            <th>Quitar</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Producto</th>
                            <th>Referencia</th>
                            <th>Fecha de Contratación</th>
                            <th>Vigencia</th>
                            <th>Quitar</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
        <div class="col s12 m12 l12 g-bene"><br></div>
        <div class="modal-footer  text-bene-helvetica-45">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">CERRAR</a>
        </div>
    </div>
    <!-- Modal Structure AddEmpleado-->
    <div id="modal_agregar_producto" class="modal" data-dismissible="false"
        style="width: 90vw;max-height: 90%;top: 5% !important;">
        <div class="modal-content">
            <div class="col s12 m12 l12">
                <h6>Empresa: <b class="b-bene-text blue-text" id="nombre_empresa_1"></b></h6>
            </div>
            <div class="row" id="introduction">
                <ul class="collapsible popout">
                    <li class="active">
                        <div class="collapsible-header"><i class="material-icons">whatshot</i>Asignacion de Productos
                            del Empleado
                        </div>
                        <div class="collapsible-body">
                            <div class="section">
                                <div class="row">
                                    <form id="form_validation_producto">
                                        <input type="text" id="id_empleado_producto" style="display:none">
                                        <div class="input-field col s12 m12 l4 text-bene-helvetica-45">
                                            <select id="tipo_producto_empre_model" name="tipo_producto_empre_model"
                                                aria-required="true" data-error=".errorTxt6">
                                            </select>
                                            <label>Producto</label>
                                            <div class="errorTxt6"></div>
                                        </div>
                                        <div class="input-field col s12 m12 l2">
                                            <input id="vigencia_producto_emp" name="vigencia_producto_emp" type="text"
                                                class="datepicker">
                                            <label for="first_name">Vigencia</label>
                                        </div>
                                        <div class="input-field col s12 m12 l2">
                                            <input id="referencia_producto_emp" name="referencia_producto_emp"
                                                type="text" maxlength="50" onKeyUp="document.getElementById(this.id).
                                                    value=document.getElementById(this.id).value.toUpperCase()">
                                            <label for="first_name">Poliza/No. de Tarjeta</label>
                                        </div>
                                        <div class="input-field col s12 m12 l2">
                                            <input id="fecha_contratacion_emp" name="fecha_contratacion_emp" type="text"
                                                class="datepicker">
                                            <label for="first_name">Fecha de Contratacion</label>
                                        </div>
                                        <div class="col s12 m2 l2 right-align  text-bene-helvetica-45">
                                            <button class="waves-effect waves-light btn b-bene"
                                                id='btn_agregar_producto_em' type="submit"><i
                                                    class="fas fa-plus"></i></button>
                                            <a class="waves-effect waves-light btn b-bene"
                                                id="btn_guardar_producto_em"><i class="fas fa-save"></i></a>
                                        </div>
                                    </form>
                                </div>
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <table id="data_table_productos_contratados" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Clave del Producto</th>
                                                    <th>Tipo Producto</th>
                                                    <th>Vigencia</th>
                                                    <th>Referencia</th>
                                                    <th>Fecha de Contratación</th>
                                                    <th>Quitar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Clave del Producto</th>
                                                    <th>Tipo Producto</th>
                                                    <th>Vigencia</th>
                                                    <th>Referencia</th>
                                                    <th>Fecha de Contratación</th>
                                                    <th>Quitar</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col s12 m12 l12 g-bene"><br></div>
        <div class="modal-footer  text-bene-helvetica-45">
            <a href="#!" id="btn_cerra_limpiar"
                class="modal-action modal-close waves-effect waves-green btn-flat">CERRAR
            </a>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <!-- Form validate -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.js"></script>
    <script src="<?=base_url();?>static/js/sweetalert.min.js"></script>
    <script src="<?=base_url();?>static/js/custom_mensaje_validate.js"></script>
    <!-- Mis JQ  -->
    <script src="<?=base_url();?>static/js/my_jquerys/empleados.js"></script>
    <script src="<?=base_url();?>static/js/main.js"></script>
</body>

</html>