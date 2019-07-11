
<div class="page-subheader mb-30">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-7">
                <div class="list">
                    <div class="list-item pl-0">
                        <div class="list-thumb ml-0 mr-3 pr-3  b-r text-muted">
                            <i class="icon-User"></i>
                        </div>
                        <div class="list-body">
                            <div class="list-title fs-2x">
                                <h2>Usuarios</h2>
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
                        <li class="breadcrumb-item active">Usuarios</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="container-fluid">
        <a href="<?php echo base_url('user/add');?>" class="bt-add btn btn-info float-lg-right mr-1 mb-2 pull-right">
            <i class="icon-Add-User"></i>Agregar
        </a>
        <a href="<?php echo base_url('user/grupos');?>" class="bt-add btn btn-success float-lg-right mr-1 mb-2">
            <i class="icon-Users"></i>grupos
        </a>
        <div class="bg-white table-responsive rounded shadow-sm pt-3 pb-3 mb-30">
            <?php if($this->session->flashdata('msg')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>            
            <?php endif;?>
            <table id="data-table" class="table mb-0 table-striped" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Estado</th>
                    <th class="center">-</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
    
        </div>
    </div>
</div>

<input type="hidden" value="<?php echo base_url();?>" id="url">



                