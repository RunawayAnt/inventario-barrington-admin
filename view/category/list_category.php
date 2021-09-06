<script type="text/javascript" src="../js/functCate.js?rev=<?php echo time(); ?>"></script>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Almacen</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item text-blue">Almacen</li>
                    <li class="breadcrumb-item text-blue">Catalogo</li>
                    <li class="breadcrumb-item active">Categorias</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Categorias</h3>
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
                        onclick="notcloseModal('#modal-register-category');"
                        data-target="#modal-register-category">Agregar Categoria
                        &nbsp;<i class="fas fa-cubes"></i>
                    </button>
                </div>
            </div>

            <!-- /.card-body -->
            <table id="table_category" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>Nombres</th>
                        <th>Creacion</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nro</td>
                        <td>Nombres</td>
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
<div class="modal fade" id="modal-register-category">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-lightblue">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-cubes"></i>&nbsp; Nueva Categoria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cleanInputs();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body bg-light">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label title="Importante">Nombre Categoria<i class="text-danger"
                                                title="Importante">*</i></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="block" id="alert_nombre_categoria" style="display:none"></label>
                                    </div>
                                </div>

                                <input type="text" minlegth="10" maxlength="200" id="nombre_categoria"
                                    class="form-control" onpaste="return false" placeholder="ejemplo: Tela de Seda"
                                    required onkeypress="return enableLettrs(event)">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label title="Importante">Descripcion</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="block" id="alert_textarea" style="display:none"></label>
                                    </div>
                                </div>
                                <textarea class="form-control" rows="3" placeholder="Sobre la tela..."
                                    style="height: 78px;" id="textarea"
                                    onkeypress="return enableLettrsTextArea(event)"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between bg-light">
                    <button id="show_password" class="btn btn-warning" type="button" onclick="show_Textarea(textarea)">
                        <span class="fa fa-toggle-on icon"></span>&nbsp;<label id="text_btnarea">Descripcion
                        </label>
                    </button>
                    <div class="btn-group drop-up">
                        <button type="button" class="btn btn-danger btn-lg" onclick="cleanInputs();"
                            data-dismiss="modal">Cancelar
                            &nbsp;<i class="fas fa-times"></i></button>
                        <button type="button" class="btn btn-primary btn-lg" onclick="registCategory();">Guardar Cambios
                            &nbsp;<i class="fas fa-save"></i></button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>
<div class="modal fade" id="modal-edit-category">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-info">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-sitemap"></i>&nbsp; Editar Categoria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body bg-light">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label title="Importante">Nombre Categoria<i class="text-danger"
                                                title="Importante">*</i></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="block" id="alert_nombre_categoria" style="display:none"></label>
                                    </div>
                                </div>

                                <input type="text" minlegth="10" maxlength="200" id="edit_nombre_categoria"
                                    class="form-control" onpaste="return false" placeholder="ejemplo: Tela de Seda"
                                    required onkeypress="return enableLettrs(event)">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label title="Importante">Descripcion</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="block" id="alert_textarea" style="display:none"></label>
                                    </div>
                                </div>
                                <textarea class="form-control" rows="3" placeholder="Sobre la tela..."
                                    style="height: 78px;" id="edit_textarea"
                                    onkeypress="return enableLettrsTextArea(event)"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between bg-light">
                    <button id="show_password" class="btn btn-warning" type="button"
                        onclick="show_Textarea(edit_textarea)">
                        <span class="fa fa-toggle-off icon"></span>&nbsp;<label id="text_btnarea">Descripcion
                        </label>
                    </button>
                    <div class="btn-group drop-up">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar
                            &nbsp;<i class="fas fa-times"></i></button>
                        <button type="button" class="btn btn-primary btn-lg" onclick="editCategory();">Guardar Cambios
                            &nbsp;<i class="fas fa-save"></i></button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>
<div class="modal fade" id="modal-view-category">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-eye"></i>&nbsp; Informacion Categoria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Profile Image -->
            <div class="card-body bg-light">
                <strong><i class="fas fa-bookmark mr-1"></i>Nombre de la Categoria</strong>
                <p class="text-muted" id="c_nombre"></p>
                <hr>
                <strong><i class="fas  fa-i-cursor mr-1"></i>Descripcion</strong>
                <p class="text-muted" id="c_descrip"></p>
                <hr>
                <strong><i class="fa fa-calendar mr-1"></i>Creacion</strong>
                <p class="text-muted" id="c_creacion"></p>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>

<script src="../templates/main/category/list_category.js"></script>
<script src="../templates/templates_login/sweetAlert/sweetalert2.js"></script>