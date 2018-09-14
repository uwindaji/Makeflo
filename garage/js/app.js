$('.remove').removeClass('day');


function getDate(date, session){



    $('#date').val(date);
    url= "http://localhost/garage/index.php?rec=Appoint";

    $.get(url, function( data ) {
        console.log(data);
    });

}