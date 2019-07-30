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
        <div class="bg-white table-responsive rounded shadow-sm pt-3 ">
            <?php if($this->session->flashdata('msg')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
            
            <?php endif;?>
            <table id="data-table" class="table mb-0 table-striped cell-border compact stripe" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th  class="text-center" >#</th>
                    <th  class="text-center">Fecha Entrega</th>
                    <th  class="text-center">Hora Entrega</th>
                    <th  class="text-center">Fecha Devolución</th>
                    <th  class="text-center">Hora Devolución</th>
                    <th  class="text-center">Categoría</th>
                    <th  class="text-center">Vehículo</th>
                    <th  class="text-center">Cliente</th>
                    <th  class="text-center">Estado</th>
                    <th class="text-center">-</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($reservas as $key=>$reservas):?>
                        <tr>
                            <td class="text-center" ><?php echo $key+1?></td>
                            <td class="text-center" ><?php echo $reservas['entrega_fecha']?></td>
                            <td class="text-center" ><?php echo $reservas['entrega_hora']?></td>
                            
                            <td class="text-center" ><?php echo $reservas['devolucion_fecha']?></td>
                            <td class="text-center" ><?php echo $reservas['devolucion_hora']?></td>
                            
                            <td class="text-center" ><?php echo $reservas['categoria']?></td>
                            <td class="text-center" ><?php echo $reservas['dominio']." ".$reservas['marca']." ".$reservas['modelo']?></td>
                            <td class="text-center" ><?php echo $reservas['nombre']?></td>
                            <td class="text-center" ><?php echo ($reservas['estado']==1)?'Habilitada':'Deshabilitado'?></td>
                            <td>
                                <a href="<?php echo base_url('/reservas/edit/'.$reservas['id'])?>" class="btn  btn-icon-o btn-sm btn-success radius100 btn-icon-sm mr-2 mb-2"><i class="icon-Pencil"></i></a>
                                <a href="<?php echo base_url('/reservas/delete/'.$reservas['id'])?>" class="btn btn-icon-o btn-sm btn-danger radius100 btn-icon-sm mr-2 mb-2"><i class="icon-Can"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

    
        </div>
    </div>
</div>

<input type="hidden" value="<?php echo base_url();?>" id="url">

