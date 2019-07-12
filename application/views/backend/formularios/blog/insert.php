<br>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Insertar 
            <small>Previo</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Blog</a></li>
            <li class="active">Publicación</li>
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
                    <?= form_open_multipart('Blog/insert/1', array('class'=>'form-horizontal')) ?>
                    <?= form_label('Codigo:','codigo')?>
                    <?= form_input(array('name'=>'codigo', 'value'=>set_value('codigo'), 'id'=>'codigo', 'placeholder'=>'Codigo del chalet', 'type'=>'text', 'class'=>'form-control')) ?>
                    </div>                    
                    <div class="form-group">
                    <?= form_label('Titúlo:','titulo')  ?>
                    <?= form_input(array('name'=>'titulo', 'id'=>'titulo', 'placeholder'=>'Titúlo del la Publicaciön', 'type'=>'text', 'class'=>'form-control')) ?>
                    </div>
                    <div class="form-group">
                    <?= form_label('Descripción:','descripcion')  ?>
                    <?= form_textarea(array('name'=>'descripcion', 'id'=>'descripcion', 'placeholder'=>'Descripción de la Publicación', 'rows'=>'3', 'type'=>'text-tarea', 'class'=>'form-control')) ?>  
                    </div>
                    <div class="form-group">
                    <?= form_label('Subir una Foto al Servidor:','')  ?>
                    <?= form_input(array('name'=>'file', 'type'=>'file')) ?>  
                    </div>
                    <div class="form-group">
                    <?= form_label('Autor:','autor')  ?>
                    <?= form_input(array('name'=>'autor', 'value'=>'en construccion','id'=>'autor', 'placeholder'=>'Autor del la Publicaciön', 'type'=>'text', 'class'=>'form-control', 'readonly'=>'readonly')) ?>
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