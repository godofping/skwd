

var table = $('#maintable').DataTable( {

    "ajax": {
        "url": "?p=load",
         "type": "POST",
         "dataSrc": "",
         "data" : {
            "load" : "selectdataentries",
        }
    },
    "columns": [
        { "data": "monthlyproductiondataid" },
        { "data": "datecreated" },
        { "data": "areaname" },
        { "data": "pumpstationname" },
        { "data": "fullname" },
        {
            "data": null ,
            "render" : function ( data, type, full ) 
            {
                var button = "";
                button += "<button type='button' class='btn btn-icon btn-warning m-1' data-toggle='tooltip' data-placement='top' title='View' onclick='view(" + data['monthlyproductiondataid'] + ")'><i class='bx bxs-show'></i></button>";
                button += "<button type='button' class='btn btn-icon btn-warning m-1' data-toggle='tooltip' data-placement='top' title='Update' onclick='update(" + data['monthlyproductiondataid'] + ")'><i class='bx bxs-pencil'></i></button>";
                button += "<button type='button' class='btn btn-icon btn-danger m-1' data-toggle='tooltip' data-placement='top' title='Delete' onclick='del(" + data['monthlyproductiondataid'] + ")'><i class='bx bx-trash-alt'></i></button>";
                return button;
                
            }
        },
    ],
    "order": [[ 0, "asc" ]],

    initComplete: function () {
            this.api().columns().every( function (i) {
                if (i == 0 | i == 5) {} 
                else 
                {
                    var column = this;
                    var select = $('<select><option value=""></option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
     
                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );
     
                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                }
            } );
        }
            
});


