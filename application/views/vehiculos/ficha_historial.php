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
                <?php foreach ($historial['log_aceite'] as $key => $value):?>
                    <tr>         
                        
                        <td><?php echo date('d-m-Y ',strtotime($value['fecha'])) ?></td>
                        <td><?php echo $value['km']?></td>
                        <td><?php echo $value['recambio']?></td>
                        <td><?php echo $value['observacion']?></td>
                    </tr>
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
                <?php foreach ($historial['log_alineacion'] as $key => $value):?>
                    <tr>         
                            
                        <td><?php echo date('d-m-Y ',strtotime($value['fecha'])) ?></td>
                        <td><?php echo $value['km']?></td>
                        <td><?php echo $value['recambio']?></td>
                        <td><?php echo $value['observacion']?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<div class="row"> 
<div class="col">
<h3>Niveles De Agua</h3>
<table class="table table-bordered table-sm ">
    <thead>        
        <tr class="table-pink">   
            <th>Fecha</th>
            <th>Observacion</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($historial['log_agua'] as $key => $value):?>
                <tr>
                    <td><?php echo date('d-m-Y ',strtotime($value['fecha'])) ?></td>
                    <td><?php echo $value['observacion']?></td>
                </tr>            
        <?php endforeach;?>
    </tbody>
</table>
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
        <?php foreach ($historial['log_otros'] as $key => $value):?>
                <tr>
                    <td><?php echo date('d-m-Y ',strtotime($value['fecha'])) ?></td>
                    <td><?php echo $value['observacion']?></td>
                </tr>            
        <?php endforeach;?>
    </tbody>
</table>
</div>

</div>



