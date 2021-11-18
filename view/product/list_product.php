<?php
session_start();
?>
<script type="text/javascript" src="../config/functProd.js?rev=<?php echo time(); ?>"></script>
<!-- ES: Comienza contenedor producto-->
<section class="content-header">
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Almacen</h1>
    </div>
</section>
    <!-- ES: Contenedor principal-->
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-8">
                            <!-- ES: Comienza buscador de tabla producto -->
                            <div class="input-group">
                                <input type="text" class="global_filter form-control" placeholder="Buscar" id="global_filter">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                            </div>
                            <!-- ES: Termina buscador de tabla producto -->
                        </div>
                        <div class="col-4">
                            <!-- ES: Comienza boton 'Agregar' producto -->
                            <button class="btn btn-block btn-primary" onclick="notcloseModal('#modal-register-product');"
                                data-target="#modal-register-product">
                                <span class="">Agregar</span>
                            </button>
                            <!-- ES: Termina boton 'Agregar' producto -->
                        </div>
                    </div>
                    <!-- ES: Comienza tabla para listar productos-->
                    <table id="table_product" class="display responsive nowrap text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Existencia</th>
                                <th>Creacion</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nro</td>
                                <td>Codigo</td>
                                <td>Nombres</td>
                                <th>Precio</th>
                                <td>Existencia</td>
                                <td>Creacion</td>
                                <td>Estado</td>
                                <td>Acciones</td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- ES: Termina tabla para listar productos-->
                </div>
            </div>
        </section>  
