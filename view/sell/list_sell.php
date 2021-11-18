<script type="text/javascript" src="../config/functSell.js?rev=<?php echo time(); ?>"></script>

<section class="content-header">
    <h1 class="h3 mb-4 text-gray-800">Venta</h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Ventas</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-12 col-lg-6 mb-3">
                    <div class="input-group">
                        <input type="text" class="global_filter form-control" placeholder="Buscar" id="global_filter">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-6 mb-3">
                    <!-- <button class="btn btn-block btn-primary" onclick="notcloseModal('#modal-register-category');"
                     data-target="#modal-register-category">
                        <span class="text">Agregar</span>
                    </button> -->
                </div>
            </div>

            <!-- /.card-body -->
            <table id="table_sell" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>Clientes</th>
                        <th>Vendedor</th>
                        <th>Total</th>
                        <th>Tipo de pago</th>
                        <th>Estado</th>
                        <th>Creacion</th>
                     </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nro</td>
                        <td>Clientes</td>
                        <td>Vendedor</td>
                        <td>Total</td>
                        <td>Tipo de pago</td>
                        <td>Estado</td>
                        <td>Creacion</td>
                     </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-view-category">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
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

<!-----Script Category----->
<script src="../tmp/adminLTE/dist/js/pages/sell/list_sell.js"></script>
