<div class="row">
    <input type="hidden"  id="action" name="action" value="setCar">
    <div class="col-md-12">
        <form action="" method="post">
            <div class="form-group ">
                <label for="recipient-name" class="col-form-label">Categoría:</label>
                <input type="text" class="form-control" id="category_id" placeholder="" value="<?php echo $category['nombre']?>" readonly>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Vehículo:</label>
                <select class="form-control" id="exampleFormControlSelect1" name="vehiculo_id">
                    <option value="0">Seleccionar Vehículo</option>
                    <?php foreach($vehiculos as $vehiculo):?>                                    
                        <option value="<?php echo $vehiculo['id']?>"><?php echo $vehiculo['dominio'].' - '.$vehiculo['marca'].' - '.$vehiculo['modelo']?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </form>
    </div>
</div>