$('#updateForm').validate({ 
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
        c27: {
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
        formData.append('submit', 'updatedataentry');

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

                    $('#updateModal').modal('hide');
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


$('#deleteForm').validate({ 
    onfocusout: false,
    rules: {

    },
    submitHandler: function (form) { 

        var formData = new FormData(form);
        formData.append('submit', 'deletedataentry');

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
                    
                    swal("Success!", "Deleted.", "success");

                    $('#deleteModal').modal('hide');
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


$("#updateModal").on('show.bs.modal', function(){
    $('#updateForm').trigger("reset");
});

$("#viewModal").on('show.bs.modal', function(){
    $('#viewForm').trigger("reset");
});


$('#updateForm').on('keyup change paste', 'input, select, textarea', function(){
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

function view(id)
{
    $.ajax({
    type: "POST",
    dataType: 'json',
    url: "?p=load",
    async: false,
    data: {
        load: "selectdataentrybypumpingstationuser",
        monthlyproductiondataid: id,
    },
        success: function(response) {

            $('#viewModal').modal('show');

            $('#forval_').val(response['forval']);
            $('#d10_').val(response['d10']);
            $('#e10_').val(response['e10']);
            $('#d11_').val(response['d11']); 
            $('#d12_').val(response['d12']);
            $('#d13_').val(response['d13']); 
            $('#d15_').val(response['d15']);
            $('#d16_').val(response['d16']);
            $('#d17_').val(response['d17']);
            $('#d19_').val(response['d19']);
            $('#d20_').val(response['d20']);
            $('#d21_').val(response['d21']);
            $('#d23_').val(response['d23']);
            $('#e23_').val(response['e23']);
            $('#d24_').val(response['d24']);
            $('#e24_').val(response['e24']);
            $('#d25_').val(response['d25']);
            $('#e25_').val(response['e25']);
            $('#e26_').val(response['e26']);
            $('#c27_').val(response['c27']);
            $('#d27_').val(response['d27']);
            $('#d30_').val(response['d30']);
            $('#e30_').val(response['e30']);
            $('#d31_').val(response['d31']);
            $('#e31_').val(response['e31']);
            $('#d32_').val(response['d32']);
            $('#e32_').val(response['e32']);
            $('#e33_').val(response['e33']);
            $('#c34_').val(response['c34']);
            $('#d34_').val(response['d34']);
            $('#d38_').val(response['d38']);
            $('#d39_').val(response['d39']);
            $('#d40_').val(response['d40']);
            $('#d43_').val(response['d43']);
            $('#e43_').val(response['e43']);
            $('#d44_').val(response['d44']);
            $('#e44_').val(response['e44']);
            $('#d45_').val(response['d45']);
            $('#e45_').val(response['e45']);
            $('#e46_').val(response['e46']);
            $('#c47_').val(response['c47']);
            $('#d47_').val(response['d47']);
            $('#d50_').val(response['d50']);
            $('#e50_').val(response['e50']);
            $('#d51_').val(response['d51']);
            $('#e51_').val(response['e51']);
            $('#d52_').val(response['d52']);
            $('#e52_').val(response['e52']);
            $('#e53_').val(response['e53']);
            $('#c55_').val(response['c55']);
            $('#d55_').val(response['d55']);
            $('#d58_').val(response['d58']);
            $('#e58_').val(response['e58']);
            $('#d59_').val(response['d59']);
            $('#e59_').val(response['e59']);
            $('#e60_').val(response['e60']);
            $('#d61_').val(response['d61']);
            $('#e61_').val(response['e61']);
            $('#d62_').val(response['d62']);
            $('#e62_').val(response['e62']);
            $('#e63_').val(response['e63']);
            $('#e65_').val(response['e65']);

        },

    });
}

function update(id)
{
    $.ajax({
    type: "POST",
    dataType: 'json',
    url: "?p=load",
    async: false,
    data: {
        load: "selectdataentrybypumpingstationuser",
        monthlyproductiondataid: id,
    },
        success: function(response) {

            $('#updateModal').modal('show');

            $('#forval').val(response['forval']);
            $('#d10').val(response['d10']);
            $('#e10').val(response['e10']);
            $('#d11').val(response['d11']); 
            $('#d12').val(response['d12']);
            $('#d13').val(response['d13']); 
            $('#d15').val(response['d15']);
            $('#d16').val(response['d16']);
            $('#d17').val(response['d17']);
            $('#d19').val(response['d19']);
            $('#d20').val(response['d20']);
            $('#d21').val(response['d21']);
            $('#d23').val(response['d23']);
            $('#e23').val(response['e23']);
            $('#d24').val(response['d24']);
            $('#e24').val(response['e24']);
            $('#d25').val(response['d25']);
            $('#e25').val(response['e25']);
            $('#e26').val(response['e26']);
            $('#c27').val(response['c27']);
            $('#d27').val(response['d27']);
            $('#d30').val(response['d30']);
            $('#e30').val(response['e30']);
            $('#d31').val(response['d31']);
            $('#e31').val(response['e31']);
            $('#d32').val(response['d32']);
            $('#e32').val(response['e32']);
            $('#e33').val(response['e33']);
            $('#c34').val(response['c34']);
            $('#d34').val(response['d34']);
            $('#d38').val(response['d38']);
            $('#d39').val(response['d39']);
            $('#d40').val(response['d40']);
            $('#d43').val(response['d43']);
            $('#e43').val(response['e43']);
            $('#d44').val(response['d44']);
            $('#e44').val(response['e44']);
            $('#d45').val(response['d45']);
            $('#e45').val(response['e45']);
            $('#e46').val(response['e46']);
            $('#c47').val(response['c47']);
            $('#d47').val(response['d47']);
            $('#d50').val(response['d50']);
            $('#e50').val(response['e50']);
            $('#d51').val(response['d51']);
            $('#e51').val(response['e51']);
            $('#d52').val(response['d52']);
            $('#e52').val(response['e52']);
            $('#e53').val(response['e53']);
            $('#c55').val(response['c55']);
            $('#d55').val(response['d55']);
            $('#d58').val(response['d58']);
            $('#e58').val(response['e58']);
            $('#d59').val(response['d59']);
            $('#e59').val(response['e59']);
            $('#e60').val(response['e60']);
            $('#d61').val(response['d61']);
            $('#e61').val(response['e61']);
            $('#d62').val(response['d62']);
            $('#e62').val(response['e62']);
            $('#e63').val(response['e63']);
            $('#e65').val(response['e65']);

            $('#updateid').val(response['monthlyproductiondataid']);
            

        },

    });
}


function del(id)
{

    $.ajax({
    type: "POST",
    dataType: 'json',
    url: "?p=load",
    async: false,
    data: {
        load: "selectdataentrybypumpingstationuser",
        monthlyproductiondataid: id,
    },
        success: function(response) {

            $('#deleteModal').modal('show');

            $('#deleteid').val(response['monthlyproductiondataid']);
            $('#namespan').text(response['monthlyproductiondataid']);
             
        },

    });

}