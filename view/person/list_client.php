<script type="text/javascript" src="../js/functClie.js?rev=<?php echo time(); ?>"></script>
<section class="content-header">
    <h1 class="h3 mb-4 text-gray-800">Almacen</h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Clientes</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-8">
                    <div class="input-group">
                        <input type="text" class="global_filter form-control" placeholder="Buscar" id="global_filter">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                   
                    <button class="btn btn-block btn-primary" onclick="notcloseModal('#modal-register-client');"
                    data-target="#modal-register-client">
                        <span class="text-white">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Agregar</span>
                    </button>

                </div>
            </div>

            <!-- /.card-body -->
            <table id="table_client" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>DNI</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Registrado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nro</td>
                        <td>DNI</td>
                        <td>Nombres</td>
                        <td>Apellidos</td>
                        <td>Telefono</td>
                        <td>Correo</td>
                        <td>Registrado</td>
                        <td>Acciones</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
</div>
</div>
<div class="modal fade" id="modal-register-client">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title"><i class="fas fa-users"></i>&nbsp; Nuevo Cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cleanInputs();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body bg-light">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label title="Importante">Nombres<i class="text-danger"
                                                title="Importante">*</i></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                    </div>
                                </div>

                                <input type="text" minlegth="10" maxlength="100" id="cli_nombres" class="form-control"
                                    onpaste="return false" placeholder="ejemplo: Pedro Luis" required
                                    onkeypress="return enableLettrs(event)">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label title="Importante">Apellidos<i class="text-danger"
                                                title="Importante">*</i></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="block" id="alert_cli_apellidos" style="display:none"></label>
                                    </div>
                                </div>


                                <input type="text" minlegth="10" maxlength="100" id="cli_apellidos" class="form-control"
                                    onpaste="return false" placeholder="ejemplo: Paredes del Cielo" required
                                    onkeypress="return enableLettrs(event)">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label title="Importante">DNI<i class="text-danger"
                                                title="Importante">*</i></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="block" id="alert_cli_dni" style="display:none"></label>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="cli_dni" data-inputmask='"mask": "99999999"'
                                        data-mask placeholder="Doc. de Identificacion" required onpaste="return false">

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Numero Celular<i class="text-danger" title="Importante">*</i></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="block" id="alert_cli_telefono" style="display:none"></label>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" id="cli_telefono" class="form-control"
                                    placeholder="(+51) 999-999-999"
                                    data-inputmask='"mask": "(+51) 999-999-999"' data-mask onpaste="return false">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label title="Importante">Correo Electronico<i class="text-danger"
                                                title="Importante">*</i></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="block" id="alert_cli_email" style="display:none"></label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="cli_email" onpaste="return false"
                                        placeholder="ejemplo: pedro_PD" required onkeypress="return enableLettrsNum(event)">

                                    <select class="custom-select" required id="domain">
                                        <option value="@hotmail.com">@hotmail.com</option>
                                        <option value="@Outlook.com">@Outlook.com</option>
                                        <option value="@gmail.com" selected>@gmail.com</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between bg-light">
                    <button type="button" class="btn btn-danger btn-sm" onclick="cleanInputs();"
                        data-dismiss="modal">Cancelar
                        &nbsp;<i class="fas fa-times"></i></button>
                    <button type="button" class="btn btn-primary btn-sm" onclick="registClient();">Guardar Cambios
                        &nbsp;<i class="fas fa-save"></i></button>
                </div>
            </form>
        </div>

    </div>

</div>
<div class="modal fade" id="modal-edit-client">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h4 class="modal-title"><i class="fas fa-users"></i>&nbsp; Editar Cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cleanInputs();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body bg-light">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label title="Importante">Nombres<i class="text-danger"
                                                title="Importante">*</i></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                    </div>
                                </div>

                                <input type="text" minlegth="10" maxlength="100" id="cli_edtnombres" class="form-control"
                                    onpaste="return false" placeholder="ejemplo: Pedro Luis" required
                                    onkeypress="return enableLettrs(event)">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label title="Importante">Apellidos<i class="text-danger"
                                                title="Importante">*</i></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="block" id="alert_cli_apellidos" style="display:none"></label>
                                    </div>
                                </div>


                                <input type="text" minlegth="10" maxlength="100" id="cli_edtapellidos" class="form-control"
                                    onpaste="return false" placeholder="ejemplo: Paredes del Cielo" required
                                    onkeypress="return enableLettrs(event)">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label title="Importante">DNI<i class="text-danger"
                                                title="Importante">*</i></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="block" id="alert_cli_dni" style="display:none"></label>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="cli_edtdni" data-inputmask='"mask": "99999999"'
                                        data-mask placeholder="Doc. de Identificacion" required onpaste="return false">

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Numero Celular<i class="text-danger" title="Importante">*</i></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="block" id="alert_cli_telefono" style="display:none"></label>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" id="cli_edttelefono" class="form-control"
                                    placeholder="(+51) 999-999-999"
                                    data-inputmask='"mask": "(+51) 999-999-999"' data-mask onpaste="return false">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label title="Importante">Correo Electronico<i class="text-danger"
                                                title="Importante">*</i></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="block" id="alert_cli_email" style="display:none"></label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="cli_edtemail" onpaste="return false"
                                        placeholder="ejemplo: pedro_PD" required onkeypress="return enableLettrsNum(event)">

                                    <select class="custom-select" required id="edtdomain">
                                        <option value="@hotmail.com">@hotmail.com</option>
                                        <option value="@Outlook.com">@Outlook.com</option>
                                        <option value="@gmail.com" selected>@gmail.com</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between bg-light">
                    <button type="button" class="btn btn-danger btn-sm" onclick="cleanInputs();"
                        data-dismiss="modal">Cancelar
                        &nbsp;<i class="fas fa-times"></i></button>
                    <button type="button" class="btn btn-primary btn-sm" onclick="editClient();">Guardar Cambios
                        &nbsp;<i class="fas fa-save"></i></button>
                </div>
            </form>
        </div>

    </div>

</div>

<!----Script Client-->
<script src="../startbootstrap/js/person/list_client.js"></script>

<!----Sweet Alert --->
<script src="../startbootstrap/sweetAlert/sweetalert2.js"></script>