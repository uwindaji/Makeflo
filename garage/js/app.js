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

        for(var s = 0; s < data[i].length; s++) {
        
            $('#select').append('<option value="' + data[i][s].id_appointement + '">' + data[i][s].app +'</option>');

        }
    }
}