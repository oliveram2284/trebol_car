
<div class="page-subheader mb-30">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-7">
                <div class="list">
                    <div class="list-item pl-0">
                        <div class="list-thumb ml-0 mr-3 pr-3  b-r text-muted">
                            <i class="icon-Tag"></i>
                        </div>
                        <div class="list-body">
                            <div class="list-title fs-2x">
                                <h2>Formulario De Categorias</h2>
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
                        <li class="breadcrumb-item active">Categorias</li>
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
                        <label for="nombre" class="col-sm-2 col-form-label">Nombre Categoía</label>
                        <div class="col-sm-6">                           
                            <input type="text" class="form-control  <?php echo (form_error('nombre')!='')?'error':''?>" id="nombre" name="nombre" value="<?php echo set_value('nombre',$categoria['nombre']); ?>" placeholder="nombre">

                            <label id="nombre-error" class="error" for="nombre"><?php echo form_error('nombre'); ?></label>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="descripcion" class="col-sm-2 col-form-label">Descripcíon</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo set_value('descripcion',$categoria['descripcion']); ?>" placeholder="descripcion">
                            <label id="descripcion-error" class="error" for="descripcion"><?php echo form_error('descripcion'); ?></label>

                      </div>
                    </div>     
                    <div class="form-group row">
                        <div class="col-sm-2 float-left">
                            <a href="<?php echo base_url('/categorias')?>" class="btn btn-secondary btn-block">Volver</a>
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



