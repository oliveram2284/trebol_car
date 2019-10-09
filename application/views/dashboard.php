    <div class="page-subheader mb-10">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="list">
                        <div class="list-item pl-0">
                            <div class="list-thumb ml-0 mr-3 pr-3  b-r text-muted">
                                <i class="icon-Folder-Pictures"></i>
                            </div>
                            <div class="list-body">
                                <div class="list-title fs-2x">
                                    <h2>Inicio</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-5 d-flex justify-content-end h-md-down">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb no-padding bg-trans mb-30">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('/')?>"><i class="icon-Home mr-2 fs14"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('/')?>">Inicio</a></li>
                            <li class="breadcrumb-item active">Inicio</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row align-items-center mb-30 pt-30">
                <div class="col-md-12 mr-auto ml-auto">
                    <div class="mb-0">
                        <a href="#" class="float-right btn btn-sm btn-info btn-icon invisible"><i class="fa fa-cog mr-2"></i>View Settings</a>
                        <h4>Bienvenido   <?php echo $this->session->userdata('firstname')." ".$this->session->userdata('lastname')?></h4>
                    </div>
                </div>
            </div>    
            <!-- 
            <div class="portlet-box portlet-gutter  mb-40">
               
                <div class="portlet-body">
                 
                    <h3>Reservas</h3> 

                    <div class="row ">
                
                        <div class="col-lg-3 mb-3 col-md-4 col-sm-6 col-xs-12 mb-20">                            
                            <div class="list bg-success  shadow-sm rounded overflow-hidden">
                                <div class="list-item">
                                    <div class="list-thumb bg-success-active text-success-light avatar rounded-circle avatar60 shadow-sm">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                    <div class="list-body text-right" href="#">
                                        <span class="list-title fs-2x  lineH-1"><?php echo $reservas_confirmadas?> </span>
                                        <span class="list-content text-success-light fs14">Confirmadas</span>
                                    </div>
                                </div>
                                <a href="<?php echo base_url('reservas')?>" class="d-flex text-muted flex text-right flex-row align-items-center justify-content-end pt-5 pb-5 pl-4 pr-4 bg-success-active">
                                    Ver Todos<i class="fa fa-chevron-right ml-2 fs12 mt-1"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-3 col-md-4 col-sm-6 col-xs-12 mb-20">
                            <div class="list bg-warning shadow-sm rounded overflow-hidden">
                                <div class="list-item">
                                    <div class="list-thumb bg-warning-active text-warning-light avatar rounded-circle avatar60 shadow-sm">
                                    <i class="far fa-clock"></i>
                                    </div>
                                    <div class="list-body text-right">
                                        <span class="list-title fs-2x lineH-1"><?php echo $reservas_pendientes?></span>
                                        <span class="list-content text-warning-light fs14">Pendientes</span>

                                    </div>
                                </div>
                                <a href="<?php echo base_url('aporte')?>" class="d-flex text-muted flex text-right flex-row align-items-center justify-content-end pt-5 pb-5 pl-4 pr-4 bg-warning-active">
                                    
                                    Ver Todos<i class="fa fa-chevron-right ml-2 fs12 mt-1"></i>
                                </a>
                            </div>
                        </div
                        <div class="col-lg-3 mb-3 col-md-4 col-sm-6 col-xs-12 mb-20">
                            <div class="list bg-primary shadow-sm rounded overflow-hidden">
                                <div class="list-item">
                                    <div class="list-thumb bg-primary-active text-primary-light avatar rounded-circle avatar60 shadow-sm">
                                        <i class="far fa-calendar-times"></i>
                                    </div>
                                    <div class="list-body text-right">
                                        <span class="list-title fs-2x  lineH-1"><?php echo $reservas_canceladas?></span>
                                        <span class="list-content text-primary-light fs14">Canceladas</span>

                                    </div>
                                </div>
                                <a href="<?php echo base_url('asistencia')?>" class="d-flex text-muted flex text-right flex-row align-items-center justify-content-end pt-5 pb-5 pl-4 pr-4 bg-primary-active">
                                    Ver Más <i class="fa fa-chevron-right ml-2 fs12 mt-1"></i>
                                </a>
                            </div>
                        </div>
                    
                        <div class="col-lg-3 mb-3 col-md-4 col-sm-6 col-xs-12 mb-20">
                            <div class="list bg-primary shadow-sm rounded overflow-hidden">
                                <div class="list-item">
                                    <div class="list-thumb bg-primary-active text-primary-light avatar rounded-circle avatar60 shadow-sm">
                                        <i class="fas fa-calculator"></i>
                                    </div>
                                    <div class="list-body text-right">
                                        <span class="list-title fs-2x  lineH-1">Totales</span>
                                        <span class="list-content text-primary-light fs14">Historico</span>

                                    </div>
                                </div>
                                <a href="<?php echo base_url('asistencia')?>" class="d-flex text-muted flex text-right flex-row align-items-center justify-content-end pt-5 pb-5 pl-4 pr-4 bg-primary-active">
                                    Ver Más <i class="fa fa-chevron-right ml-2 fs12 mt-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                      
                </div>
            </div>                      
         
             -->
            <div class="row ">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <div class="portlet-box portlet-gutter  mb-40 p-3   rounded">
                        <div class="portlet-header flex-row flex full-height d-flex align-items-center b-b">
                            <div class="flex d-flex flex-column">
                                <h3> <i class="icon-Calendar"></i> Consultar Disponibilidad</h3> 
                            </div>                                        
                        </div>
                        <div class="portlet-body" style="min-height: 250px;">  
                            <div class="filter">
                                <div class="form-group">
                                    <label>Fecha</label>
                                    <input type="text" class="form-control mb-10" id="filter_date" name="fecha">
                                </div>

                                <div class="form-group">
                                    <label>Categorias</label>
                                    <select class="form-control mb-20" id="filter_categoria" name="filter_categoria">
                                        <option value="">Seleccione una Categoria</option>
                                        <?php foreach($categorias as $categoria):?>                                    
                                            <option value="<?php echo $categoria['id']?>" <?php echo (isset($reserva['categoria_id']) && $reserva['categoria_id']==$categoria['id'] )?'selected':''?> ><?php echo $categoria['nombre']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>       
                                <div class="form-group float-lg-right ">                                 
                                    <button id="filter_bt" class="btn btn-primary mr-1  "> Consultar</button>
                                    <br>
                                    <br>
                                </div>
                            </div>
                            
                            <div class="filter_result mt-10 ">
                                
                            </div>  
                        </div>
                    </div><!--portlet-->
                </div>

                <div class="col-lg-8 col-sm-12 col-xs-12">
                    <div class="portlet-box portlet-gutter  mb-30 p-3   rounded">
                        <div class="portlet-header flex-row flex full-height d-flex align-items-center b-b">
                            <div class="flex d-flex flex-column">
                                <h3> <i class="icon-Affiliate"></i> Ver Reservas</h3> 
                            </div>
                            
                        </div>
                        <div class="portlet-body">
                        <div id="calendar" style="min-height:250px;"></div>     
                            
                        </div>
                    </div><!--portlet-->
                </div>
            </div>
        </div>
    </div>

    
<input type="hidden" value="<?php echo base_url();?>" id="url">
    
