<script type="text/javascript" src="../config/functUser.js?rev=<?php echo time(); ?>"></script>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Administrar</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item text-blue">Administrar</a></li>
                    <li class="breadcrumb-item active">Personal</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box  $2y$12$RQ.llc3jOKvEaNomWQOPderFPYuQiOMvDQCFJ..L0hVqSAPOVrNTm -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Personal Barrintong</h3>
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
                    <button type="button" class="btn btn-block btn-default" data-toggle="modal"
                        onclick="notcloseModalDefault();" data-target="#modal-default">Crear Nuevo Personal &nbsp;<i
                            class="fas fa-user-plus"></i>
                    </button>
                </div>
            </div>

            <!-- /.card-body -->
            <table id="table_user" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Nro</th>
                        <!--th>Id</th-->
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>DNI</th>
                        <th>Rol</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nro</td>
                        <!--th>Id</th-->
                        <td>Nombres</td>
                        <td>Apellidos</td>
                        <td>DNI</td>
                        <td>Rol</td>
                        <td>Usuario</td>
                        <td>
                            <!--span class='badge badge-success'>Activo</span-->
                        </td>
                        <td>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

</section>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-lightblue">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-user"></i>&nbsp; Nuevo Personal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cleanInputs(1);">
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
                                        <label class="block" id="alert_nombres" style="display:none"></label>
                                    </div>
                                </div>

                                <input type="text" minlegth="10" maxlength="100" id="nombres" class="form-control"
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
                                        <label class="block" id="alert_apellidos" style="display:none"></label>
                                    </div>
                                </div>


                                <input type="text" minlegth="10" maxlength="100" id="apellidos" class="form-control"
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
                                        <label title="Importante">Correo Electronico<i class="text-danger"
                                                title="Importante">*</i></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="block" id="alert_email" style="display:none"></label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="email" onpaste="return false"
                                        placeholder="ejemplo: pedro_PD" required
                                        onkeypress="return enableLettrsNum(event)">

                                    <select class="custom-select" required id="domain">
                                        <option value="@hotmail.com">@hotmail.com</option>
                                        <option value="@Outlook.com">@Outlook.com</option>
                                        <option value="@gmail.com" selected>@gmail.com</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label title="Importante">Contraseña<i class="text-danger"
                                                title="Importante">*</i></label>&nbsp;
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="block" id="alert_password" style="display:none"></label>
                                    </div>
                                </div>

                                <div class="input-group">
                                    <input id="password" type="password" Class="form-control" maxlength="255"
                                        onpaste="return false" required onkeypress="return enableLettrsNum(event)">
                                    <div class="input-group-append">
                                        <button id="show_password" class="btn btn-primary" type="button"
                                            onclick="showPassword(password)"> <span class="fa fa-eye-slash icon"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label title="Importante">Confirmar contraseña<i class="text-danger"
                                                title="Importante">*</i></label>&nbsp;
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="block" id="alert_password2" style="display:none"></label>
                                    </div>
                                </div>
                                <input type="password" class="form-control" id="password2" maxlength="255" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Numero Telefonico<i class="text-danger" title="Importante">*</i></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="block" id="alert_telefono" style="display:none"></label>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" id="telefono" class="form-control" placeholder="(+51) 999-999-999"
                                    data-inputmask='"mask": "(+51) 999-999-999"' data-mask onpaste="return false">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label title="Importante">Nombre de Usuario<i class="text-danger"
                                            title="Importante">*</i></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="block" id="alert_username" style="display:none"></label>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" class="form-control" id="username" placeholder="Username"
                                    onpaste="return false" required onkeypress="return enableLettrsNum(event)">
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label title="Importante">DNI<i class="text-danger" title="Importante">*</i></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="block" id="alert_dni" style="display:none"></label>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" id="dni" data-inputmask='"mask": "99999999"'
                                    data-mask placeholder="Doc. de Identificacion" required onpaste="return false">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label title="Importante">Rol del Personal<i class="text-danger"
                                        title="Importante">*</i></label>
                                <div class="form-group ">
                                    <select class="custom-select" id="selectRol" required>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between bg-light">
                    <button class="btn btn-warning btn-lg" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fas fa-exclamation-circle"></i>
                    </button>
                    <div class="dropdown-menu p-4 text-muted" style="max-width: 200px;">
                        <p>
                            Por favor evitar agregar caracteres <strong
                                class="text-danger">""{}!$%&/()=?¡¨*[]:;,-°|¨´,.</strong>
                            para la creacion su <strong class="text-dark">Contraseña.</strong>
                        </p>
                    </div>
                    <div class="btn-group drop-up">
                        <button type="button" class="btn btn-danger btn-lg" onclick="cleanInputs(1);"
                            data-dismiss="modal">Cancelar
                            &nbsp;<i class="fas fa-times"></i></button>
                        <button type="button" class="btn btn-primary btn-lg" onclick="RegistUser();">Guardar Cambios
                            &nbsp;<i class="fas fa-save"></i></button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>

