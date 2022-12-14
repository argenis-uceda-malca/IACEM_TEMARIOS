<?php
include_once __DIR__ . '/../../templates/administrador/header.php';
?>

<?php
include_once __DIR__ . '/../../templates/administrador/sidebar.php';
?>

<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- *************************************************************** -->
        <!-- Start Top Leader Table -->
        <!-- *************************************************************** -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <h4 class="card-title">Lista de Marcas de productos</h4>
                            <div class="ml-auto">
                                <?php if (isset($_SESSION['admin'])) { ?>
                                    <div class="dropdown sub-dropdown">
                                        <button type="button" class="btn waves-effect waves-light btn-rounded btn-outline-success" data-toggle="modal" data-target="#myModalNuevaTema"><i class="fas fa-plus"></i> Agregar Tema</button>
                                        <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1">
                                            <a class="dropdown-item" href="#">Insert</a>
                                            <a class="dropdown-item" href="#">Update</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table no-wrap v-middle mb-0 AllDataTables" id="registro">
                                <thead>
                                    <tr class="border-0">
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">Id</h5>
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">Tema</h5>
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted"></th>
                                        <th class="border-0 font-14 font-weight-medium text-muted"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($temas as $key => $tema) {
                                        $idcurso = $tema->idcurso;
                                    ?>
                                        <tr>
                                            <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4"><?php echo $tema->id; ?>
                                            </td>
                                            <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4"><?php echo $tema->nombre; ?></td>
                                            <?php if (isset($_SESSION['admin'])) { ?>
                                                <td class="border-top-0 text-center px-2 py-4">
                                                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-outline-secondary editbtnTema" data-toggle="modal" data-target="#myModalTema" data-id="<?php echo $tema->id ?>"><i class="fa fa-edit"></i></button>
                                                </td>
                                                <td class="border-top-0 text-center px-2 py-4">
                                                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-outline-danger eliminartbtnTema" data-id="<?php echo $tema->id ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End Top Leader Table -->
        <!-- *************************************************************** -->

        <!-- Edit modal content -->
        <div id="myModalTema" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Actualice su tema</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                    </div>
                    <div class="modal-body">
                        <form action="POST" id="editarTema">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Tema</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese Nombre del Tema" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <input type="hidden" name="idcurso" value="<?php echo $_GET['curso'] ?>">
                                    <input type="hidden" name="id" id="id">
                                    <button type="submit" class="btn btn-info">Guardar</button>
                                    <button type="reset" class="btn btn-dark">Cancelar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- Add modal content -->
        <div id="myModalNuevaTema" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Registre un nuevo Tema</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                    </div>
                    <div class="modal-body">
                        <form action="POST" id="addTema" method="$_POST">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Tema</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="nombre" placeholder="Ingrese Nombre de la Marca" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <input type="hidden" name="idcurso" value="<?php echo $_GET['curso'] ?>">
                                    <button type="submit" class="btn btn-info">Guardar</button>
                                    <button type="reset" class="btn btn-dark">Cancelar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->


<?php
include_once __DIR__ . '/../../templates/administrador/footer.php';
?>



<?php
$script = "
    <script src='/build/admin/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js'></script>
    <script src='/build/admin/dist/js/pages/datatable/datatable-basic.init.js'></script>
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>

    <script src='https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
    <script src='https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js'></script>
    
        <script src='https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.templates.min.js'></script>
    

    <script src='/build/js/admin.js'></script>
    ";
?>