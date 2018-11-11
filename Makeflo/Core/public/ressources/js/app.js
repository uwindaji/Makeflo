

$('#dropSelect').css('display', 'none');
$('#projectSelect').css('display', 'none');

$("#searchUser").keyup(()=>{

    hide_elem();
    vider('#projectSelect');
    $('#dropSelect').empty();
    var i = 0;
    var $val = $("#searchUser").val();

    var url= "/Search/?val=" + $val;

    $.get(url, function( data ) {
        
        data = JSON.parse(data);
        if(data){
            
            for(i = 0; i<data.length; i++){
                if(data[i].mail){

                    mail = "'" + data[i].mail +"'";

                    $('#dropSelect').css('display', 'block');
                    
                    $('#dropSelect').append('<sapn class="col-12" onclick="filling(' + mail + ')" onmouseover="mOn(this)" onmouseleave="mOut(this)" >' + data[i].mail+ '</span></br>');
                    
                }
            }
        }
    });
});

function filling (mail){

    $("#searchUser").val(mail);
    $('#dropSelect').empty();
    $('#dropSelect').css('display', 'none');

    create_select_project(mail);
}

function create_select_project(mail){

    var i = 0;

    var url= "/SearchProject/?val=" + mail;

    $.get(url, function( data ) {

        data = JSON.parse(data);
        if(data){
            
            for(i = 0; i<data.length; i++){
                if(data[i].nom){

                    id =data[i].id_project;

                    $('#projectSelect').css('display', 'block');
                    
                    $('#projectSelect').append('<option value=' + id + '  >' + data[i].nom+ '</option>');
                    
                }
            }
        }
    });

}


function mOn (elem) {

    $(elem).css('color', '#e96656');
    $(elem).css('cursor','pointer');
}

function mOut (elem) {

    $(elem).css('color', '#000000');
}

function hide_elem(){

    var dropSelect = $("#dropSelect").val();

    if(dropSelect === ""){

        $('#dropSelect').css('display', 'none');
        $('#projectSelect').css('display', 'none');
    }    
}

function vider(elem) {


    $(elem).empty();
}


function check_submit(msg){


    if(confirm(msg))
    return true;
    else
    return false;


}

function desabled(){


    return false;
}