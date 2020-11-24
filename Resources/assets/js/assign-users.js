populateselect();

var table = $('#maintable').DataTable( {

    "ajax": {
        "url": "?p=load",
         "type": "POST",
         "dataSrc": "",
         "data" : {
            "load" : "selectpumpstationsusers",
            "pumpid": get['pumpid'],
        }
    },
    "columns": [
        { "data": "pumpingstationuserid" },
        { "data": "fullname" },
        {
            "data": null ,
            "render" : function ( data, type, full ) 
            {
            	var button = "";
            	button += "<button type='button' class='btn btn-icon btn-danger m-1' data-toggle='tooltip' data-placement='top' title='Delete' onclick='del(" + data['pumpingstationuserid'] + ")'><i class='bx bx-trash-alt'></i></button>";
            	return button;
            }
        },
    ],
    "order": [[ 0, "asc" ]]
            
});


$('#createForm').validate({ 
    onfocusout: false,
    rules: {
 
        userid: {
            required: true,
        },

    },
    submitHandler: function (form) { 

        var formData = new FormData(form);
        formData.append('pumpid', get['pumpid']);
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
        formData.append('submit', 'deletepumpstationuser');

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



function del(id)
{

    $.ajax({
    type: "POST",
    dataType: 'json',
    url: "?p=load",
    async: false,
    data: {
        load: "selectpumpstationuser",
        pumpingstationuserid: id,
    },
        success: function(response) {

            $('#deleteModal').modal('show');

            $('#deleteid').val(response['pumpingstationuserid']);
            $('#namespan').text(response['fullname']);
             
        },

    });

}

$("#createModal").on('show.bs.modal', function(){
    populateselect();
    $('#createForm').trigger("reset");
});




function populateselect()
{
    $.ajax({
    type: "POST",
    url: "?p=load",
    async: true,
    data: {
        load: "selectusersavailable",
        pumpid: get['pumpid'],
    },
    success: function(data) {

        var data = JSON.parse(data);
        var dropdown = $('#userid');
        var dropdown1 = $('#userid1');
            
        dropdown.empty();
        dropdown1.empty();
        
        dropdown.append('<option disabled="" selected>Please Select</option>');
        dropdown1.append('<option disabled="" selected>Please Select</option>');

        $.each(data, function(index) {

            if (data[index].usertype == 'USER') 
            {
                var val = data[index].fullname;
                var id = data[index].userid;
                selected = "";
                if(data[index].isDefault == '1')
                {
                    selected = "selected";
                }
                dropdown.append("<option " + selected +  " value='" + id + "' >" + val + "</option>");
                dropdown1.append("<option " + selected +  " value='" + id + "' >" + val + "</option>");
            } 

        });
    
    }

});
}