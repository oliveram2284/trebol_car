
<table class="table table-sm table-bordered table-strip mb-0">
    <thead>
        <tr>
            <th class="text-center">Categoría</th>
            <th class="text-center">Reservas</th>
            <th class="text-center">Vehículo Disponible</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($result as $row):?>
            <?php 
                $class="";
                //table-danger
                if( (int)$row['reservas'] < $row['vehiculos']){
                    $class="table-success";
                }elseif( (int)$row['reservas'] >= $row['vehiculos']) {
                    $class="table-danger";
                }
            ?>
            <tr class="<?php echo $class?>">
                <td class="text-center" ><?php echo $row['nombre']?></td>
                <td class="text-center"><?php echo $row['reservas']?></td>
                <td class="text-center"><?php 
                    $total=((int)$row['vehiculos']-(int)$row['reservas']);
                echo ($total>0)?$total:0; ?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

<h3>Proximo Disponible</h3>
<table class="table table-sm table-bordered table-strip mb-0">
    <thead>
        <tr>
            <th class="text-center">Categoría</th>
            <th class="text-center">Disponible Despues de:</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($proximo_disponible as $row):?>            
            <tr class="<?php echo $class?>">
                <td class="text-center" ><?php echo $row['nombre']?></td>
                <td class="text-center"><?php echo date('d-m-Y H:i',strtotime($row['fecha']))?></td>
        <?php endforeach;?>
    </tbody>
</table>
<a href="<?php echo base_url('/reservas/add');?>" class="btn  btn-square btn-primary mt-20 btn-block mb-2">Crear Reserva</a>