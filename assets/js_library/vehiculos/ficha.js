$(document).ready(function() {
    console.log("LOAD FICHA JS SCRIPT");
    var url = $("#url").val();
    $("#addItem_bt").click(function(){

        var inputItem=$("#inputItem").val();

        if(inputItem==''){
            alert("Debe ingresar el nombre del campo");
            $("#inputItem").focus();
            return false;
        }

        $("#inputItem").val(null);
        
        var inputMinuscula=inputItem.toLowerCase();
        var input_label=inputItem;

        var input_text=inputMinuscula.split(' ');
        var input_name=input_text.join('_');
        var input_id=input_name.trim();


        var item_output='';/*
        item_output+='<div class="form-group row">';
        item_output+='<label for="modelo" class="col-sm-2 col-form-label">'+input_label+'</label>';
        item_output+='<div class="col-sm-4">';
        item_output+='<input type="text" class="form-control text-right" id="'+input_id+'_observacion" name="otro_item['+input_name+'][observacion]" placeholder="'+input_label+'">';
        item_output+='</div>';
        item_output+='<div class="col-sm-2">';
        item_output+='<input type="date" class="form-control text-right" id="'+input_id+'_fecha" name="otro_item['+input_name+'][fecha]" placeholder="'+input_label+'">';
        item_output+='</div>';
        item_output+='';
        item_output+='</div>';
*/  
        item_output+='<fieldset> <legend>'+input_label+'</legend>';
        item_output+='<div class="form-group row">';
        item_output+='  <label for="modelo" class="col-sm-2 col-form-label">Fecha</label>';
        item_output+='  <div class="col-sm-2">';
        item_output+='      <input type="date" class="form-control text-right" id="'+input_id+'_fecha" name="otro_item['+input_name+'][fecha]" placeholder="'+input_label+'">';
        item_output+='  </div>';
        item_output+='</div>';
        item_output+='<div class="form-group row">';
        item_output+='  <label for="modelo" class="col-sm-2 col-form-label">Observación</label>';
        item_output+='  <div class="col-sm-4">';
        item_output+='      <input type="text" class="form-control text-right" id="'+input_id+'_observacion" name="otro_item['+input_name+'][observacion]" placeholder="Observación">';
        item_output+='  </div>';
        item_output+='</div>';
        item_output+='</fieldset>';

        $("#otros_arreglos_inputs").append(item_output);
        return false;
    });



    $("#ver_historial").on('click',function(){
        console.log("====> ver_historial clicked");
        $("#historial_modal").modal("show");
        var id=$("#ficha_id").val();
        console.log("====> ver_historial clicked id: %o",id);
        console.log("====> ver_historial clicked id: %o",url + 'vehiculos/get_ficha_historial/'+id);
     
        $("#historial_modal .modal-body").load(url + 'vehiculos/get_ficha_historial/'+id,function (response) {
            console.log("====> response: %o",response);
            /*$(this).find('form').attr('action',href);
            $("#modal1").modal("show");*/
        });
        return false;
    })
});