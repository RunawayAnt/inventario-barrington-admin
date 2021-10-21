<script type="text/javascript" src="../config/functProv.js?rev=<?php echo time(); ?>"></script>

<section class="content-header">
    <h1 class="h3 mb-4 text-gray-800">Almacen</h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Proveedores</h6>
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

                    <button class="btn btn-block btn-primary" onclick="notcloseModal('#modal-register-provider');"
                     data-target="#modal-register-provider">
                        <span class="text-white">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Agregar</span>
                    </button>

                </div>
            </div>

            <!-- /.card-body -->
            <table id="table_provider" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>RUC</th>
                        <th>Empresa</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Registrado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nro</td>
                        <td>RUC</td>
                        <td>Empresa</td>
                        <td>Correo</td>
                        <td>Estado</td>
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
<div class="modal fade" id="modal-register-provider">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"><div class="modal-header bg-primary text-white">
                <h4 class="modal-title"><i class="fas fa-truck"></i>&nbsp; Nuevo Proveedor</h4>
                <button type="button" class="close" id="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div><form class="register-modal">
                <div class="modal-body bg-light">
                    <!-- <div class="card callout callout-info"> -->
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <label title="Importante">Numero de RUC<i class="text-danger"
                                                    title="Importante">*</i></label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="block" id="alert_prov_ruc" style="display:none"></label>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-fw fa-bookmark"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="prov_ruc"
                                            data-inputmask='"mask": "99999999999"' data-mask placeholder="99999999999"
                                            required onpaste="return false">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <label title="Importante">Razon Social<i class="text-danger"
                                                    title="Importante">*</i></label>
                                        </div>
                                        <div class="col-sm-2">
                                            <label class="block" id="alert_prov_nombre" style="display:none"></label>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-fw fa-building"></i></span>
                                        </div>
                                        <input type="text" id="prov_nombre" class="form-control"
                                            placeholder="ejemplo: Empresa Solaris" onpaste="return false"
                                            onkeypress="return enableLettrs(event)">
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label title="Importante">Direccion<i class="text-danger"
                                                        title="Importante">*</i></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="block" id="alert_prov_direccion"
                                                    style="display:none"></label>
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="fa fa-fw fa-compass"></i></span>
                                            </div>
                                            <input type="text" id="prov_direccion" class="form-control"
                                                placeholder="ejemplo: Av. Larrout, Ciudad Gotica" onpaste="return false"
                                                onkeypress="return enableLN(event)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label title="Importante">Email</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="block" id="alert_prov_email" style="display:none"></label>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="prov_email"
                                                onpaste="return false" placeholder="ejemplo: pedro_PD" required
                                                onkeypress="return enableLettrsNum(event)">

                                            <!-- <select class="custom-select" required id="domain">
                                                <option value="@hotmail.com">@hotmail.com</option>
                                                <option value="@Outlook.com">@Outlook.com</option>
                                                <option value="@gmail.com" selected>@gmail.com</option>
                                            </select> -->
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Telefono<i class="text-danger" title="Importante">*</i></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="block" id="alert_prov_telefono" style="display:none"></label>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" id="prov_telefono" class="form-control"
                                            placeholder="(+51) 999-999-999" data-inputmask='"mask": "(+51) 999-999-999"'
                                            data-mask onpaste="return false">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
                <div class="modal-footer justify-content-between bg-light">
                    <button type="button" class="btn btn-danger btn-sm" id="btn-cancel"
                        data-dismiss="modal">Cancelar
                        &nbsp;<i class="fas fa-times"></i></button>
                    <button type="button" class="btn btn-primary btn-sm" onclick="registProvider();">Guardar Cambios
                        &nbsp;<i class="fas fa-save"></i></button>

                </div>
            </form>
        </div>

    </div>

