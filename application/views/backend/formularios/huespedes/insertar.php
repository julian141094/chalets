<br>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Insertar 
            <small>Previo</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li><a href="#">Huespedes</a></li>
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
                    <?= form_open('Huespedes/insertar/2', array('class'=>'form-horizontal', 'autocomplete'=>'off')) ?>

                    <?= form_label('Cedula:','ci')?>
                    <?= form_input(array('name'=>'ci', 'id'=>'ci', 'placeholder'=>'Cedula del Usuario', 'type'=>'text', 'class'=>'form-control')) ?>
                    </div>
                    
                    <div class="form-group">
                    <?= form_label('Nombre:','nombre')  ?>
                    <?= form_input(array('name'=>'nombre', 'id'=>'nombre', 'placeholder'=>'Nombre del Usuario', 'type'=>'text', 'class'=>'form-control')) ?>
                    </div>
                    <div class="form-group">
                    <?= form_label('Apellido:','apellido')  ?>
                    <?= form_input(array('name'=>'apellido', 'id'=>'apellido', 'placeholder'=>'Apellido del Usuario', 'type'=>'text', 'class'=>'form-control')) ?>
                    </div>
                    <div class="form-group">
                    <?= form_label('Email:','email')  ?>
                    <?= form_input(array('name'=>'email', 'id'=>'email', 'placeholder'=>'Email del Usuario', 'type'=>'email', 'class'=>'form-control')) ?>
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