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

    ],
    "order": [[ 0, "asc" ]]
            
});