<!-- ES: Termina contenedor producto-->
    <!-- ES: Comienza modulo o ventana para registrar producto-->
    <div class="modal fade" id="modal-register-product">
        <div class="modal-dialog modal-lg">
            <div class="modal-content"><div class="modal-header bg-lightblue">
                    <h4 class="modal-title"><i class="fas fa-cube"></i>&nbsp; Registrar Producto</h4>
                    <button type="button" class="close" id="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div><form class = "register-modal">
                    <div class="modal-body bg-light">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <label title="Importante">Nombre<i class="text-danger"
                                                        title="Importante">*</i></label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                            </div>
                                        </div>
                                        <input type="text" minlegth="10" maxlength="100" id="prod_nom" class="form-control"
                                            onpaste="return false" placeholder="..." required
                                            onkeypress="return enableLettrs(event)">
                                     </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <label title="Importante">Descripción<i class="text-danger"
                                                        title="Importante"></i></label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                            </div>
                                        </div>
                                        <textarea class="form-control" placeholder="Información del producto ..." minlegth="10" maxlength="100"
                                            id="prod_descrip"  style="height: 40px;" disabled></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label title="Importante">Categoria<i class="text-danger"
                                                        title="Importante">*</i></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-boxes"></i></span>
                                            </div>
                                            <select class="custom-select" id="select_category">
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label title="Importante">Proveedor<i class="text-danger"
                                                        title="Importante">*</i></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-truck"></i></span>
                                            </div>
                                            <select class="custom-select" id="select_provider">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <label title="Importante">Compra<i class="text-danger"
                                                        title="Importante">*</i></label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                            </div>
                                        </div>


                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">S/.</span>
                                            </div>
                                            <input type="number" maxlength="30" id="prod_precentrada" placeholder="00.00"
                                                class="form-control" onkeypress="return enableNum(event)" min="0">
                                            <!-- <input type="text" maxlength="30" id="prod_precentrada" placeholder="00.00"
                                                class="form-control"> -->
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i class="fas fa-chevron-down"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <label title="Importante">Venta<i class="text-danger"
                                                        title="Importante">*</i></label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">S/.</span>
                                            </div>
                                            <input type="number" maxlength="30" id="prod_precsalida" class="form-control"
                                                placeholder="00.00" onkeypress="return enableNum(event)" min="0">
                                            <!-- <input type="text" maxlength="30" id="prod_precsalida" class="form-control"
                                                placeholder="00.00"> -->
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i class="fas fa-chevron-up"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <label title="Importante" >Medida<i class="text-danger"
                                                        title="Importante">*</i></label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-tags"></i></span>
                                            </div>
                                            <select class="custom-select" id="select_unid">
                                                <option selected disabled value='a'>Selecciona Medida</option>
                                                <option value="Metros">Metros</option>
                                                <option value="Centimetros">Centimetros</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <label title="Importante">Inventario Minimo<i class="text-danger"
                                                        title="Importante">*</i></label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                            </div>
                                        </div>


                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-bell"></i></div>
                                            </div>
                                            <input type="number" maxlength="30" id="prod_mini" class="form-control"
                                                placeholder="0000" onkeypress="return enableEnt(event)" min="0">
                                            <!-- <input type="text" maxlength="30" id="prod_mini" class="form-control"
                                                placeholder="0000"> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <label title="Importante">Existencia actual<i class="text-danger"
                                                        title="Importante">*</i></label>
                                            </div>
                                            <div class="col-sm-3">
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="fa fa-fw fa-flag-checkered"></i></span>
                                            </div>
                                            <input type="number" class="form-control" id="prod_cant" class="form-control"
                                                placeholder="0000" onkeypress="return enableEnt(event)" min="0">
                                            <!-- <input type="text" class="form-control" id="prod_cant" class="form-control"
                                                placeholder="0000"> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer justify-content-between bg-light">
                        <button id="show_password" class="btn btn-warning btn-sm" type="button"
                            onclick="show_Textarea(prod_descrip)">
                            <span class="fa fa-toggle-on icon"></span>&nbsp;Descripción
                        </button>
                        <div class="btn-group drop-up">
                            <button type="button" class="btn btn-danger btn-sm" id="btn-cancel" data-dismiss="modal">Cancelar
                                &nbsp;<i class="fas fa-times"></i></button>
                            <button type="button" class="btn btn-primary btn-sm" onclick="registProduct();">Guardar Cambios
                                &nbsp;<i class="fas fa-save"></i></button>

                                <!-- 
                    <div class="btn-group drop-up">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar
                            &nbsp;<i class="fas fa-times"></i></button>
                        <button type="button" class="btn btn-primary btn-sm" onclick="editCategory();">Guardar Cambios
                            &nbsp;<i class="fas fa-save"></i></button>
                    </div>

                                 -->
                        </div>
                    </div>
                </form>
                <input type="text" style="display:none" id="usuarioid"
                                        value="<?php echo $_SESSION['se_id'] ?>">
            </div>

        </div>

    </div>
    <!-- ES: Termina modulo o ventana para registrar producto-->

    <!-- ES: Comienza modulo o ventana para editar producto-->
    <div class="modal fade" id="modal-edit-product">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-info">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-cube"></i>&nbsp; Modificar Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"  id="btn-close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div><form>
                    <div class="modal-body bg-light">
                        <!-- <div class="">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <div class="code-bar-edit input-group"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <label title="Importante">Nombre<i class="text-danger"
                                                        title="Importante">*</i></label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                            </div>
                                        </div>

                                        <input type="text" minlegth="10" maxlength="100" id="prod_nom_edt"
                                            class="form-control" onpaste="return false" placeholder="ejemplo: Pedro Luis"
                                            required onkeypress="return enableLettrs(event)">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <label title="Importante">Descripción</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                            </div>
                                        </div>

                                        <textarea class="form-control" placeholder="Enter ..." minlegth="10" maxlength="100"
                                            id="description_register" placeholder="ejemplo: Pedro Luis"
                                            style="height: 40px;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <label title="Importante">Categoria<i class="text-danger"
                                                        title="Importante">*</i></label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-cubes"></i></span>
                                            </div>
                                            <select class="custom-select" id="select_category_edt">
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <label title="Importante">Proveedor<i class="text-danger"
                                                        title="Importante">*</i></label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-truck"></i></span>
                                            </div>
                                            <select class="custom-select" id="select_provider_edt">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <label title="Importante">Compra<i class="text-danger"
                                                        title="Importante">*</i></label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                            </div>
                                        </div>


                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">s/</span>
                                            </div>
                                            <input type="number" maxlength="30" id="prod_precentrada_edt" placeholder="00.00"
                                                class="form-control" onkeypress="return enableNum(event)" min="0">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i class="fas fa-chevron-down"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <label title="Importante">Venta<i class="text-danger"
                                                        title="Importante">*</i></label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                            </div>
                                        </div>


                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">s/</span>
                                            </div>
                                            <input type="number" maxlength="30" id="prod_precsalida_edt" class="form-control"
                                                placeholder="00.00" onkeypress="return enableNum(event)" min="0">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i class="fas fa-chevron-up"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <label title="Importante">Medida<i class="text-danger"
                                                        title="Importante">*</i></label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-tags"></i></span>
                                            </div>
                                            <select class="custom-select" id="select_unid_edt">
                                                <option value="Metros">Metros</option>
                                                <option value="Centimetros">Centimetros</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <label title="Importante">Inventario Minimo<i class="text-danger"
                                                        title="Importante">*</i></label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                            </div>
                                        </div>


                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-bell"></i></div>
                                            </div>
                                            <input type="number" maxlength="30" id="prod_mini_edt" min="0" class="form-control"
                                                placeholder="0000" onkeypress="return enableEnt(event)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between bg-light">
                        <button id="show_password" class="btn btn-warning btn-sm" type="button"
                            onclick="show_Textarea(description_register)">
                            <span class="fa fa-toggle-off icon"></span>&nbsp;Descripción
                        </button>
                        <div class="btn-group drop-up">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" id="btn-cancel">Cancelar
                                &nbsp;<i class="fas fa-times"></i></button>
                            <button type="button" class="btn btn-primary btn-sm" onclick="editProduct();">Guardar Cambios
                                &nbsp;<i class="fas fa-save"></i></button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
    <!-- ES: Termina modulo o ventana para editar producto-->
    <div class="modal fade" id="modal-view-product">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h4 class="modal-title"><i class="fas fa-eye"></i>&nbsp; Informacion Categoria</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Profile Image -->
                <div class="card-body bg-light">
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="code-bar-view text-center">

                            </div>
                        </div>
                        <div class="col-lg-5 col-6">
                            <div class="title-product h4 text-left">

                            </div>
                            <div class="category-product text-secondary text-left">

                            </div>
                            <div class="calendar-product text-secondary text-left">

                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="quanty-product h4">
                            </div>
                            <p class="price-product text-secondary">
                            </p>
                        </div>
                    </div>
                    <hr>
                    <dl class="row">
                        <dt class="col-sm-4">Descripcion</dt>
                        <dd class="col-sm-8 descripcion"></dd>
                        <dt class="col-sm-4">Proveedor</dt>
                        <dd class="col-sm-8 proveedor"></dd>
                        <dt class="col-sm-4">Unidad de Medida</dt>
                        <dd class="col-sm-8 unidad"></dd>
                        <dt class="col-sm-4">Creado por</dt>
                        <dd class="col-sm-8 usuario-creador"></dd>
                    </dl>

                    <!-- <strong><i class="fas fa-bookmark mr-1"></i>Nombre de la Categoria</strong>
                    <p class="text-muted" id="c_nombre"></p>
                    <hr>
                    <strong><i class="fas  fa-i-cursor mr-1"></i>Descripcion</strong>
                    <p class="text-muted" id="c_descrip"></p>
                    <hr>
                    <strong><i class="fa fa-calendar mr-1"></i>Creacion</strong>
                    <p class="text-muted" id="c_creacion"></p> -->
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
<!-----Script List product--->
<script src="../tmp/adminLTE/dist/js/pages/product/list_product.js"></script>

<!----JsBarcode----->
<script src="../tmp/adminLTE/plugins/Barcode/JsBarcode.all.min.js"></script>