$('.remove').removeClass('day');


function getDate(date){



    $('#date').val(date);
    url= "http://localhost/garage/index.php?rec=Appoint&date=" + date;

    $.get(url, function( data ) {

        data = JSON.parse(data);
        
        insertSelect(data)

        
    });

}

function insertSelect(data){

    $("#select").empty();
    $('#select').append('<option value="">Select hour</option>');
    for(var i = 0; i < data.length; i++) {
        
        $('#select').append('<option value="' + data[i].id_appointement + '">' + data[i].app +'</option>');
    }
}