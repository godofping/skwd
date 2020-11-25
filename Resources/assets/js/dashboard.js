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


            $('#dataentries').text(response['dataentries']);
            $('#users').text(response['users']); 
            $('#areas').text(response['areas']);
            $('#pumpstations').text(response['pumpstations']); 
        },

    });
}

loadData();

setInterval(function(){ 
	loadData();
}, 5000);