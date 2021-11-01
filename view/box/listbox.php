<script type="text/javascript" src="../config/functBox.js?rev=<?php echo time(); ?>"></script>

<section class="content-header">
    <!-- <h1 class="h3 mb-4 text-gray-800">Almacen</h1> -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Caja</h6>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 contenido-caja">
        <!-- <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="h5"><i class="fas fa-receipt m-2"></i> Card title</h5>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Description lists</dt>
                        <dd class="col-sm-9">A description list is perfect for defining terms.</dd>
                        <dt class="col-sm-3">Another term</dt>
                        <dd class="col-sm-9">This definition is short, so no extra paragraphs or anything.</dd>
                    </dl>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-success me-md-2 m-1" type="button"><i
                                class="fas fa-dollar-sign mx-2"></i>Cobrar</button>
                        <button class="btn btn-secondary me-md-2 m-1" type="button">Cancelar</button>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div> -->
    </div>
</section>

<!-- <div class="modal fade" id="modal-register-category">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title"><i class="fas fa-cubes"></i>&nbsp; Nueva Categoria</h4>
                <button type="button" class="close" id="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="register-modal form-register-category">
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
                                    onkeypress="return enableLettrs(event)" required>
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
                    <button id="show_password" class="btn btn-warning btn-sm" type="button"
                        onclick="show_Textarea(textarea)">
                        <span class="fa fa-toggle-on icon"></span>&nbsp;Descripcion
                    </button>
                    <div class="btn-group drop-up">
                        <button type="button" id="btn-cancel" class="btn btn-danger btn-sm"
                            data-dismiss="modal">Cancelar
                            &nbsp;<i class="fas fa-times"></i></button>
                        <button type="button" class="btn btn-primary btn-sm" onclick="registCategory();">Guardar Cambios
                            &nbsp;<i class="fas fa-save"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> -->


<!-----Script Category----->
<!-- <script src="../tmp/adminLTE/dist/js/pages/category/list_category.js"></script> -->