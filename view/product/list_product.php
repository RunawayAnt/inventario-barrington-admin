<?php
session_start();
?>
<script type="text/javascript" src="../js/functProd.js?rev=<?php echo time(); ?>"></script>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Almacen</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item text-blue">Almacen</li>
                    <li class="breadcrumb-item active">Productos</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Productos</h3>
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
                        onclick="notcloseModal('#modal-register-product');"
                        data-target="#modal-register-product">Agregar Producto
                        &nbsp;<i class="fas fa-cube"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-body <svg id="barcode"></svg>-->
            <table id="table_product" class="display responsive nowrap text-center" style="width:100%">
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Unidad de Medida</th>  
                        <th>Precio Entrada</th>
                        <th>Precio Salida</th>
                        <th>Minimo Inventario</th> 
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
                        <td>Unidad de Medida</td>
                        <td>Precio Entrada</td>
                        <td>Precio Salida</td>
                        <td>Minimo Inventario</td>
                        <td>Existencia</td>
                        <td>Creacion</td>
                        <td>Estado</td>
                        <td>Acciones</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
</div>
</div>
<div class="modal fade" id="modal-register-product">
    <div class="modal-dialog modal-xl">
        <div class="modal-content bg-lightblue">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-cube"></i>&nbsp; Registrar Producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cleanInputs();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body bg-light">

                    <div class="callout">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label title="Importante">Nombre del Producto<i class="text-danger"
                                                    title="Importante">*</i></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                        </div>
                                    </div>

                                    <input type="text" minlegth="10" maxlength="100" id="prod_nom" class="form-control"
                                        onpaste="return false" placeholder="ejemplo: Pedro Luis" required
                                        onkeypress="return enableLettrs(event)">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label title="Importante">Caracteristicas<i class="text-danger"
                                                    title="Importante">*</i></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                        </div>
                                    </div>

                                    <textarea class="form-control" placeholder="Enter ..." minlegth="10" maxlength="100"
                                        id="prod_descrip" placeholder="ejemplo: Pedro Luis"
                                        style="height: 50px;" disabled></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
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
                                            <span class="input-group-text"><i class="fas fa-cubes"></i></span>
                                        </div>
                                        <select class="custom-select" id="select_category">
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-4">
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
                            <div class="col-sm-4">
                            </div>
                        </div>
                    </div>
                    <div class="callout">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label title="Importante">Precio Entrada<i class="text-danger"
                                                    title="Importante">*</i></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                        </div>
                                    </div>


                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">s/</span>
                                        </div>
                                        <input type="text" maxlength="30" id="prod_precentrada" placeholder="00.00"
                                            class="form-control" onkeypress="return enableNum(event)">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fas fa-chevron-down"></i></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label title="Importante">Precio Salida<i class="text-danger"
                                                    title="Importante">*</i></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                        </div>
                                    </div>


                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">s/</span>
                                        </div>
                                        <input type="text" maxlength="30" id="prod_precsalida" class="form-control"
                                            placeholder="00.00" onkeypress="return enableNum(event)">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fas fa-chevron-up"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label title="Importante">Unidad de Medida<i class="text-danger"
                                                    title="Importante">*</i></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-tags"></i></span>
                                        </div>
                                        <select class="custom-select" id="select_unid">
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
                                        <div class="col-sm-6">
                                            <label title="Importante">Inventario Minimo<i class="text-danger"
                                                    title="Importante">*</i></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                        </div>
                                    </div>


                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-bell"></i></div>
                                        </div>
                                        <input type="text" maxlength="30" id="prod_mini" class="form-control"
                                            placeholder="0000" onkeypress="return enableEnt(event)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label title="Importante">Inventario Inicial<i class="text-danger"
                                                    title="Importante">*</i></label>
                                        </div>
                                        <div class="col-sm-6">
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i
                                                    class="fa fa-fw fa-flag-checkered"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="prod_cant" class="form-control"
                                            placeholder="0000" onkeypress="return enableEnt(event)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" style="display:none" id="usuarioid"
                                    value="<?php echo $_SESSION['se_id'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between bg-light">
                    <button id="show_password" class="btn btn-warning" type="button"
                        onclick="show_Textarea(prod_descrip)">
                        <span class="fa fa-toggle-on icon"></span>&nbsp;<label id="text_btnarea">Caracteristica
                        </label>
                    </button>
                    <div class="btn-group drop-up">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"
                            onclick="cleanInputs();">Cancelar
                            &nbsp;<i class="fas fa-times"></i></button>
                        <button type="button" class="btn btn-primary btn-lg" onclick="registProduct();">Guardar Cambios
                            &nbsp;<i class="fas fa-save"></i></button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>
