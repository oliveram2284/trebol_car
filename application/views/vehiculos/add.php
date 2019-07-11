
<div class="page-subheader mb-30">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-7">
                <div class="list">
                    <div class="list-item pl-0">
                        <div class="list-thumb ml-0 mr-3 pr-3  b-r text-muted">
                            <i class="icon-Car"></i>
                        </div>
                        <div class="list-body">
                            <div class="list-title fs-2x">
                                <h2>Formulario De Vehículo</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-5 d-flex justify-content-end h-md-down">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb no-padding bg-trans mb-30">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-Home mr-2 fs14"></i></a></li>
                        <li class="breadcrumb-item">Inicio</li>
                        <li class="breadcrumb-item active">Vehículo</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="container-fluid">
   

        <div class="portlet-box portlet-gutter ui-buttons-col mb-30">
            <div class="portlet-header flex-row flex d-flex align-items-center b-b invisible">
                <div class="flex d-flex flex-column">
                    <h3>Formulario de Usuario</h3> 
                    <span class="portlet-subtitle">Complete todos los campos antes de guardar.</span>
                </div>
            </div>
            <div class="portlet-body">
                <?php echo form_open($action,array('method'=>'post')); ?>
                    
                    <div class="form-group row">
                        <label for="categoria_id" class="col-sm-2 col-form-label">Categoría</label>
                        <div class="col-sm-6">                           
                            <select name="categoria_id" id="categoria_id" class="form-control">
                                <option value="">Seleccione una Categoria</option>
                                <?php foreach($categorias as $categoria):?>                                    
                                    <option value="<?php echo $categoria['id']?>" <?php echo (isset($vehiculo['categoria_id']) && $vehiculo['categoria_id']==$categoria['id'] )?'selected':''?> ><?php echo $categoria['nombre']?></option>
                                <?php endforeach;?>
                            </select>
                            <label id="categoria_id-error" class="error" for="categoria_id"><?php echo form_error('categoria_id'); ?></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dominio" class="col-sm-2 col-form-label">Dominio</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control  <?php echo (form_error('dominio')!='')?'error':''?>" id="dominio" name="dominio" value="<?php echo set_value('dominio',$vehiculo['dominio']); ?>" placeholder="Dominio">
                            <label id="dominio-error" class="error" for="dominio"><?php echo form_error('dominio'); ?></label>
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="marca" class="col-sm-2 col-form-label">Marca</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="marca" name="marca" value="<?php echo set_value('marca',$vehiculo['marca']); ?>" placeholder="Marca">
                            <label id="marca-error" class="error" for="marca"><?php echo form_error('marca'); ?></label>

                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="modelo" class="col-sm-2 col-form-label">Nombre Modelo</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo set_value('modelo',$vehiculo['modelo']); ?>" placeholder="Nombre Modelo">
                            <label id="modelo-error" class="error" for="modelo"><?php echo form_error('modelo'); ?></label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="modelo" class="col-sm-2 col-form-label">Año Modelo</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="anio" name="anio" value="<?php echo set_value('anio',$vehiculo['anio']); ?>" placeholder="200X">
                            <label id="anio-error" class="error" for="anio"><?php echo form_error('anio'); ?></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="modelo" class="col-sm-2 col-form-label">Tipo</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="tipo" name="tipo" >
                                <option value="">Seleccione un tipo de Vehículo</option>
                                <option value="auto" <?php echo (isset($vehiculo['tipo']) && $vehiculo['tipo']=='auto' )?'selected':''?>>Auto</option>
                                <option value="camioneta" <?php echo (isset($vehiculo['tipo']) && $vehiculo['tipo']=='camioneta' )?'selected':''?>>Camioneta</option>
                                <option value="otro" <?php echo (isset($vehiculo['tipo']) && $vehiculo['tipo']=='otro' )?'selected':''?>>Otro</option>
                            </select>
                            <label id="tipo-error" class="error" for="tipo"><?php echo form_error('tipo'); ?></label>
                            <!-- <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo set_value('tipo',$vehiculo['anio']); ?>" placeholder="200X"> -->
                        </div>
                    </div>





                    
                    <div class="form-group row invisible">
                        <div class="col-sm-2">Estado:</div>
                        <div class="col-sm-6">
                            <div class="customUi-switchToggle switchToggle-primary switchToggle-air">
                            <input type="checkbox" id="switch2">
                            <label for="switch2">
                                <span class="label-switchToggle"></span>
                                <span class="label-helper">Activo</span>
                            </label>
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2 float-left">
                            <a href="<?php echo base_url('/vehiculos')?>" class="btn btn-secondary btn-block">Volver</a>
                        </div>
                        <div class="col-sm-4 float-left"></div>
                        <div class="col-sm-2 text-right ">
                            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



