<h3>Vencimientos</h3>
<table class="table mb-0 table-bordered table-sm">
    <thead>        
        <tr class="table-active">       
            <th>Modificado</th>     
            <th>Tarjeta Verde Vencimiento</th>
            <th>Seguro Nombre</th>
            <th>Seguro Vecimiento </th>
            <th>Vencimiento RTO</th>
            <th>Vencimiento Matafuego </th>
            <th>Código De Radio</th>            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($historial as $key => $value):?>
            <tr>
                
                <td><?php echo date('d-m-Y H:i',strtotime($value['ficha']['creada']))?></td>
                <td><?php echo date('d-m-Y ',strtotime($value['ficha']['tarjeta_verde_venc'])) ?></td>
                <td><?php echo $value['ficha']['seguro']?></td>
                <td><?php echo date('d-m-Y ',strtotime($value['ficha']['seguro_venc'])) ?></td>
                <td><?php echo date('d-m-Y ',strtotime($value['ficha']['rto_venc'])) ?></td>
                <td><?php echo date('d-m-Y ',strtotime($value['ficha']['matafuego_venc']))?></td>
                <td><?php echo $value['ficha']['codigo_radio']?></td>                
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
<div class="row">
    <div class="col">
        <h3>Cambio de Aceites</h3>
        <table class="table mb-0 table-bordered table-sm">
            <thead>       
                <tr class="table-warning">       
                    <th>Fecha</th>
                    <th>Kilometraje</th>
                    <th>Se Cambio</th>
                    <th>Observacion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($historial as $key => $value):?>
                    <?php if($value['ficha']['cambio_aceite_fecha']!='' && $value['ficha']['cambio_aceite_fecha']!='0000-00-00'):?>
                    <tr>               
                        
                        <td><?php echo date('d-m-Y ',strtotime($value['ficha']['cambio_aceite_fecha'])) ?></td>
                        <td><?php echo $value['ficha']['cambio_aceite_km']?></td>
                        <td><?php echo ($value['ficha']['cambio_aceite_filtro']!='')? implode(', ',json_decode($value['ficha']['cambio_aceite_filtro'])):''?></td>
                        <td><?php echo $value['ficha']['cambio_aceite_observacion']?></td>
                    </tr>
                    <?php endif;?>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div class="col">
        <h3>Alineación/Balanceo</h3>
        <table class="table mb-0 table-bordered table-sm">
            <thead>
                <tr class="table-purple">                   
                    <th>Fecha</th>
                    <th>Kilometraje</th>
                    <th>Se Cambio</th>            
                    <th>Observacion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($historial as $key => $value):?>
                    <?php if($value['ficha']['aline_balance_fecha']!='' && $value['ficha']['aline_balance_fecha']!='0000-00-00'):?>
                        <tr>               
                            <td><?php echo date('d-m-Y ',strtotime($value['ficha']['aline_balance_fecha'])) ?></td>
                            <td><?php echo $value['ficha']['aline_balance_km']?></td>
                            <td><?php echo  ($value['ficha']['aline_balance_cambio']!='')?implode(', ',json_decode($value['ficha']['aline_balance_cambio'],true)):''?></td>
                            <td><?php echo $value['ficha']['aline_balance_observacion']?></td>
                        </tr>
                    <?php endif;?>
                   
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<div class="col">
<h3>Otros Arreglos</h3>
<table class="table table-bordered table-sm ">
    <thead>        
        <tr class="table-pink">   
            <th>Fecha</th>
            <th>Observacion</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($historial as $key => $value):?>
            <?php if($value['ficha']['otro_arreglo_fecha']!=''):?>
                <tr>
                    <td><?php echo date('d-m-Y ',strtotime($value['ficha']['otro_arreglo_fecha'])) ?></td>
                    <td><?php echo $value['ficha']['otro_arreglo_observacion']?></td>
                </tr>
            <?php endif?>
            
        <?php endforeach;?>
    </tbody>
</table>
</div>



