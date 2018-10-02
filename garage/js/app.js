
var path = "http://localhost/garage/index.php";
// to see with agenda view ___________________________________________________________________________ to verified tomorow
$('.remove').removeClass('day');

//======================================= Agenda functions ===========================================//

/**
 * function getDate
 * search date to select of modal in agenda send data to insertSelect function 
 * @param {string} date 
 */
function getDate(date){
    
    $('#date').val(date);
    url= path + "?rec=Appoint&date=" + date;

    $.get(url, function( data ) {
        data = JSON.parse(data);
        insertSelect(data)
    });

}

/**
 * function insertSelect
 * ceate select option in modal of agenda
 * @param {array} data 
 */
function insertSelect(data){

    $("#select").empty();
    $('#select').append('<option value="">Select hour</option>');
    for(var i = 0; i < data.length; i++) {

        for(var s = 0; s < data[i].length; s++) {
        
            $('#select').append('<option value="' + data[i][s].id_appointement + '">' + data[i][s].app +'</option>');

        }
    }
}

//================================= Mend functions ==================================================//


$("#searchMend").keyup(()=>{

    $('#dropSelect').empty();
    var i = 0;
    var $val = $("#searchMend").val();

    var url= path + "?req=Search&val=" + $val;

    $.get(url, function( data ) {
        data = JSON.parse(data);
        //console.log(data);
        if(data){
            
            for(i = 0; i<data.length; i++){
                if(data[i].first_name){
                    $('#dropSelect').append('<sapn class="mend-span" onclick="filling(' + data[i].id_customer + ')" onmouseover="mOn(this)" onmouseleave="mOut(this)" >' + data[i].mail+ '</span></br>');
                    $(".mend-span").css('color', '#522401');
                }
            }
        }
    });
});

function mOn (elem) {

    $(elem).css('color', '#ff7811');
    $(elem).css('cursor','pointer');
}

function mOut (elem) {

    $(elem).css('color', '#522401');
}

function filling (elem){



    var url= path + "?req=CarsCustomer&val=" + elem;
    $("#searchMend").val(elem);
    $('#dropSelect').empty();
    window.location = url;
}