
$('#loginform').validate({ // initialize the plugin
    onfocusout: false,
    rules: {
 
        username: {
            required: true,
        },
        password: {
            required: true,
        },


    },
    submitHandler: function (form) { 

        var formData = new FormData(form);
        formData.append('action', 'login');
        
        $.ajax({
            type: "POST",
            url: "?p=action",
            async: true,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {

                if (data == 1)
                {
                    window.location.replace("?p=dashboard");
                }
                else if (data == 2)
                {
                    window.location.replace("?p=select-areas");
                }
                else
                {
                    swal("Login Failed!", "Please login again.", "error");
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
