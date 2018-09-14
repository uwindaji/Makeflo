$('.remove').removeClass('day');


function getDate(date){



    $('#date').val(date);
    url= "http://localhost/garage/index.php?rec=Appoint&date=" + date;

    $.get(url, function( data ) {

        data = JSON.parse(data);
        console.log(data);
        for(var i = 0; i < data.length; i++) {
            
            $('#select').append('<option value="' + data[i].id_appointement + '">' + data[i].app +'</option>');
        }

        
    });

}