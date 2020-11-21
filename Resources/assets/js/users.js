var table = $('#maintable').DataTable( {

    "ajax": {
        "url": "?p=load",
         "type": "POST",
         "dataSrc": "",
         "data" : {
            "load" : "selectusers",
        }
    },
    "columns": [
        { "data": "userid" },
        { "data": "username" },
        { "data": "fullname" },
        { "data": "usertype" },
        {
            "data": null ,
            "render" : function ( data, type, full ) 
            {
                return "<button type='button' class='btn btn-icon btn-warning mb-1' data-toggle='tooltip' data-placement='top' title='Update' onclick='update(" + data['userid'] + ")'><i class='bx bxs-pencil'></i></button> <button type='button' class='btn btn-icon btn-danger' data-toggle='tooltip' data-placement='top' title='Delete' onclick='del(" + data['userid'] + ")'><i class='bx bx-trash-alt'></i></button>";
            }
        },
    ],
    "order": [[ 0, "asc" ]]
            
});


$('#createForm').validate({ 
    onfocusout: false,
    rules: {
 
        username: {
            required: true,
        },
        password: {
            required: true,
        },
        fullname: {
            required: true,
        },
        usertype: {
            required: true,
        },

    },
    submitHandler: function (form) { 

        var formData = new FormData(form);
        formData.append('submit', 'createuser');

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
                else if (data < 0){
                    
                    swal("Error!", "Username already taken.", "error");

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
 
        password1: {
            required: true,
        },
        fullname1: {
            required: true,
        },
        usertype1: {
            required: true,
        },

    },
    submitHandler: function (form) { 

        var formData = new FormData(form);
        formData.append('submit', 'updateuser');

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
        formData.append('submit', 'deleteuser');

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



function update(id)
{

    $.ajax({
    type: "POST",
    dataType: 'json',
    url: "?p=load",
    async: false,
    data: {
        load: "selectuser",
        userid: id,
    },
        success: function(response) {

            $('#updateModal').modal('show');

            $('#updateid').val(response['userid']);
            $('#username1').val(response['username']);
            $('#password1').val(response['password']); 
            $('#fullname1').val(response['fullname']);
            $('#usertype1').val(response['usertype']); 
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
        load: "selectuser",
        userid: id,
    },
        success: function(response) {

            $('#deleteModal').modal('show');

            $('#deleteid').val(response['userid']);
            $('#namespan').text(response['fullname']);
             
        },

    });

}

$("#createModal").on('show.bs.modal', function(){
    $('#createForm').trigger("reset");
});

$("#updateModal").on('show.bs.modal', function(){
    $('#updateForm').trigger("reset");
});
