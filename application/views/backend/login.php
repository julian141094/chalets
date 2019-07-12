  <body id="body-login">


<div id="form-login">
          <div class="col-md-4">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Ingresar al Panel de Control</h3>
                </div><!-- /.box-header -->

                  <?= validation_errors('<div>','</div>') ?>

                <!-- form start -->
                <?= form_open('backend/login', array('class'=>'form-horizontal')) ?>
                <!--<form class="form-horizontal">-->
                  <div class="box-body">
                    <div class="form-group">
                      <?= form_label('Nombre:','nombre', array('class'=>'col-sm-2 control-label'))  ?>
                      <!--<label for="inputEmail3" class="col-sm-2 control-label">Email</label>-->
                      <div class="col-sm-10">
                        <?= form_input(array('id'=>'nombre', 'name' => 'nombre', 'placeholder'=>'Name', 'type'=>'text', 'class'=>'form-control', 'autocomplete'=>'off')) ?>
                        <!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
                      </div>
                    </div>
                    <div class="form-group">
                      <?= form_label('Clave:','clave', array('class'=>'col-sm-2 control-label'))  ?>
                      <!--<label for="inputPassword3" class="col-sm-2 control-label">Password</label>-->
                      <div class="col-sm-10">
                        <?= form_input(array('id'=>'clave', 'name' => 'clave', 'placeholder'=>'Password', 'type'=>'Password', 'class'=>'form-control', 'autocomplete'=>'off')) ?>
                        <!--<input type="password" class="form-control" id="inputPassword3" placeholder="Password">-->
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> Remember me
                          </label>
                        </div>
                        
                        <?= form_submit('', 'login', 'class = "btn btn-info pull-right')?>
                        <?= form_close() ?>
                        

                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  
</div>
                    

                    <br>
                    <br>
<br><br><br>
                  
                <!--</form>-->
              </div><!-- /.box -->
</div>              <!-- general form elements disabled -->

