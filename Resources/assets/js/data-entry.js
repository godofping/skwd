

// var table = $('#maintable').DataTable( {

//     "ajax": {
//         "url": "?p=load",
//          "type": "POST",
//          "dataSrc": "",
//          "data" : {
//             "load" : "selectpumpstationsusers",
//             "pumpid": get['pumpid'],
//         }
//     },
//     "columns": [
//         { "data": "pumpingstationuserid" },
//         { "data": "fullname" },
//         {
//             "data": null ,
//             "render" : function ( data, type, full ) 
//             {
//             	var button = "";
//             	button += "<button type='button' class='btn btn-icon btn-danger m-1' data-toggle='tooltip' data-placement='top' title='Delete' onclick='del(" + data['pumpingstationuserid'] + ")'><i class='bx bx-trash-alt'></i></button>";
//             	return button;
//             }
//         },
//     ],
//     "order": [[ 0, "asc" ]]
            
// });


$('#createForm').validate({ 
    onfocusout: false,
    rules: {
 
        userid: {
            required: true,
        },

    },
    submitHandler: function (form) { 

        var formData = new FormData(form);
        formData.append('pumpingstationuserid', get['pumpingstationuserid']);
        formData.append('submit', 'createpumpstationuser');

        $.ajax({
            type: "POST",
            url: "?p=submit",
            async: true,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
           
                if (data > 0){
                    
                    swal("Success!", "Saved.", "success");

                    $('#createModal').modal('hide');
                    // table.ajax.reload();

                }
                else
                {
                    swal("Something wrong!", "Please try again.", "error");
                }

            },
            error: function(data) {
                swal("Something wrong!", "Please try again.", "error");
            }
        });

    },

    messages: {

    }
});






$("#createModal").on('show.bs.modal', function(){
    $('#createForm').trigger("reset");
});


$('#createForm').on('keyup change paste', 'input, select, textarea', function(){
    calculate();
});

function calculate()
{   
    var forval = parseFloat($('#forval').val());  //Formula Value
    var d10 = parseFloat($('#d10').val());  //Capacity 1
    var d11 = parseFloat($('#d11').val());  //Present
    var d12 = parseFloat($('#d12').val());  //Previous

    $('#e10').val(((forval * 24) * d10).toFixed(2));  //Capacity 2

    var d13 = d11 - d12;  
    $('#d13').val(d13.toFixed(2)); //Total


    var d15 = parseFloat($('#d15').val());  //Present
    var d16 = parseFloat($('#d16').val());  //Previous

    var d17 = d15 - d16;  
    $('#d17').val(d17.toFixed(2)); //Total


    var d19 = parseFloat($('#d19').val());  //Present
    var d20 = parseFloat($('#d20').val());  //Previous

    var d21 = d19 - d20;  
    $('#d21').val(d21.toFixed(2)); //Total


    var d23 = parseFloat($('#d23').val());  //hrs
    $('#e23').val(d23.toFixed(2)); //Total

    var d24 = parseFloat($('#d24').val());  //min
    $('#e24').val((d24/60).toFixed(2)); //Total

    var d25 = parseFloat($('#d25').val());  //sec
    $('#e25').val((d25/3600).toFixed(2)); //Total

    var e26 = parseFloat($('#e23').val()) + parseFloat($('#e24').val()) + parseFloat($('#e25').val());
    $('#e26').val(e26.toFixed(2)); //Total

    var c27 = parseFloat($('#d21').val()) / parseFloat($('#d13').val());
    $('#c27').val(c27.toFixed(2)); //Total

    var d27 = parseFloat($('#e26').val()) * parseFloat($('#c27').val());
    $('#d27').val(d27.toFixed(2)); //Total




    var d30 = parseFloat($('#d30').val());  //hrs
    $('#e30').val(d30.toFixed(2)); //Total

    var d31 = parseFloat($('#d31').val());  //min
    $('#e31').val((d31/60).toFixed(2)); //Total

    var d32 = parseFloat($('#d32').val());  //sec
    $('#e32').val((d32/3600).toFixed(2)); //Total

    var e33 = parseFloat($('#e30').val()) + parseFloat($('#e31').val()) + parseFloat($('#e32').val());
    $('#e33').val(e33.toFixed(2)); //Total

    var c34 = parseFloat($('#c27').val());  //sec
    $('#c34').val(c34.toFixed(2)); //Total



    var d38 = parseFloat($('#d38').val());  //Present
    var d39 = parseFloat($('#d39').val());  //Previous
    var d40 = d38 - d39;
    $('#d40').val(d40.toFixed(2)); //Total



    var d43 = parseFloat($('#d43').val());  //hrs
    $('#e43').val(d43.toFixed(2)); //Total

    var d44 = parseFloat($('#d44').val());  //min
    $('#e44').val((d44/60).toFixed(2)); //Total

    var d45 = parseFloat($('#d45').val());  //sec
    $('#e45').val((d45/3600).toFixed(2)); //Total

    var e46 = parseFloat($('#e43').val()) + parseFloat($('#e44').val()) + parseFloat($('#e45').val());
    $('#e46').val(e46.toFixed(2)); //Total

    var c47 = parseFloat($('#c47').val());
    $('#c47').val(c47.toFixed(2)); //Total

    var d47 = parseFloat($('#e46').val()) * parseFloat($('#c47').val());
    $('#d47').val(d47.toFixed(2)); //Total

}