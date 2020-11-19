var table = $('#maintable').DataTable( {

    "ajax": {
        "url": "?p=load",
         "type": "POST",
         "dataSrc": "",
         "data" : {
            "load" : "selectfuellogs",
        }
    },
    "columns": [
        { "data": "fuellogid" },
        { "data": "driverfullname" },
        { "data": "vehiclename" },
        { "data": "amountoffuel" },
        { "data": "triplocation" },
        { "data": "fuellogdate" },
        {
            "data": null ,
            "render" : function ( data, type, full ) 
            {
                return "<button type='button' class='btn btn-icon btn-warning mb-1' data-toggle='tooltip' data-placement='top' title='Update' onclick='update(" + data['fuellogid'] + ")'><i class='bx bxs-pencil'></i></button> <button type='button' class='btn btn-icon btn-danger' data-toggle='tooltip' data-placement='top' title='Delete' onclick='del(" + data['fuellogid'] + ")'><i class='bx bx-trash-alt'></i></button>";
            }
        },
    ],
    "order": [[ 0, "asc" ]]
            
});


$('#createForm').validate({ 
    onfocusout: false,
    rules: {
 
        driverid: {
            required: true,
        },
        vehicleid: {
            required: true,
        },
        amountoffuel: {
            required: true,
        },
        triplocation: {
            required: true,
        },
        fuellogdate: {
            required: true,
        },

    },
    submitHandler: function (form) { 

        var formData = new FormData(form);
        formData.append('submit', 'createfuellog');

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
 
        driverid1: {
            required: true,
        },
        vehicleid1: {
            required: true,
        },
        amountoffuel1: {
            required: true,
        },
        triplocation1: {
            required: true,
        },
        fuellogdate1: {
            required: true,
        },

    },
    submitHandler: function (form) { 

        var formData = new FormData(form);
        formData.append('submit', 'updatefuellog');

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



function update(fuellogid)
{

    $.ajax({
    type: "POST",
    dataType: 'json',
    url: "?p=load",
    async: false,
    data: {
        load: "selectfuellog",
        fuellogid: fuellogid,
    },
        success: function(response) {

            $('#updateModal').modal('show');

            $('#updateid').val(response['fuellogid']);
            $('#driverid1').val(response['driverid']);
            $('#vehicleid1').val(response['vehicleid']);
            $('#amountoffuel1').val(response['amountoffuel']); 
            $('#triplocation1').val(response['triplocation']);
            $('#fuellogdate1').val(response['fuellogdate']);

        },

    });


    $('#updateAnnouncementModal').modal('show'); 
}


function del(fuellogid)
{

    $.ajax({
    type: "POST",
    dataType: 'json',
    url: "?p=load",
    async: false,
    data: {
        load: "selectfuellog",
        fuellogid: fuellogid,
    },
        success: function(response) {

            $('#deleteModal').modal('show');

            $('#deleteid').val(response['fuellogid']);
            $('#namespan').text(response['fuellogid']);
             
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



$.ajax({
    type: "POST",
    url: "?p=load",
    async: true,
    data: {
        load: "selectdrivers",
    },
    success: function(data) {

        var data = JSON.parse(data);
        var dropdown = $('#driverid');
        var dropdown1 = $('#driverid1');
            
        dropdown.empty();
        dropdown1.empty();

        $.each(data, function(index) {
            var val = data[index].fullname;
            var id = data[index].driverid;
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


$.ajax({
    type: "POST",
    url: "?p=load",
    async: true,
    data: {
        load: "selectvehicles",
    },
    success: function(data) {

        var data = JSON.parse(data);
        var dropdown = $('#vehicleid');
        var dropdown1 = $('#vehicleid1');
            
        dropdown.empty();
        dropdown1.empty();

        $.each(data, function(index) {
            var val = data[index].vehiclename;
            var id = data[index].vehicleid;
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