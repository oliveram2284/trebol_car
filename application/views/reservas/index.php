<?php
/*
$estados=array(
    0=>'<span class="badge badge-warning badge-text"><i class="icon-Car"></i> SIN AUTO</span>',
    1=>'<span class="badge badge-info badge-text"><i class="far fa-clock"></i> CONFIRMADA</span> ',
    2=>'<span class="badge badge-danger badge-text"><i class="fa fa-times mr-1"></i> ELIMINADA</span>',
    3=>'<span class="badge badge-success badge-text"><i class="far fa-check"></i>ACTIVA</span>',
    4=>'<span class="badge badge-pink badge-text"><i class="fa fa-stop"></i> FINALIZADA</span>',
    5=>'<span class="badge badge-danger badge-text"><i class="fa fa-times mr-1"></i> ANULADA</span>'
    
);*/
$estados=array(
    0=>'<span class="badge badge-info badge-text"><i class="far fa-clock"></i> CONFIRMADA</span> ',
    1=>'<span class="badge badge-success badge-text"><i class="far fa-check"></i>EN CURSO</span>',
);
?>
<style>
    .table td, .table th{
        padding:.50rem;
        font-size:13px;
    }
</style>
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
                                <h2>Listado de Reservas</h2>
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
                        <li class="breadcrumb-item active">Reservas</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="container-fluid">
        <a href="<?php echo base_url('reservas/add');?>" class="bt-add btn btn-dark float-lg-right mr-1 mb-2">
            <i class="icon-Add-File"></i>Agregar
        </a>        
        <div class="bg-white table-responsive rounded shadow-sm pt-3 pb-3 mb-30">
            <?php if($this->session->flashdata('msg')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
            
            <?php endif;?>
            <table id="data-table" class="table mb-0 table-striped cell-border compact stripe" cellspacing="0" width="100%">
                <thead>
                <tr>
                
                    <th  class="text-center">Categoría</th>
                    <th  class="text-center">Entrega </th>                    
                    <th  class="text-center">Entrega Lugar</th>                    
                    <th  class="text-left">Cliente</th>
                    <th  class="text-center">Devolución</th>
                    <th  class="text-center">Devolución Lugar</th>                    

                    <th  class="text-center">Dominio</th>
                    <th  class="text-right">Estado</th>
                    <th class="text-center">Acción</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($reservas as $key=>$reservas):?>
                        <tr>
                                                      
                            <td class="text-center" ><?php echo $reservas['categoria']?></td>   
                            <td class="text-center" ><?php echo date('d/m/Y',strtotime($reservas['entrega_fecha']))?>   <?php echo $reservas['entrega_hora']?></td>                            
                            <td class="text-center" ><?php echo $reservas['entrega_lugar']?></td>
                            <td class="text-left" ><?php echo $reservas['nombre']?></td>
                            <td class="text-center" ><?php echo date('d/m/Y',strtotime($reservas['devolucion_fecha']))?>   <?php echo $reservas['devolucion_hora']?></td>  
                            <td class="text-center" ><?php echo $reservas['devolucion_lugar']?></td>

                            <td class="text-center" ><?php echo $reservas['dominio']?></td>
                            <td class="text-right" ><?php  echo $estados[$reservas['curso']];?></td>
                            <td class="text-center">

                                <?php /*switch($reservas['estado']): 
                                    case 0: ?>

                                        <a href="<?php echo base_url('/reservas/setCar/'.$reservas['id'])?>" data-id="<?php echo $reservas['id']?>" class="setCar_bt btn  btn-icon-o btn-sm btn-warning radius100 btn-icon-sm mr-1 mb-1 " title="ASIGNAR AUTO" alt="ASIGNAR AUTO"><i class="icon-Car"></i></a>
                                        <a href="<?php echo base_url('/reservas/confirm/'.$reservas['id'])?>" class="confirm_bt btn  btn-icon-o btn-sm btn-success radius100 btn-icon-sm mr-1 mb-1 disabled" title="ACTIVAR" alt="ACTIVAR"><i class="fa fa-check"></i></a>
                                        <a href="<?php echo base_url('/reservas/stop/'.$reservas['id'])?>" class="end_bt  btn  btn-icon-o btn-sm btn-pink radius100 btn-icon-sm mr-1 mb-1 disabled" title="FINALIZAR" alt="FINALIZAR"><i class="fa fa-stop"></i></a>
                                
                                    <?php break; case 1: ?>

                                        <a href="<?php echo base_url('/reservas/setCar/'.$reservas['id'])?>" class="setCar_bt btn  btn-icon-o btn-sm btn-warning radius100 btn-icon-sm mr-1 mb-1 disabled " title="ASIGNAR AUTO" alt="ASIGNAR AUTO"><i class="icon-Car"></i></a>
                                        <a href="<?php echo base_url('/reservas/confirm/'.$reservas['id'])?>" class="confirm_bt btn  btn-icon-o btn-sm btn-success radius100 btn-icon-sm mr-1 mb-1 " title="ACTIVAR" alt="ACTIVAR"><i class="fa fa-check"></i></a>
                                        <a href="<?php echo base_url('/reservas/stop/'.$reservas['id'])?>" class="end_bt  btn  btn-icon-o btn-sm btn-pink radius100 btn-icon-sm mr-1 mb-1 disabled" title="FINALIZAR" alt="FINALIZAR"><i class="fa fa-stop"></i></a>

                                        
                                    <?php break; case 3:?>

                                        <a href="<?php echo base_url('/reservas/setCar/'.$reservas['id'])?>" class="setCar_bt btn  btn-icon-o btn-sm btn-warning radius100 btn-icon-sm mr-1 mb-1 disabled" title="ASIGNAR AUTO" alt="ASIGNAR AUTO"><i class="icon-Car"></i></a>
                                        <a href="<?php echo base_url('/reservas/confirm/'.$reservas['id'])?>" class="confirm_bt btn  btn-icon-o btn-sm btn-success radius100 btn-icon-sm mr-1 mb-1 disabled " title="ACTIVAR" alt="ACTIVAR"><i class="fa fa-check"></i></a>
                                        <a href="<?php echo base_url('/reservas/stop/'.$reservas['id'])?>" class="end_bt  btn  btn-icon-o btn-sm btn-pink radius100 btn-icon-sm mr-1 mb-1 " title="FINALIZAR" alt="FINALIZAR"><i class="fa fa-stop"></i></a>
                                
                                    <?php break; case 4:?>

                                        <a href="<?php echo base_url('/reservas/setCar/'.$reservas['id'])?>" class="setCar_bt btn  btn-icon-o btn-sm btn-warning radius100 btn-icon-sm mr-1 mb-1 disabled" title="ASIGNAR AUTO" alt="ASIGNAR AUTO"><i class="icon-Car"></i></a>
                                        <a href="<?php echo base_url('/reservas/confirm/'.$reservas['id'])?>" class="confirm_bt btn  btn-icon-o btn-sm btn-success radius100 btn-icon-sm mr-1 mb-1 disabled " title="ACTIVAR" alt="ACTIVAR"><i class="fa fa-check"></i></a>
                                        <a href="<?php echo base_url('/reservas/stop/'.$reservas['id'])?>" class="end_bt  btn  btn-icon-o btn-sm btn-pink radius100 btn-icon-sm mr-1 mb-1 disabled " title="FINALIZAR" alt="FINALIZAR"><i class="fa fa-stop"></i></a>
                                

                                    <?php break; case 5:?>

                                        <a href="<?php echo base_url('/reservas/setCar/'.$reservas['id'])?>" class="setCar_bt btn  btn-icon-o btn-sm btn-warning radius100 btn-icon-sm mr-1 mb-1 disabled" title="ASIGNAR AUTO" alt="ASIGNAR AUTO"><i class="icon-Car"></i></a>
                                        <a href="<?php echo base_url('/reservas/confirm/'.$reservas['id'])?>" class="confirm_bt btn  btn-icon-o btn-sm btn-success radius100 btn-icon-sm mr-1 mb-1 disabled " title="ACTIVAR" alt="ACTIVAR"><i class="fa fa-check"></i></a>
                                        <a href="<?php echo base_url('/reservas/stop/'.$reservas['id'])?>" class="end_bt  btn  btn-icon-o btn-sm btn-pink radius100 btn-icon-sm mr-1 mb-1 disabled " title="FINALIZAR" alt="FINALIZAR"><i class="fa fa-stop"></i></a>


                                    <?php break; default:?>

                                        <a href="<?php echo base_url('/reservas/setCar/'.$reservas['id'])?>" class="setCar_bt btn  btn-icon-o btn-sm btn-warning radius100 btn-icon-sm mr-1 mb-1 disabled" title="ASIGNAR AUTO" alt="ASIGNAR AUTO"><i class="icon-Car"></i></a>
                                        <a href="<?php echo base_url('/reservas/confirm/'.$reservas['id'])?>" class="confirm_bt btn  btn-icon-o btn-sm btn-success radius100 btn-icon-sm mr-1 mb-1 disabled " title="ACTIVAR" alt="ACTIVAR"><i class="fa fa-check"></i></a>
                                        <a href="<?php echo base_url('/reservas/stop/'.$reservas['id'])?>" class="end_bt btn  btn-icon-o btn-sm btn-pink radius100 btn-icon-sm mr-1 mb-1 disabled " title="FINALIZAR" alt="FINALIZAR"><i class="fa fa-stop"></i></a>
                                
                                    <?php break; ?>
                                <?php endswitch; */?>    
                               
                                <a href="<?php echo base_url('/reservas/edit/'.$reservas['id'])?>" class="btn  btn-icon-o btn-sm btn-success radius100 btn-icon-sm mr-1 mb-1" title="EDITAR" alt="EDITAR" ><i class="icon-Pencil"></i></a>
                                <a href="<?php echo base_url('/reservas/delete/'.$reservas['id'])?>" class="btn btn-icon-o btn-sm btn-danger radius100 btn-icon-sm mr-1 mb-1"  title="ANULAR" alt="ANULAR"><i class="icon-Can"></i></a>
                                
                                <!-- <a href="<?php echo base_url('/reservas/view/'.$reservas['id'])?>" class="btn  btn-icon-o btn-sm btn-outline-primary radius100 btn-icon-sm mr-1 mb-1" title="EDITAR" alt="EDITAR" ><i class="icon-Eye" style="color:#000;"></i></a>
                                
                                <a href="<?php echo base_url('/reservas/edit/'.$reservas['id'])?>" class="btn  btn-icon-o btn-sm btn-success radius100 btn-icon-sm mr-1 mb-1" title="EDITAR" alt="EDITAR" ><i class="icon-Pencil"></i></a>
                                <a href="<?php echo base_url('/reservas/delete/'.$reservas['id'])?>" class="btn btn-icon-o btn-sm btn-danger radius100 btn-icon-sm mr-1 mb-1"  title="ANULAR" alt="ANULAR"><i class="icon-Can"></i></a> -->
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

    
        </div>
    </div>
</div>

<input type="hidden" value="<?php echo base_url();?>" id="url">


<!-- Modal -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Reserva</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="edit_bt" class="btn btn-success">Editar</button>
        <button type="button" id="save_modal_bt" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
  </div>
</div>

