
$(function(){
    var url = $("#url").val();
    console.log("====> LOAD DASHBOARD LIB");    
    $("#filter_date_from").datetimepicker({
              
        format:'d/m/Y H:i',
        locale: 'es',
        useCurrent:true,
        onShow:function( ct ){
        this.setOptions({
            minDate:0,
            maxDate:$('#filter_date_to').val()?$('#filter_date_to').val():false
         });
        },
    });

    $("#filter_date_to").datetimepicker({  
        locale: 'es',     
        format:'d/m/Y H:i',
        onShow:function( ct ){
         this.setOptions({
            minDate:$('#filter_date_from').val()?$('#filter_date_from').val():false
         });
        },
    });


    $("#filter_bt").on('click',function(){
        var fecha_from= $("#filter_date_from").val();
        var fecha_to= $("#filter_date_to").val();
        var categoria_id= $("#filter_categoria").val();

        console.log("===> fecha_from: %o",fecha_from);
        console.log("===> fecha_to  : %o"  ,fecha_to);
        console.log("===> categoria_id: %o",categoria_id);
        $.post(url + 'reservas/consulta/',{fecha_from:fecha_from,fecha_to:fecha_to,categoria_id:categoria_id},function(result){
            console.log("===> result: %o",result);
            $(".filter_result").html(result);
        });        

    });

    function getColor(id){
        var colors=['#26A69A','#FFB74D','#FF7043','#0D47A1','#64B5F6'];
        return colors[id];
    }

    $('#calendar').fullCalendar({
        locale: 'es',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        customButtons: {
            myCustomButton: {
                text: 'custom!',
                click: function () {
                    alert('clicked the custom button!');
                }
            }
        },
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: function(start, end, timezone, callback) {
            console.log("===> start: %o",start)
            console.log("===> end: %o",end)
            jQuery.ajax({
                url: url + 'reservas/calendario',
                type: 'POST',
                dataType: 'json',
                data: {
                    start: start.format(),
                    end: end.format()
                },
                success: function(doc) {

                    console.log("===> Eventos: %o",doc)
                    var events = [];
                    if(!!doc.result){
                        console.log("===> Eventos: %o",doc.result);
                        var colors=['','','','','','#26A69A','#FFB74D','#FF7043','#0D47A1','#64B5F6'];
                        $.map( doc.result, function( r ) {
                            console.log("===> Evento: %o",r)
                            console.log("===> Evento: %o",r.categoria_id)
                            console.log("===> Color: %o",colors[parseInt(r.categoria_id)])
                            var color=colors[parseInt(r.categoria_id)];
                            events.push({
                                id: r.id,
                                title: r.nombre,
                                start: r.entrega_fecha,
                                end: r.devolucion_fecha,
                                color  : color
                            });
                        });
                    }
                    callback(events);
                }
            });
        },
        buttonText: {
            next: '>',
            nextYear: '>>',
            prev: '<',
            prevYear: '<<',
            today: moment().locale('de', {months : "Januar_Februar_M&#228;rz_April_Mai_Juni_Juli_August_September_Oktober_November_Dezember".split("_")}).format("MMMM YYYY"),
            month:'Mes',
            week :'Semana',
            day  :'Día',
        },
        
            /*[
            {
                title: 'All Day Event',
                start: '2018-03-01'
            },
            {
                title: 'Long Event',
                start: '2018-03-07',
                end: '2018-03-10'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: '2018-03-09T16:00:00'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: '2018-03-16T16:00:00'
            },
            {
                title: 'Conference',
                start: '2018-03-11',
                end: '2018-03-13'
            },
            {
                title: 'Meeting',
                start: '2018-03-12T10:30:00',
                end: '2018-03-12T12:30:00'
            },
            {
                title: 'Lunch',
                start: '2018-03-12T12:00:00'
            },
            {
                title: 'Meeting',
                start: '2018-03-12T14:30:00'
            },
            {
                title: 'Happy Hour',
                start: '2018-03-12T17:30:00'
            },
            {
                title: 'Dinner',
                start: '2018-03-12T20:00:00'
            },
            {
                title: 'Birthday Party',
                start: '2018-03-13T07:00:00'
            },
            {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2018-03-28'
            }
        ]*/
    });

});