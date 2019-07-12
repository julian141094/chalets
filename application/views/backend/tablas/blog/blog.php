      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Listado de Publicaciones 
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Listado</a></li>
            <li class="active">Publicaciones</li>
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
                        <th style="width: 5px;">Id</th>
                        <th style="width: 5px;">Cod</th>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th style="width: 32px;">Imagen</th>
                        <th style="width: 50px;">Autor</th>
                        <th style="width: 60px;">Fecha</th>
                        <th style="width: 10px;">Modif</th>
                        <th style="width: 10px;">Elimi</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                          <?php

                          if ($rows!=0) {
                             
                          foreach ($rows as $key) {
                          ?>

                          <tr> 



                            <td style="width: 5px;"><?= $key->id          ?></td>
                            <td style="width: 5px;"><?= $key->codigo      ?></td>
                            <td><?= $key->titulo      ?></td>
                            <td style="max-width: 150px;"><?= $key->descripcion ?></td>
                            <td style="width: 32px;"><?php if ($key->image != '') { ?>
                            <img src="<?=base_url('uploads/blog/'.$key->codigo.'/'.$key->image)?>" id="image-table" width="40px" height="40px" alt="Image-Chalet">
                            <?php } ?>
                            </td>
                            <td style="width: 50px;"><?= $key->autor ?></td>
                            <td> </td>
                            <td><a href="<?=site_url('Blog/update/'.$key->id)?>" class="btn btn-primary">Modificar </a> </td>
                            <td><a href="<?=site_url('Blog/delete/'.$key->id)?>" class="btn btn-primary">Eliminar  </a></td>
                            </tr>

                          <?php 
                          }

                          } ?>
                        
                      
                      
                      
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Id</th>
                        <th>Cod</th>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>Autor</th>
                        <th>Fecha</th>
                        <th>Modif</th>
                        <th>Elimi</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

    <div >
    <a href="<?=site_url('Blog/insert')?>" class="btn btn-primary">Insertar</a>
    </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <div class="control-sidebar-bg"></div>

    
    