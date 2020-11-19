var table = $('#maintable').DataTable( {

    "ajax": {
        "url": "?p=load",
         "type": "POST",
         "dataSrc": "",
         "data" : {
            "load" : "selectvehicles",
        }
    },
    "columns": [
        { "data": "vehicleid" },
        { "data": "vehiclename" },
        { "data": "typeofvehicle" },
        { "data": "status" },
        {
            "data": null ,
            "render" : function ( data, type, full ) 
            {
                return "<button type='button' class='btn btn-icon btn-warning mb-1' data-toggle='tooltip' data-placement='top' title='Update' onclick='update(" + data['vehicleid'] + ")'><i class='bx bxs-pencil'></i></button> <button type='button' class='btn btn-icon btn-danger' data-toggle='tooltip' data-placement='top' title='Delete' onclick='del(" + data['vehicleid'] + ")'><i class='bx bx-trash-alt'></i></button>";
            }
        },
    ],
    "order": [[ 0, "asc" ]]
            
});


$('#createForm').validate({ 
    onfocusout: false,
    rules: {
 
        vehiclename: {
            required: true,
        },
        typeofvehicle: {
            required: true,
        },
        status: {
            required: true,
        }

    },
    submitHandler: function (form) { 

        var formData = new FormData(form);
        formData.append('submit', 'createvehicle');

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

$('#updateForm').validate({ 
    onfocusout: false,
    rules: {
 
        vehiclename1: {
            required: true,
        },
        typeofvehicle1: {
            required: true,
        },
        status1: {
            required: true,
        },

    },
    submitHandler: function (form) { 

        var formData = new FormData(form);
        formData.append('submit', 'updatevehicle');

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
                    
                    swal("Success!", "Updated.", "success");

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
        formData.append('submit', 'deletevehicle');

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



function update(vehicleid)
{

    $.ajax({
    type: "POST",
    dataType: 'json',
    url: "?p=load",
    async: false,
    data: {
        load: "selectvehicle",
        vehicleid: vehicleid,
    },
        success: function(response) {

            $('#updateModal').modal('show');

            $('#updateid').val(response['vehicleid']);
            $('#vehiclename1').val(response['vehiclename']);
            $('#typeofvehicle1').val(response['typeofvehicle']); 
            $('#status1').val(response['status']);
        },

    });


    $('#updateAnnouncementModal').modal('show'); 
}


function del(vehicleid)
{

    $.ajax({
    type: "POST",
    dataType: 'json',
    url: "?p=load",
    async: false,
    data: {
        load: "selectvehicle",
        vehicleid: vehicleid,
    },
        success: function(response) {

            $('#deleteModal').modal('show');

            $('#deleteid').val(response['vehicleid']);
            $('#namespan').text(response['vehiclename']);
             
        },

    });


    $('#updateAnnouncementModal').modal('show'); 
}


$("#createModal").on('show.bs.modal', function(){
    $('#createForm').trigger("reset");
});

$("#updateModal").on('show.bs.modal', function(){
    $('#updateForm').trigger("reset");
});