<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-info">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-pencil-alt"></i>&nbsp; Editar Personal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- /registro personal <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Input with
                                    success</label> -->
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
                                        <label class="block" id="edit_alert_nombres" style="display:none"></label>
                                    </div>
                                </div>
                                <!-- /input Nombres -->
                                <input type="text" minlegth="10" maxlength="100" id="edit_nombres" class="form-control"
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
                                        <label class="block" id="edit_alert_apellidos" style="display:none"></label>
                                    </div>
                                </div>

                                <!-- /input Apellidos -->
                                <input type="text" minlegth="10" maxlength="100" id="edit_apellidos"
                                    class="form-control" onpaste="return false" placeholder="ejemplo: Paredes del Cielo"
                                    required onkeypress="return enableLettrs(event)">
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
                                        <label class="block" id="edit_alert_email" style="display:none"></label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="edit_email" onpaste="return false"
                                        placeholder="ejemplo: pedro_PD" required
                                        onkeypress="return enableLettrsNum(event)">
                                    <!-- /btn-group -->
                                    <select class="custom-select" required id="edit_domain">
                                        <option value="@hotmail.com">@hotmail.com</option>
                                        <option value="@Outlook.com">@Outlook.com</option>
                                        <option value="@gmail.com">@gmail.com</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Numero Telefonico<i class="text-danger" title="Importante">*</i></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="block" id="alert_telefono" style="display:none"></label>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" id="edit_telefono" class="form-control"
                                    placeholder="(+51) 999-999-999" data-inputmask='"mask": "(+51) 999-999-999"'
                                    data-mask onpaste="return false">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label title="Importante">Nombre de Usuario<i class="text-danger"
                                            title="Importante">*</i></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="block" id="alert_username" style="display:none"></label>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" class="form-control" id="edit_username" placeholder="Username"
                                    onpaste="return false" disabled required onkeypress="return enableLettrsNum(event)">
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label title="Importante">DNI<i class="text-danger" title="Importante">*</i></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="block" id="alert_dni" style="display:none"></label>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" id="edit_dni"
                                    data-inputmask='"mask": "99999999"' data-mask placeholder="Doc. de Identificacion"
                                    required onpaste="return false">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label title="Importante">Rol del Personal<i class="text-danger"
                                        title="Importante">*</i></label>
                                <div class="form-group ">
                                    <select class="custom-select" id="edit_selectRol" required>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between bg-light">

                    <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"
                        onclick="cleanInputs(2);">Cancelar
                        &nbsp;<i class="fas fa-times"></i></button>
                    <button type="button" class="btn btn-primary btn-lg" onclick="editUser();">Guardar Cambios
                        &nbsp;<i class="fas fa-save"></i></button>

                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-view">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-eye"></i>&nbsp; Informacion Personal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Profile Image -->
            <div class="card-body bg-light">
                <strong id="view_estado"></strong>
                <div class="card-body box-profile">
                    <h3 class="profile-username text-center text-muted" id="nom_ape"></h3>
                    <p class="text-muted text-center" id="nom_rol"></p>
                </div>
                <!-- /.card-body -->
                <br>
                <strong><i class="fas fa-at mr-1"></i>Usuario</strong>
                <p class="text-muted" id="view_usuario"></p>
                <hr>
                <strong><i class="fas fa-phone mr-1"></i>Telefono</strong>
                <p class="text-muted" id="li_telefono"></p>
                <hr>
                <strong><i class="fa fa-fw fa-envelope-square mr-1"></i>Correo</strong>
                <p class="text-muted" id="li_email"></p>
                <hr>
                <strong><i class="fa fa-fw fa-bullseye mr-1"></i>DNI</strong>
                <p class="text-muted" id="li_dni"></p>
                <hr>
                <p class="text-muted" id="li_creacion"></p>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<script>
$(document).ready(function() {
    ListUser();
    ListRol();
});
</script>
<!-- /.modal -->
<!-- <script src="../templates/main/user/js/list_user.js"></script> -->
<!-- <script src="../templates/templates_login/sweetAlert/sweetalert2.js"></script> -->