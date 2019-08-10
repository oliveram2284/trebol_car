
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
                if( (int)$row['reservas'] < $row['total']){
                    $class="table-success";
                }elseif( (int)$row['reservas'] >= $row['total']) {
                    $class="table-danger";
                }
            ?>
            <tr class="<?php echo $class?>">
                <td class="text-center" ><?php echo $row['categoria']?></td>
                <td class="text-center"><?php echo $row['reservas']?></td>
                <td class="text-center"><?php echo ((int)$row['total']-(int)$row['reservas'])?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
<a href="<?php echo base_url('/reservas');?>" class="btn  btn-square btn-primary mt-20 btn-block mb-2">Crear Reserva</a>