</div>
<div class="modal fade" id="modal-edit-provider">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header bg-info text-white">
                <h4 class="modal-title"><i class="fas fa-pencil-alt"></i>&nbsp; Editar Proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="edit-modal">
                <div class="modal-body bg-light">
                    <!-- <div class="card callout callout-info"> -->
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <label title="Importante">Numero de RUC</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="block" id="alert_prov_ruc" style="display:none"></label>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-fw fa-bookmark"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="prov_edtruc"
                                            data-inputmask='"mask": "99999999999"' data-mask placeholder="99999999999"
                                            required onpaste="return false">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <label title="Importante">Razon Social<i class="text-danger"
                                                    title="Importante">*</i></label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="block" id="alert_prov_nombre" style="display:none"></label>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-fw fa-building"></i></span>
                                        </div>
                                        <input type="text" id="prov_edtnombre" class="form-control"
                                            placeholder="ejemplo: Empresa Solaris" onpaste="return false"
                                            onkeypress="return enableLettrs(event)">
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <label title="Importante">Direccion<i class="text-danger"
                                                        title="Importante">*</i></label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="block" id="alert_prov_direccion"
                                                    style="display:none"></label>
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="fa fa-fw fa-compass"></i></span>
                                            </div>
                                            <input type="text" id="prov_edtdireccion" class="form-control"
                                                placeholder="ejemplo: Av. Larrout, Ciudad Gotica" onpaste="return false"
                                                onkeypress="return enableLN(event)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label title="Importante">Email<i class="text-danger"
                                                        title="Importante">*</i></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="block" id="alert_prov_email" style="display:none"></label>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="prov_edtemail"
                                                onpaste="return false" placeholder="ejemplo: pedro_PD" required
                                                onkeypress="return enableLettrsNum(event)">

                                            <!-- <select class="custom-select" required id="edtdomain">
                                                <option value="@hotmail.com">@hotmail.com</option>
                                                <option value="@Outlook.com">@Outlook.com</option>
                                                <option value="@gmail.com">@gmail.com</option>
                                            </select> -->
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Telefono<i class="text-danger" title="Importante">*</i></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="block" id="alert_prov_telefono" style="display:none"></label>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" id="prov_edttelefono" class="form-control"
                                            placeholder="(+51) 999-999-999" data-inputmask='"mask": "(+51) 999-999-999"'
                                            data-mask onpaste="return false">
                                    </div>
                                </div>
                            </div>
                        <!-- </div> -->
                        </div>
                </div>
                <div class="modal-footer justify-content-between bg-light">
                    <button type="button" class="btn btn-danger btn-sm"
                        data-dismiss="modal">Cancelar
                        &nbsp;<i class="fas fa-times"></i></button>
                    <button type="button" class="btn btn-primary btn-sm" onclick="editProvider();">Guardar Cambios
                        &nbsp;<i class="fas fa-save"></i></button>

                </div>
            </form>
        </div>

    </div>

</div>
<div class="modal fade" id="modal-view-provider">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title"><i class="fas fa-eye"></i>&nbsp; Info Proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Profile Image -->
            <div class="card-body bg-light">
                <strong><i class="fas fa-barcode mr-1"></i>RUC</strong>
                <p class="text-muted" id="p_ruc"></p>
                <hr>
                <strong><i class="fas fa-building mr-1"></i>Razon Social</strong>
                <p class="text-muted" id="p_empresa"></p>
                <hr>
                <strong><i class="fas   fa-street-view mr-1"></i>Direccion o Ubicacion</strong>
                <p class="text-muted" id="p_direccion"></p>
                <hr>
                <strong><i class="fa fa-envelope mr-1"></i>Correo</strong>
                <p class="text-muted" id="p_correo"></p>
                <hr>
                <strong><i class="fa fa-phone mr-1"></i>Telefono</strong>
                <p class="text-muted" id="p_telefono"></p>
                <hr>
                <strong><i class="fa fa-calendar mr-1"></i>Creacion</strong>
                <p class="text-muted" id="p_creacion"></p>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>

<!-----Script Provider----->
<script src="../tmp/adminLTE/dist/js/pages/customer/list_provider.js"></script>

<!----Sweet Alert --->
<!-- <script src="../startbootstrap/sweetAlert/sweetalert2.js"></script> -->