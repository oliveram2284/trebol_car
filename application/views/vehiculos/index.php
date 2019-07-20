
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
                                <h2>Listado de Flota</h2>
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
                        <li class="breadcrumb-item active">Vehículos</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="container-fluid">
        <a href="<?php echo base_url('vehiculos/add');?>" class="bt-add btn btn-dark float-lg-right mr-1 mb-2">
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
                    <th  class="text-center">Categoria</th>
                    <th  class="text-center">Dominio</th>
                    <th  class="text-center">Marca</th>
                    <th  class="text-center">Modelo</th>
                    <th  class="text-center">Tipo</th>
                    <th  class="text-center">Año</th>
                    <th  class="text-center">Fecha Agregado</th>
                    <th  class="text-center">Estado</th>
                    <th class="text-center">-</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($vehiculos as $key=>$vehiculo):?>
                        <tr>
                            <td class="text-center" ><?php echo $key+1?></td>
                            <td class="text-center" >
                                <?php foreach ($categorias as $key => $value) {
                                    if($vehiculo['categoria_id']==$value['id']){
                                        echo $value['nombre'];
                                    }
                                }?>
                            </td>
                            <td class="text-center" ><?php echo $vehiculo['dominio']?></td>
                            <td class="text-center" ><?php echo $vehiculo['marca']?></td>
                            <td class="text-center" ><?php echo $vehiculo['modelo']?></td>
                            <td class="text-center" ><?php echo $vehiculo['tipo']?></td>
                            <td class="text-center" ><?php echo $vehiculo['anio']?></td>
                            <td class="text-center" ><?php echo $vehiculo['fecha_alta']?></td>
                            <td class="text-center" ><?php echo ($vehiculo['estado']==1)?'Activo':'InACtivo'?></td>
                            <td>
                                <a href="<?php echo base_url('/vehiculos/edit/'.$vehiculo['id'])?>" class="btn  btn-icon-o btn-sm btn-success radius100 btn-icon-sm mr-2 mb-2"><i class="icon-Pencil"></i></a>
                                <a href="<?php echo base_url('/vehiculos/delete/'.$vehiculo['id'])?>" class="btn btn-icon-o btn-sm btn-danger radius100 btn-icon-sm mr-2 mb-2"><i class="icon-Can"></i></a>
                                <a href="<?php echo base_url('/vehiculos/ficha/'.$vehiculo['id'])?>" class="btn btn-icon-o btn-sm btn-info radius100 btn-icon-sm mr-2 mb-2"><i class="icon-File"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="10"></th>
                    </tr>
                </tfoot>
            </table>

    
        </div>
    </div>
</div>

<input type="hidden" value="<?php echo base_url();?>" id="url">

<div id="viewPayment" class="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Estado De Aporte Inicial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <div class="modal-body">
        <div id="adherente_detail">
        </div>
        <table id="cuotas_table" class="table table-bordered  table-sm mb-0" >
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>Nro Cuota</th>
                    <th>Importe Devolución</th>
                    <th>Importe Compensación</th>
                    <th>Importe Total Cuota</th>
                    <th>Fecha de Pago</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>

<div id="feedPayment" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pago de Cuota Aporte Inicial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <?php echo form_open($action,array('method'=>'post')); ?>
                <input type="hidden" id="aporte_id" name="aporte_id">
                <div class="form-group row">
                    <label for="adherent_nro" class="col-sm-3 col-form-label">Adherente</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control"  id="adherent_nro" placeholder="Nro" readonly>
                    </div>
                    <div class="col-sm-7">                        
                        <input type="text" class="form-control"  id="adherent_name" readonly  placeholder="Nombre y Apellido de Adherente">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="monto" class="col-sm-3 col-form-label">Cuota Nro</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="cuota_nro" placeholder="Cuota Nro" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="monto" class="col-sm-3 col-form-label">Monto Total</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="monto" placeholder="Monto Total" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="monto" class="col-sm-3 col-form-label">Monto Cancelado</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="monto_abonado" placeholder="Monto a Cancelar" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="monto" class="col-sm-3 col-form-label">Monto Restante</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="monto_restante" placeholder="Monto a Restante" readonly>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="monto" class="col-sm-3 col-form-label">Monto de Pago</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="monto_paga" name="monto"  placeholder="Monto de Pago" >
                        <label id="observation-error" class="error" for="observation">Debe Completar el campo "Monto  de Pago" antes de continuar</label>                    
                    </div>
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>






                