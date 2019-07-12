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
                    <?= form_open('Chalets/insertar/2', array('class'=>'form-horizontal')) ?>

                    <?= form_label('Id:','id')?>
                    <?= form_input(array('name'=>'id', 'id'=>'id', 'placeholder'=>'Id del chalet', 'type'=>'text', 'class'=>'form-control')) ?>
                    </div>
                    
                    <div class="form-group">
                    <?= form_label('Nombre:','nombre')  ?>
                    <?= form_input(array('name'=>'nombre', 'id'=>'nombre', 'placeholder'=>'Nombre del Chalet', 'type'=>'text', 'class'=>'form-control')) ?>
                    </div>
                    <div class="form-group">
                    <?= form_label('Estado del Chalet:','')  ?>
                    </div>   
                     <!-- checkbox -->
                   <!-- radio -->
                   <div class="form-group">
                   <?= form_label('Operativo  ->','operativo')  ?>
                   <?= form_radio('estado', '1', 'true','id="operativo"') ?>
                   </div>
                   <div class="form-group">
                   <?= form_label('Inoperativo->','inoperativo')  ?>
                   <?= form_radio('estado', '0', '', 'id="inoperativo"')?>
                   </div>
                    
                    <div class="form-group">
                    <?= form_label('Hubicacion:','hubicacion')  ?>
                    <?= form_input(array('name'=>'hubicacion', 'id'=>'hubicacion', 'placeholder'=>'Hubicacion del Chalet', 'type'=>'text', 'class'=>'form-control')) ?>  
                    </div>
            
                    <div class="form-group">
                    <?= form_label('Subir una Foto al Servidor:','')  ?>
                    <?= form_input(array('name'=>'fotoChalet', 'type'=>'file')) ?>  
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