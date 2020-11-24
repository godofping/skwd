var table = $('#maintable').DataTable( {

    "ajax": {
        "url": "?p=load",
         "type": "POST",
         "dataSrc": "",
         "data" : {
            "load" : "selectpumpstations",
        }
    },
    "columns": [
        { "data": "pumpid" },
        { "data": "areaname" },
        { "data": "pumpstationname" },
        {
            "data": null ,
            "render" : function ( data, type, full ) 
            {
            	var button = "";
                button += "<a href='?p=assign-users&pumpid="+data['pumpid']+"'><button type='button' class='btn btn-icon btn-info m-1' data-toggle='tooltip' data-placement='top' title='Assign Users'><i class='bx bxs-user-badge'></i></button></a>";
                button += "<button type='button' class='btn btn-icon btn-warning m-1' data-toggle='tooltip' data-placement='top' title='Update' onclick='update(" + data['pumpid'] + ")'><i class='bx bxs-pencil'></i></button>";
            	button += "<button type='button' class='btn btn-icon btn-danger m-1' data-toggle='tooltip' data-placement='top' title='Delete' onclick='del(" + data['pumpid'] + ")'><i class='bx bx-trash-alt'></i></button>";
            	return button;
            }
        },
    ],
    "order": [[ 0, "asc" ]]
            
});


$('#createForm').validate({ 
    onfocusout: false,
    rules: {
 
        areaid: {
            required: true,
        },
        pumpstationname: {
            required: true,
        },

    },
    submitHandler: function (form) { 

        var formData = new FormData(form);
        formData.append('submit', 'createpumpstation');

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
 
        areaid1: {
            required: true,
        },
        pumpstationname1: {
            required: true,
        },

    },
    submitHandler: function (form) { 

        var formData = new FormData(form);
        formData.append('submit', 'updatepumpstation');

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
        formData.append('submit', 'deletepumpstation');

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
        load: "selectpumpstation",
        pumpid: id,
    },
        success: function(response) {

            $('#updateModal').modal('show');

            $('#updateid').val(response['pumpid']);
            $('#areaid1').val(response['areaid']);
            $('#pumpstationname1').val(response['pumpstationname']); 

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
        load: "selectpumpstation",
        pumpid: id,
    },
        success: function(response) {

            $('#deleteModal').modal('show');

            $('#deleteid').val(response['pumpid']);
            $('#namespan').text(response['pumpstationname']);
             
        },

    });

}

$("#createModal").on('show.bs.modal', function(){
    $('#createForm').trigger("reset");
});

$("#updateModal").on('show.bs.modal', function(){
    $('#updateForm').trigger("reset");
});


$.ajax({
    type: "POST",
    url: "?p=load",
    async: true,
    data: {
        load: "selectareas",
    },
    success: function(data) {

        var data = JSON.parse(data);
        var dropdown = $('#areaid');
        var dropdown1 = $('#areaid1');
            
        dropdown.empty();
        dropdown1.empty();

        dropdown.append('<option disabled="" selected>Please Select</option>');
        dropdown1.append('<option disabled="" selected>Please Select</option>');

        $.each(data, function(index) {
            var val = data[index].areaname;
            var id = data[index].areaid;
            selected = "";
            if(data[index].isDefault == '1')
            {
                selected = "selected";
            }
           dropdown.append("<option " + selected +  " value='" + id + "' >" + val + "</option>");
           dropdown1.append("<option " + selected +  " value='" + id + "' >" + val + "</option>");
        });
    
    }

});