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

            $('#numberofdrivers').text(response['numberofdrivers']);
            $('#numberofvehicles').text(response['numberofvehicles']); 
            $('#numberofusers').text(response['numberofusers']);
            $('#numberoflogs').text(response['numberoflogs']); 
        },

    });
}

loadData();

setInterval(function(){ 
	loadData();
}, 5000);