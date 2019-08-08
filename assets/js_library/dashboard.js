
$(function(){

    console.log("====> LOAD DASHBOARD LIB");    
    $("#filter_date").datetimepicker({       
        format:'d/m/Y',
        onShow:function( ct ){
         this.setOptions({
          maxDate:$('#date_timepicker_end').val()?$('#date_timepicker_end').val():false
         });
        },
        timepicker:false
    });


    $("#filter_bt").on('click',function(){
        var date_filter= $("#filter_date").val();
        var categoria_id= $("#filter_date").val();
        console.log("===> date_filter: %o",date_filter);
    });

    /* $('#datetimepicker').datetimepicker();
    $('#timepicker').datetimepicker({
        datepicker: false,
        format: 'H:i'
    });*/
});