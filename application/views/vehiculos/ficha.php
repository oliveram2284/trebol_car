
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
    <div class="container">
   

        <div class="portlet-box portlet-gutter ui-buttons-col mb-30">
            <div class="portlet-header flex-row flex d-flex align-items-center b-b invisible">
                <div class="flex d-flex flex-column">
                    <h3>Formulario de Usuario</h3> 
                    <span class="portlet-subtitle">Complete todos los campos antes de guardar.</span>
                </div>
            </div>
            <div class="portlet-body ml-20 pl-20">
                <div class="row">
                    <div class="col-sm-12">
                    <?php echo form_open($action,array('method'=>'post','class'=>'pl-30')); ?>   
                        <input type="hidden" name="vehiculo_id" value="<?php echo $vehiculo_id?>">                
                        <input type="hidden" name="id" value="<?php echo (isset($ficha['id']))?$ficha['id']:''?>">                
                    <fieldset>
                        <legend>Datos Vehículo</legend>
                        <div class="form-group row">
                        <label for="dominio" class="col-sm-2 col-form-label">Dominio</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control  <?php echo (form_error('dominio')!='')?'error':''?>" id="dominio" value="<?php echo set_value('dominio',$vehiculo['dominio']); ?>" placeholder="Dominio" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="marca" class="col-sm-2 col-form-label">Tarjeta Verde Vencimiento</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="marca" name="tarjeta_verde_venc" value="<?php echo set_value('tarjeta_verde_venc',$ficha['tarjeta_verde_venc']); ?>" placeholder="Marca">
                            <label id="marca-error" class="error" for="marca"><?php echo form_error('marca'); ?></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="seguro" class="col-sm-2 col-form-label">Nombre Seguro y Vecimiento</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="seguro" name="seguro" value="<?php echo set_value('seguro',$ficha['seguro']); ?>" placeholder="Nombre Seguro">
                            <label id="seguro-error" class="error" for="seguro"><?php echo form_error('seguro'); ?></label>
                        </div>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" id="seguro_venc" name="seguro_venc" value="<?php echo set_value('seguro_venc',$ficha['seguro_venc']); ?>" placeholder="Vencimiento">
                            <label id="seguro_venc-error" class="error" for="seguro_venc"><?php echo form_error('seguro_venc'); ?></label>
                        </div>
                    </div>
                    </fieldset>

                    
                    <fieldset>
                        <legend>Cambio De Aceite</legend>
                        <div class="form-group row">
                            <label for="cambio_aceite_fecha" class="col-sm-2 col-form-label">Fecha</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control text-right" id="cambio_aceite_fecha" name="cambio_aceite_fecha" value="<?php echo set_value('cambio_aceite_fecha',$ficha['cambio_aceite_fecha']); ?>" placeholder="">
                                <label id="cambio_aceite_fecha-error" class="error" for="cambio_aceite_fecha"><?php echo form_error('cambio_aceite_fecha'); ?></label>
                            </div>

                            <label for="modelo" class="col-sm-1 col-form-label text-right">Km</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="cambio_aceite_km" name="cambio_aceite_km" value="<?php echo set_value('cambio_aceite_km',$ficha['cambio_aceite_km']); ?>" placeholder="">
                                <label id="cambio_aceite_km-error" class="error" for="cambio_aceite_km"><?php echo form_error('cambio_aceite_km'); ?></label>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="modelo" class="col-sm-2 col-form-label">Se Cambiaron:</label>
                            <div class="col-sm-2 ">
                                <div class="customUi-checkbox check-todo checkboxUi-primary">

                                    <input type="checkbox" id="cambio_filtro_aceite" name="cambio_aceite_filtro[]" value="aceite" <?php echo (in_array('aceite',$ficha['cambio_aceite_filtro']))?'checked':'';?>  >
                                    <label for="cambio_filtro_aceite" class="mb-0">
                                        <span class="label-checkbox"></span>
                                        <span class="label-helper">Filtro Aceite</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="customUi-checkbox check-todo checkboxUi-primary">
                                    <input type="checkbox" id="cambio_filtro_aire" name="cambio_aceite_filtro[]" value="aire" <?php echo (in_array('aire',$ficha['cambio_aceite_filtro']))?'checked':'';?>>
                                    <label for="cambio_filtro_aire" class="mb-0">
                                        <span class="label-checkbox"></span>  
                                        <span class="label-helper">Filtro Aire</span>                                      
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="customUi-checkbox check-todo checkboxUi-primary">
                                    <input type="checkbox" id="cambio_filtro_combustible"  name="cambio_aceite_filtro[]" value="combustible" <?php echo (in_array('combustible',$ficha['cambio_aceite_filtro']))?'checked':'';?>>
                                    <label for="cambio_filtro_combustible" class="mb-0">
                                        <span class="label-checkbox"></span> 
                                        <span class="label-helper">Filtro Combustible</span>                                           
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="modelo" class="col-sm-2 col-form-label">Observacíon</label>
                            <div class="col-sm-6">
                                <textarea id="cambio_aceite_observacion" class="form-control" name="cambio_aceite_observacion"><?php echo set_value('cambio_aceite_observacion',$ficha['cambio_aceite_observacion']); ?> </textarea>
                                <label id="anio-error" class="error" for="anio"><?php echo form_error('anio'); ?></label>
                            </div>
                        </div>
                        
                    </fieldset>
                    
                    <fieldset>
                        <legend>Alineacíon y Balanceo</legend>
                        <div class="form-group row">
                            <label for="aline_balance_fecha" class="col-sm-2 col-form-label">Fecha</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control text-right" id="aline_balance_fecha" name="aline_balance_fecha" value="<?php echo set_value('aline_balance_fecha',$ficha['aline_balance_fecha']); ?>" placeholder="">
                                <label id="aline_balance_fecha-error" class="error" for="aline_balance_fecha"><?php echo form_error('anio'); ?></label>
                            </div>

                            <label for="aline_balance_km" class="col-sm-1 col-form-label text-right">Km</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="aline_balance_km" name="aline_balance_km" value="<?php echo set_value('aline_balance_km',$ficha['aline_balance_km']); ?>" placeholder="">
                                <label id="aline_balance_km-error" class="error" for="aline_balance_km"><?php echo form_error('aline_balance_km'); ?></label>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="modelo" class="col-sm-2 col-form-label">Se Realizó:</label>
                            <div class="col-sm-2 ">
                                <div class="customUi-checkbox check-todo checkboxUi-primary">
                                    
                                    <input type="checkbox" id="aline_balance_alineacion" name="aline_balance_cambio[]" value="alineacion"  <?php echo (in_array('alineacion',$ficha['aline_balance_cambio']))?'checked':'';?> >
                                    <label for="aline_balance_alineacion" class="mb-0">
                                        <span class="label-checkbox"></span>
                                        <span class="label-helper">Alineacíon</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="customUi-checkbox check-todo checkboxUi-primary">
                                    <input type="checkbox" id="aline_balance_balance" name="aline_balance_cambio[]" value="balance" <?php echo (in_array('balance',$ficha['aline_balance_cambio']))?'checked':'';?> >
                                    <label for="aline_balance_balance" class="mb-0">
                                        <span class="label-checkbox"></span>  
                                        <span class="label-helper">Balanceo</span>                                      
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="customUi-checkbox check-todo checkboxUi-primary">
                                    <input type="checkbox" id="aline_balance_rotacion" name="aline_balance_cambio[]" value="rotacion" <?php echo (in_array('rotacion',$ficha['aline_balance_cambio']))?'checked':'';?> >
                                    <label for="aline_balance_rotacion" class="mb-0">
                                        <span class="label-checkbox"></span> 
                                        <span class="label-helper">Rotacíon</span>                                           
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="aline_balance_observacion" class="col-sm-2 col-form-label">Observacíon</label>
                            <div class="col-sm-6">
                                <textarea name="aline_balance_observacion" id="aline_balance_observacion" class="form-control"><?php echo set_value('aline_balance_observacion',$ficha['aline_balance_observacion']); ?></textarea>
                                <label id="aline_balance_observacion-error" class="error" for="aline_balance_observacion"><?php echo form_error('aline_balance_observacion'); ?></label>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Niveles De Agua</legend>

                        <div class="form-group row">
                            <label for="nivel_agua_fecha" class="col-sm-2 col-form-label">Fecha</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control text-right" id="nivel_agua_fecha" name="nivel_agua_fecha" value="<?php echo set_value('nivel_agua_fecha',$ficha['nivel_agua_fecha']); ?>" placeholder="">
                                <label id="nivel_agua_fecha-error" class="error" for="nivel_agua_fecha"><?php echo form_error('nivel_agua_fecha'); ?></label>
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label for="nivel_agua_observacion" class="col-sm-2 col-form-label">Observacíon</label>
                            <div class="col-sm-6">
                                <textarea name="nivel_agua_observacion" id="nivel_agua_observacion" class="form-control"><?php echo set_value('nivel_agua_observacion',$ficha['nivel_agua_observacion']); ?></textarea>
                                <label id="nivel_agua_observacion-error" class="error" for="nivel_agua_observacion"><?php echo form_error('nivel_agua_observacion'); ?></label>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Otros Arreglos</legend>
                        <div class="form-group row">
                            <label for="modelo" class="col-sm-2 col-form-label">Agregar Item</label>
                            <div class="col-sm-3">
                                <input type="input" class="form-control text-right" id="inputItem" value="" placeholder="">
                                <label id="anio-error" class="error" for="anio"><?php echo form_error('anio'); ?></label>
                            </div>
                            <div class="col-sm-2">
                                <button id="addItem_bt"type="button" class="btn  btn-primary btn-block"><i class="fas fa-plus"></i>Agregar</button>
                            </div>
                        </div>    
                        <div id="otros_arreglos_inputs">
                            <?php foreach($ficha['otros'] as $key=>$input):?>
                                <div class="form-group row">
                                    <label for="<?php echo $key?>" class="col-sm-2 col-form-label"><?php echo ucwords($key)?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control text-right" id="<?php echo $key?>_observacion" name="otro_item[<?php echo $key?>][observacion]" placeholder="<?php echo $key?>" value="<?php echo $input['observacion']?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control text-right" id="<?php echo $key?>_fecha" name="otro_item[<?php echo $key?>][fecha]" placeholder="<?php echo $key?>" value="<?php echo $input['fecha']?>">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>   
                    </fieldset>
                    
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
    </div>
</div>

<script>

</script>



