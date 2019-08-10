
$(function(){
    var url = $("#url").val();
    console.log("====> LOAD DASHBOARD LIB");    
    $("#filter_date").datetimepicker({       
        format:'d/m/Y H:i',
        onShow:function( ct ){
         this.setOptions({
          maxDate:$('#date_timepicker_end').val()?$('#date_timepicker_end').val():false
         });
        },
    });


    $("#filter_bt").on('click',function(){
        var date_filter= $("#filter_date").val();
        var categoria_id= $("#filter_categoria").val();
        console.log("===> date_filter: %o",date_filter);
        console.log("===> categoria_id: %o",categoria_id);
        $.post(url + 'reservas/consulta/',{fecha:date_filter,categoria_id:categoria_id},function(result){
            console.log("===> result: %o",result);
            $(".filter_result").html(result);
        });
        /*
        var data_ajax = {
            'dataType': 'json',
            'method': 'POST',
            'url': url + 'reservas/consulta/',
            'data':{fecha:date_filter,categoria_id:categoria_id},
            success: function(response) {
                console.log("===> RESPONSE: %o",response);
                $(".filter_result").html(response);
                return false;
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
                $("#vehiculo_id").html(output);
                return false;

            },
            error: function(error) {
                console.debug("===> ERROR: %o", error);
            }
        };
        console.debug("===> data_ajax: %o", data_ajax);
        $.ajax(data_ajax);*/


    });

    /* $('#datetimepicker').datetimepicker();
    $('#timepicker').datetimepicker({
        datepicker: false,
        format: 'H:i'
    });*/
});