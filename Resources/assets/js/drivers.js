var table = $('#maintable').DataTable( {

    "ajax": {
        "url": "?p=load",
         "type": "POST",
         "dataSrc": "",
         "data" : {
            "load" : "selectdrivers",
        }
    },
    "columns": [
        { "data": "driverid" },
        { "data": "fullname" },
        { "data": "contactnumber" },
        { "data": "address" },
        {
            "data": null ,
            "render" : function ( data, type, full ) 
            {
                return "<button type='button' class='btn btn-icon btn-warning mb-1' data-toggle='tooltip' data-placement='top' title='Update' onclick='update(" + data['driverid'] + ")'><i class='bx bxs-pencil'></i></button> <button type='button' class='btn btn-icon btn-danger' data-toggle='tooltip' data-placement='top' title='Delete' onclick='del(" + data['driverid'] + ")'><i class='bx bx-trash-alt'></i></button>";
            }
        },
    ],
    "order": [[ 0, "asc" ]]
            
});


$('#createForm').validate({ 
    onfocusout: false,
    rules: {
 
        fullname: {
            required: true,
        },
        contactnumber: {
            required: true,
        },
        address: {
            required: true,
        }

    },
    submitHandler: function (form) { 

        var formData = new FormData(form);
        formData.append('submit', 'createdriver');

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
 
        fullname1: {
            required: true,
        },
        contactnumber1: {
            required: true,
        },
        address1: {
            required: true,
        },

    },
    submitHandler: function (form) { 

        var formData = new FormData(form);
        formData.append('submit', 'updatedriver');

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
        formData.append('submit', 'deletedriver');

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



function update(driverid)
{

    $.ajax({
    type: "POST",
    dataType: 'json',
    url: "?p=load",
    async: false,
    data: {
        load: "selectdriver",
        driverid: driverid,
    },
        success: function(response) {

            $('#updateModal').modal('show');

            $('#updateid').val(response['driverid']);
            $('#fullname1').val(response['fullname']);
            $('#contactnumber1').val(response['contactnumber']); 
            $('#address1').val(response['address']);
        },

    });


    $('#updateAnnouncementModal').modal('show'); 
}


function del(driverid)
{

    $.ajax({
    type: "POST",
    dataType: 'json',
    url: "?p=load",
    async: false,
    data: {
        load: "selectdriver",
        driverid: driverid,
    },
        success: function(response) {

            $('#deleteModal').modal('show');

            $('#deleteid').val(response['driverid']);
            $('#namespan').text(response['fullname']);
             
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