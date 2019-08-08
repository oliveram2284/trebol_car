$(document).ready(function() {
    console.log("LOAD RESERVA INDEX JS");
    var url = $("#url").val();
    $(".confirm_bt").on('click',function(){
        
        var href=$(this).attr('href');
        console.log("====> url: %o",href);

        swal({
        title: 'Desea Activar la reserva?',
        text: "Un vez activada, solo se puede finalizar!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Activar'
        }).then((result) => {
            window.location=href;
            return true;
            console.log(result);
        if (result) {
            swal(
            'Reserva Activada!',
            'Su reserva Fue Activada.',
            'success'
            )
        }
        })
        return false;
    });

    $('.setCar_bt').on('click',function(){
        var id=$(this).data('id');
        var href=$(this).attr('href');
        console.log("====> url: %o",href);

        $("#modal1 .modal-body").load(url + 'reservas/modal_vehiculo/'+id,function (responseText, textStatus, XMLHttpRequest) {
            $(this).find('form').attr('action',href);
            $("#modal1").modal("show");
        });

        //$('#modal1').modal('show');

        return false;
    });

    $('.view_bt').on('click',function(){
        $('#modal1').modal('show');
        return false;
    });

    $(document).on('click','#save_modal_bt',function(){
        console.log("====> url: %o",url);
        $("#modal1 .modal-body").find("form").trigger("submit");
        $("#modal1").modal("hide");
        return false;
    });

});