<div class="modal fade" id="modal-edit-product">
    <div class="modal-dialog modal-xl">
        <div class="modal-content bg-info">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-cube"></i>&nbsp; Editar Producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cleanInputs();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body bg-light">
                    <div class="callout callout-info">
                        <div class="row">
                            <div class="col-sm-3">

                                <label title="Importante">Codigo de Barras</label>

                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                        </div>
                                        <input type="text" maxlength="30" id="prod_codigobarra_edt" class="form-control"
                                            onkeypress="return enableNum(event)" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="callout callout-info">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label title="Importante">Nombre del Producto<i class="text-danger"
                                                    title="Importante">*</i></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                        </div>
                                    </div>

                                    <input type="text" minlegth="10" maxlength="100" id="prod_nom_edt"
                                        class="form-control" onpaste="return false" placeholder="ejemplo: Pedro Luis"
                                        required onkeypress="return enableLettrs(event)">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label title="Importante">Caracteristicas<i class="text-danger"
                                                    title="Importante">*</i></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                        </div>
                                    </div>

                                    <textarea class="form-control" placeholder="Enter ..." minlegth="10" maxlength="100"
                                        id="prod_descrip_edt" placeholder="ejemplo: Pedro Luis"
                                        style="height: 50px;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
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
                                            <span class="input-group-text"><i class="fas fa-cubes"></i></span>
                                        </div>
                                        <select class="custom-select" id="select_category_edt">
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-4">
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
                                        <select class="custom-select" id="select_provider_edt">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                            </div>
                        </div>
                    </div>
                    <div class="callout callout-info">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label title="Importante">Precio Entrada<i class="text-danger"
                                                    title="Importante">*</i></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                        </div>
                                    </div>


                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">s/</span>
                                        </div>
                                        <input type="text" maxlength="30" id="prod_precentrada_edt" placeholder="00.00"
                                            class="form-control" onkeypress="return enableNum(event)">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fas fa-chevron-down"></i></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label title="Importante">Precio Salida<i class="text-danger"
                                                    title="Importante">*</i></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                        </div>
                                    </div>


                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">s/</span>
                                        </div>
                                        <input type="text" maxlength="30" id="prod_precsalida_edt" class="form-control"
                                            placeholder="00.00" onkeypress="return enableNum(event)">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fas fa-chevron-up"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label title="Importante">Unidad de Medida<i class="text-danger"
                                                    title="Importante">*</i></label>
                                        </div>
                                        <div class="col-sm-6">
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
                                        <div class="col-sm-6">
                                            <label title="Importante">Inventario Minimo<i class="text-danger"
                                                    title="Importante">*</i></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="block" id="alert_cli_nombres" style="display:none"></label>
                                        </div>
                                    </div>


                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-bell"></i></div>
                                        </div>
                                        <input type="text" maxlength="30" id="prod_mini_edt" class="form-control"
                                            placeholder="0000" onkeypress="return enableEnt(event)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                            </div>
                            <div class="col-sm-4">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between bg-light">

                    <button id="show_password" class="btn btn-warning" type="button"
                        onclick="show_Textarea(prod_descrip_edt)">
                        <span class="fa fa-toggle-off icon"></span>&nbsp;<label id="text_btnarea">Caracteristica
                        </label>
                    </button>
                    <div class="btn-group drop-up">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"
                            onclick="cleanInputs();">Cancelar
                            &nbsp;<i class="fas fa-times"></i></button>
                        <button type="button" class="btn btn-primary btn-lg" onclick="editProduct();">Guardar Cambios
                            &nbsp;<i class="fas fa-save"></i></button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>
<script src="../templates/main/product/list_product.js"></script>
<script src="../templates/templates_login/sweetAlert/sweetalert2.js"></script>
<script src="../js/JsBarcode.all.min.js"></script>