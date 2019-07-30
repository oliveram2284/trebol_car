$(document).ready(function() {
    console.log("LOAD RESERVA FORM JS");

    $("#categoria_id").change(function(){
        console.log("====> category_id change: %o",$(this).val());
        var id = $(this).val();
        var vehiculo_id = $(document).find("#edit_reserva_id").val();        
        var url = $("#url").val();

        var data_ajax = {
            'dataType': 'json',
            'method': 'GET',
            'url': url + 'vehiculos/getByCategory/'+id,
            success: function(response) {
                console.log(response);
                var output='';
                output+='<option value="">Seleccione una Vehiculo</option>';
                $.each(response.result,function(index,item){
                    console.log(index);
                    console.log(item);
                    if(vehiculo_id== item.id){
                        output+='<option value="'+item.id+'" selected> '+item.marca+' '+item.modelo+' - '+item.dominio+' </option>';
                    }else{
                        output+='<option value="'+item.id+'"> '+item.marca+' '+item.modelo+' - '+item.dominio+' </option>';
                    }
                });
                console.log("==> output: %o",output);
                /*$("#adherent_nro").val(response.result.adherent_nro);
                $("#adherent_name").val(response.result.fullname);
                $("#adherent_date_cancelation").val(response.result.fecha_cancelacion);
                $("#viewPayment").show();*/
                $("#vehiculo_id").html(output);
                return false;

            },
            error: function(error) {
                console.debug("===> ERROR: %o", error);
            }
        };
        console.debug("===> data_ajax: %o", data_ajax);
        $.ajax(data_ajax);
    });

    $("#categoria_id").trigger("change");
    
});