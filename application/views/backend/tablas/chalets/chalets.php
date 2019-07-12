      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Listado de Chalets 
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Listado</a></li>
            <li class="active">Chalets</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Tabla de Datos (Todos)</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Ubicación</th>
                        <th>Imagen</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>
                    <tbody>
                          <?php
                          if ($rows!=0) { 
                          foreach ($rows as $key) {
                          ?>
                            <tr> 
                            <td><?= $key->id        ?></td>
                            <td><?= $key->codigo    ?></td>
                            <td><?= $key->nombre    ?></td>
                            <td><?php if ($key->estado == 1) {
                                echo "Operativo";
                                }
                                else{
                                echo "Inoperativo";  
                                }?>
                            </td>
                            <td><?= $key->ubicacion ?></td>
                            <td><?php if ($key->image != '') { ?>
                            <img src="<?=base_url('uploads/chalets/'.$key->codigo.'/'.$key->image)?>" id="image-table" width="40px" height="40px" alt="Image-Chalet">
                            <?php } ?>
                            </td>
                            <td><a href="<?=site_url('Chalets/update/'.$key->id)?>" class="btn btn-primary">Modificar </a> </td>
                            <td><a href="<?=site_url('Chalets/delete/'.$key->id)?>" class="btn btn-primary">Eliminar  </a></td>
                            </tr>
                          <?php 
                          }
                          } ?>           
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Codigo</th>
                        <th>Estado</th>
                        <th>Ubicación</th>
                        <th>Imagen</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

    <div >
    <a href="<?=site_url('Chalets/insertar')?>" class="btn btn-primary">Insertar</a>
    </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <div class="control-sidebar-bg"></div>

    
    