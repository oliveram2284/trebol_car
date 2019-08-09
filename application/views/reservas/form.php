
<div class="page-subheader mb-30">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-7">
                <div class="list">
                    <div class="list-item pl-0">
                        <div class="list-thumb ml-0 mr-3 pr-3  b-r text-muted">
                            <i class="icon-Book"></i>
                        </div>
                        <div class="list-body">
                            <div class="list-title fs-2x">
                                <h2>Formulario De Reserva</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-5 d-flex justify-content-end h-md-down">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb no-padding bg-trans mb-30">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('/')?>"><i class="icon-Home mr-2 fs14"></i></a></li>
                        <li class="breadcrumb-item">Inicio</li>
                        <li class="breadcrumb-item active">Reservas</li>
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
                        <div class="col-sm-3">                           
                            <select name="categoria_id" id="categoria_id" class="form-control">
                                <option value="">Seleccione una Categoria</option>
                                <?php foreach($categorias as $categoria):?>                                    
                                    <option value="<?php echo $categoria['id']?>" <?php echo (isset($reserva['categoria_id']) && $reserva['categoria_id']==$categoria['id'] )?'selected':''?> ><?php echo $categoria['nombre']?></option>
                                <?php endforeach;?>
                            </select>
                            <label id="categoria_id-error" class="error" for="categoria_id"><?php echo form_error('categoria_id'); ?></label>
                        </div>

                        <label for="vehiculo_id" class="col-sm-1 col-form-label invisible">Vehículo</label>
                        <div class="col-sm-2 invisible">                           
                            <input type="hidden" id="edit_reserva_id" value="<?php echo (isset($reserva['vehiculo_id']))?$reserva['vehiculo_id']:'-1'?>">
                            <select name="vehiculo_id" id="vehiculo_id" class="form-control">
                                <option value="">Seleccione una Vehiculo</option>
                                
                            </select>
                            <label id="vehiculo_id-error" class="error" for="vehiculo_id"><?php echo form_error('vehiculo_id'); ?></label>
                        </div>     
                        
                    </div>

                    <div class="form-group row">
                        <label for="entrega_fecha" class="col-sm-2 col-form-label">Fecha de Entrega</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" id="entrega_fecha" name="entrega_fecha" value="<?php echo set_value('entrega_fecha',$reserva['entrega_fecha']); ?>" placeholder="Fecha de Entrega">
                            <label id="marca-error" class="error" for="entrega_fecha"><?php echo form_error('entrega_fecha'); ?></label>
                        </div>
                        <label for="entrega_hora" class="col-sm-2 col-form-label text-right">Hora de Entrega</label>
                        <div class="col-sm-2">
                            <input type="time" class="form-control" id="entrega_fecha" name="entrega_hora" value="<?php echo set_value('entrega_hora',$reserva['entrega_hora']); ?>" placeholder="Fecha de Entrega">
                            <label id="marca-error" class="error" for="entrega_hora"><?php echo form_error('entrega_hora'); ?></label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dominio" class="col-sm-2 col-form-label">Lugar De Entrega</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control"  id="entrega_lugar" name="entrega_lugar" value="<?php echo set_value('entrega_lugar',$reserva['entrega_lugar']); ?>" placeholder="Lugar de Entrega">
                            <label id="entrega_lugar-error" class="error" for="entrega_lugar"><?php echo form_error('entrega_lugar'); ?></label>
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="entrega_fecha" class="col-sm-2 col-form-label">Fecha de Devolución</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" id="devolucion_fecha" name="devolucion_fecha" value="<?php echo set_value('devolucion_fecha',$reserva['devolucion_fecha']); ?>" placeholder="Fecha de Entrega">
                            <label id="devolucion_fecha-error" class="error" for="devolucion_fecha"><?php echo form_error('devolucion_fecha'); ?></label>
                        </div>
                        <label for="devolucion_hora" class="col-sm-2 col-form-label text-right">Hora de Devolución</label>
                        <div class="col-sm-2">
                            <input type="time" class="form-control" id="devolucion_hora" name="devolucion_hora" value="<?php echo set_value('devolucion_hora',$reserva['devolucion_hora']); ?>" placeholder="Fecha de Entrega">
                            <label id="devolucion_hora-error" class="error" for="devolucion_hora"><?php echo form_error('devolucion_hora'); ?></label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dominio" class="col-sm-2 col-form-label">Lugar De Devolución</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control"  id="devolucion_lugar" name="devolucion_lugar" value="<?php echo set_value('devolucion_lugar',$reserva['devolucion_lugar']); ?>" placeholder="Lugar de Devolución">
                            <label id="devolucion_lugar-error" class="error" for="devolucion_lugar"><?php echo form_error('devolucion_lugar'); ?></label>
                            
                        </div>
                    </div>


                    
                    <div class="form-group row">
                        <label for="nombre" class="col-sm-2 col-form-label">Nombre y Apellido</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control  <?php echo (form_error('nombre')!='')?'error':''?>" id="nombre" name="nombre" value="<?php echo set_value('nombre',$reserva['nombre']); ?>" placeholder="Nombre y Apellido">
                            <label id="nombre-error" class="error" for="nombre"><?php echo form_error('nombre'); ?></label>
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="adelanto" class="col-sm-2 col-form-label">Seña</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="adelanto" name="adelanto" value="<?php echo set_value('adelanto',$reserva['adelanto']); ?>" placeholder="adelanto">
                            <label id="adelanto-error" class="error" for="adelanto"><?php echo form_error('adelanto'); ?></label>

                      </div>
                    </div>

                    <div class="form-group row">
                        <label for="observacion" class="col-sm-2 col-form-label">Observación</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="observacion" name="observacion" value="<?php echo set_value('observacion',$reserva['observacion']); ?>" placeholder="Observación">
                            <label id="observacion-error" class="error" for="observacion"><?php echo form_error('observacion'); ?></label>

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

<input type="hidden" value="<?php echo base_url();?>" id="url">


