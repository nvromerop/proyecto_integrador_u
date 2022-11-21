$('#btnAdd').click(function () {
    var a = 0;
    let c = '#VehiForm .form-control:visible:not(.noFilt)';
    $(c).each(function () {
        if ($(this).val() == '') {
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
            a++;
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: ruta,
        type: 'POST',
        data: $('#VehiForm').serialize(),
        dataType: 'json',
        success: function (data) {
            // console.log(data)
            if(data.error){
                $.confirm({
                    title: 'Vehiculo no guardado',
                    content: 'Se ha encontrado un error de tipo: ' + data.error + '<br><br> <b>Intente guardar el vehiculo nuevamente. Si el problema persiste por favor comunicarse con el área de soporte.</b>',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        tryAgain: {
                            text: 'Ok',
                            btnClass: 'btn-red',
                        }                        
                    }
                }); 
               return;
            }else if(data.success){
                $.confirm({
                    title: 'Vehiculo guardado',
                    content: 'El vehciculo se ha guardado con éxito.',
                    type: 'green',
                    typeAnimated: true,
                    buttons: {
                        OK: {
                            btnClass: 'bg-green-500 btn-success',
                            action: function () {
                                $('#largeModal').modal('hide'); 
                                location.reload();
                            }
                        }
                    }
                });
            }
       },
       error: function (result) {
        $('#errors-modal').removeClass('d-none');
        var resulta = JSON.parse(result.responseText)
        var valor = '';
        var x = resulta.errors;
        // console.log(x);
        $('#ul-errors').empty();
        for (let i in x) {
            // valor += '<li>Campo '+i+' Error: '+x[i][0]+'</li>';
            valor += '<li>'+x[i][0]+'</li>';
        }
        $('#ul-errors').append(valor);
        // alert(resulta.errors)
       }
    });
    
    
});  



//display modal form for product EDIT ***************************
$(document).on('click','.open_modal',function(){
    var placa_id = $(this).val();
    var url5 = $('#url').val();
    // Populate Data in Edit Modal Form
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: url5 + '/edit/' + placa_id,
        success: function (data) {
            // console.log(url);
            // console.log(data);
            $('#id_editar').val(data[0]['id_placa']);
            $('#tipoNew').val(data[0]['tipo']);
            $('#marcaNew').val(data[0]['marca']);
            $('#modeloNew').val(parseInt(data[0]['modelo']));
            $('#colorNew').val(data[0]['color']);
            $('#idUsuarioNew').val(parseInt(data[0]['idUsuario']));
            $('#numParqueaderoNew').val(data[0]['numParqueadero']);
            $('#editModal').modal('show');
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

//UPDATE Visita
$('#update-apto-form').on('submit', function(e){
    e.preventDefault();

    var a = 0;
    let c = '#update-apto-form .form-control:visible:not(.noFilt)';
   
    $(c).each(function () {
        if ($(this).val() == '') {
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
            a++;
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });

    var form = this;
    console.log(form)
    $.ajax({
        url:$(form).attr('action'),
        method:$(form).attr('method'),
        data: new FormData(form),
        processData:false,
        dataType:'json',
        contentType:false,
        beforeSend: function(){
             $(form).find('span.error-text').text('');
        },
        success: function(data){
            console.log(data)
            if(data.error){
                $.confirm({
                    title: 'Vehiculo no actualizado',
                    content: 'Se ha encontrado un error de tipo: ' + data.error + '<br><br> <b>Intente actualizar el vehiculo nuevamente. Si el problema persiste por favor comunicarse con el área de soporte.</b>',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        tryAgain: {
                            text: 'Ok',
                            btnClass: 'btn-red',
                        }                        
                    }
                }); 
               return;
            }else if(data.success){
                $.confirm({
                    title: 'Vehiculo actualizado',
                    content: 'La vehiculo se ha actulizado con éxito.',
                    type: 'green',
                    typeAnimated: true,
                    buttons: {
                        OK: {
                            btnClass: 'bg-green-500 btn-success',
                            action: function () {
                                $('#largeModal').modal('hide'); 
                                location.reload();
                            }
                        }
                    }
                });
            }
        },
        error: function (result) {
            $('#errors-modal-update').removeClass('d-none');
            var resulta = JSON.parse(result.responseText)
            var valor = '';
            var x = resulta.errors;
            console.log(x);
            $('#ul-errors-update').empty();
            for (let i in x) {
                valor += '<li>'+x[i][0]+'</li>';
            }
            $('#ul-errors-update').append(valor);
           }
    });
});


//PARA EL SHOW
$(document).ready(function(){

    $('#VehiTable').on('click','.viewdetails',function(){
        var empid = $(this).attr('data-id');

        if(empid > 0){

           // AJAX request
        //    var url = "{{ route('getEmployeeDetails',[':empid']) }}";
           var url = ruta2;
           url = url.replace(':vehid',empid);

           // Empty modal data
           $('#tblempinfo tbody').empty();

           $.ajax({
               url: url,
               dataType: 'json',
               success: function(response){

                   // Add employee details
                   $('#tblempinfo tbody').html(response.html);

                   // Display Modal
                   $('#viewModal').modal('show'); 
               }
           });
        }
    });

});