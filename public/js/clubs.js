
$(document).ready(function(){

    $('#ClubTable').on('click','.viewdetails',function(){
        var empid = $(this).attr('data-id');

        if(empid > 0){

           // AJAX request
        //    var url = "{{ route('getEmployeeDetails',[':empid']) }}";
           var url = ruta2;
           url = url.replace(':clubid',empid);

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