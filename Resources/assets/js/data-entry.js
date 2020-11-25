

var table = $('#maintable').DataTable( {

    "ajax": {
        "url": "?p=load",
         "type": "POST",
         "dataSrc": "",
         "data" : {
            "load" : "selectdataentiesbypumpingstationuser",
            "pumpingstationuserid": get['pumpingstationuserid'],
        }
    },
    "columns": [
        { "data": "monthlyproductiondataid" },
        { "data": "datecreated" },
        {
            "data": null ,
            "render" : function ( data, type, full ) 
            {
                var button = "";
                button += "<button type='button' class='btn btn-icon btn-warning m-1' data-toggle='tooltip' data-placement='top' title='View' onclick='view(" + data['monthlyproductiondataid'] + ")'><i class='bx bxs-show'></i></button>";
                return button;
            }
        },
    ],
    "order": [[ 0, "asc" ]]
            
});


$('#createForm').validate({ 
    onfocusout: false,
    rules: {
 
        d10: {
            required: true,
        },
        e10: {
            required: true,
        },
        d11: {
            required: true,
        },
        d12: {
            required: true,
        },
        d13: {
            required: true,
        },
        d15: {
            required: true,
        },
        d16: {
            required: true,
        },
        d17: {
            required: true,
        },
        d19: {
            required: true,
        },
        d20: {
            required: true,
        },
        d21: {
            required: true,
        },
        d23: {
            required: true,
        },
        e23: {
            required: true,
        },
        d24: {
            required: true,
        },
        e24: {
            required: true,
        },
        d25: {
            required: true,
        },
        e25: {
            required: true,
        },
        e26: {
            required: true,
        },
        d27: {
            required: true,
        },
        d30: {
            required: true,
        },
        e30: {
            required: true,
        },
        d31: {
            required: true,
        },
        e31: {
            required: true,
        },
        d32: {
            required: true,
        },
        e32: {
            required: true,
        },
        e33: {
            required: true,
        },
        c34: {
            required: true,
        },
        d34: {
            required: true,
        },
        d38: {
            required: true,
        },
        d39: {
            required: true,
        },
        d40: {
            required: true,
        },
        d43: {
            required: true,
        },
        e43: {
            required: true,
        },
        d44: {
            required: true,
        },
        e44: {
            required: true,
        },
        d45: {
            required: true,
        },
        e45: {
            required: true,
        },
        e46: {
            required: true,
        },
        c47: {
            required: true,
        },
        d47: {
            required: true,
        },
        d50: {
            required: true,
        },
        e50: {
            required: true,
        },
        d51: {
            required: true,
        },
        e51: {
            required: true,
        },
        d52: {
            required: true,
        },
        e52: {
            required: true,
        },
        e53: {
            required: true,
        },
        c55: {
            required: true,
        },
        d55: {
            required: true,
        },
        d58: {
            required: true,
        },
        e58: {
            required: true,
        },
        d59: {
            required: true,
        },
        e59: {
            required: true,
        },
        e60: {
            required: true,
        },
        d61: {
            required: true,
        },
        e61: {
            required: true,
        },
        d62: {
            required: true,
        },
        e62: {
            required: true,
        },
        e63: {
            required: true,
        },
        e65: {
            required: true,
        },
        forval: {
            required: true,
        },



    },
    submitHandler: function (form) { 

        var formData = new FormData(form);
        formData.append('pumpingstationuserid', get['pumpingstationuserid']);
        formData.append('submit', 'createdataentry');

        $.ajax({
            type: "POST",
            url: "?p=submit",
            async: true,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {

                console.log(data);
           
                if (data > 0){
                    
                    swal("Success!", "Saved.", "success");

                    $('#createModal').modal('hide');
                    table.ajax.reload();

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


    //Flushout 1
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



    //Backwashing 1
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


    //Flush out 2
    var d43 = parseFloat($('#d43').val());  //hrs
    $('#e43').val(d43.toFixed(2)); //Total

    var d44 = parseFloat($('#d44').val());  //min
    $('#e44').val((d44/60).toFixed(2)); //Total

    var d45 = parseFloat($('#d45').val());  //sec
    $('#e45').val((d45/3600).toFixed(2)); //Total

    var e46 = parseFloat($('#e43').val()) + parseFloat($('#e44').val()) + parseFloat($('#e45').val());
    $('#e46').val(e46.toFixed(2)); //Total

    var c47 = parseFloat(0.001);
    $('#c47').val(c47); //Total

    var d47 = parseFloat($('#e46').val()) * parseFloat($('#c47').val());
    $('#d47').val(d47.toFixed(2)); //Total


    //Backwashing 2
    var d50 = parseFloat($('#d50').val());  //hrs
    $('#e50').val(d50.toFixed(2)); //Total

    var d51 = parseFloat($('#d51').val());  //min
    $('#e51').val((d51/60).toFixed(2)); //Total

    var d52 = parseFloat($('#d52').val());  //sec
    $('#e52').val((d52/3600).toFixed(2)); //Total

    var e53 = parseFloat($('#e50').val()) + parseFloat($('#e51').val()) + parseFloat($('#e52').val());
    $('#e53').val(e53.toFixed(2)); //Total

    var c55 = parseFloat($('#c47').val());  //sec
    $('#c55').val(c55); //Total

    var d55 = parseFloat($('#e53').val()) * parseFloat($('#c55').val());
    $('#d55').val(d55.toFixed(2)); //Total


    //Genset meter hr
    //load
    var d58 = parseFloat($('#d58').val());  //hrs
    $('#e58').val(d58.toFixed(2)); //Total

    var d59 = parseFloat($('#d59').val());  //min
    $('#e59').val((d59/60).toFixed(2)); //Total


    var e60 = parseFloat($('#e58').val()) + parseFloat($('#e59').val()); 
    $('#e60').val(e60.toFixed(2)); //Total

    //warm-up
    var d61 = parseFloat($('#d61').val());  //hrs
    $('#e61').val(d61.toFixed(2)); //Total

    var d62 = parseFloat($('#d62').val());  //min
    $('#e62').val((d62/60).toFixed(2)); //Total


    var e63 = parseFloat($('#e61').val()) + parseFloat($('#e62').val()); 
    $('#e63').val(e63.toFixed(2)); //Total


    var e65 = parseFloat($('#e60').val()) + parseFloat($('#e63').val()); 
    $('#e65').val(e65.toFixed(2)); //Total

}