function loadData()
{
	$.ajax({
    type: "POST",
    dataType: 'json',
    url: "?p=load",
    async: false,
    data: {
        load: "selectdashboard",
    },
        success: function(response) {

        },

    });
}

loadData();

setInterval(function(){ 
	loadData();
}, 5000);