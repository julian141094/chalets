<br>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Modificar 
            <small>Previo</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Chalets</a></li>
            <li class="active">Insertar</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Ingrese los Datos</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                     <div class="form-group">
                    <!-- form start -->
                    <?= form_open_multipart('Blog/update/'.$row->id.'/1', array('class'=>'form-horizontal')) ?>

                    <?= form_label('Id:','id')?>
                    <?= form_input(array('name'=>'id', 'value'=>set_value('id',$row->id), 'id'=>'id', 'placeholder'=>'Id del chalet', 'type'=>'text', 'class'=>'form-control', 'readonly'=>'readonly')) ?>
                    </div>

                    <div class="form-group">
                    <?= form_label('Codigo:','codigo')?>
                    <?= form_input(array('name'=>'codigo', 'value'=>set_value('id',$row->codigo), 'id'=>'codigo', 'placeholder'=>'Codigo de la Publicación', 'type'=>'text', 'class'=>'form-control')) ?>
                    </div>
                    
                    <div class="form-group">
                    <?= form_label('Titúlo:','titulo')  ?>
                    <?= form_input(array('name'=>'titulo', 'value'=>set_value('titulo',$row->titulo), 'id'=>'titulo', 'placeholder'=>'Titulo de la Publicación', 'type'=>'text', 'class'=>'form-control')) ?>
                    </div>
                                        
                    <div class="form-group">
                    <?= form_label('Descripción','descripcion')  ?>
                    <?= form_textarea(array('name'=>'descripcion', 'value'=>set_value('descripcion',$row->descripcion), 'id'=>'descripcion', 'placeholder'=>'Descripcion de la Publicación', 'type'=>'text-tarea', 'class'=>'form-control')) ?>  
                    </div>

                    <div class="form-group">
                    <?= form_label('Autor:','autor')  ?>
                    <?= form_input(array('name'=>'autor', 'value'=>set_value('autor',$row->autor), 'id'=>'autor', 'placeholder'=>'Autor de la Publicación', 'type'=>'text', 'class'=>'form-control')) ?>
                    </div>

            
                    <?= form_submit('', 'insertar', 'class = "btn btn-info pull-right')?>
                    <?= form_close() ?>                    

                    </div>

   

                    <!-- Select multiple-->
                    
                    <div class="form-group">
                      <label></label>
                     
                    </div>

                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->