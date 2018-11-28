$( document ).ready(function() {

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

var run = false;

function create_form(elem, id, facture){

    var divForm = $(elem).parent().parent();
    if(run == false){

        show_form(divForm, id, facture);
        

    }else if(run == true){

        empty_form(divForm);
        
    }
}


function empty_form (elem){

    elem.children('form').remove();
    run = false;

}

function show_form(elem, id, facture){


    var divForm = elem;
    var formulaire = document.createElement('form');
    formulaire.setAttribute("method", "post");;
    formulaire.setAttribute("action","/Repondre/?user=" + id + "&facture=" + facture); 
    formulaire.setAttribute("class", "col-12 p-0");
    var fg = document.createElement('div');
    fg.setAttribute("class", "form-group col-12 mt-3");
    var fgb = document.createElement('div');
    fgb.setAttribute("class", "form-group col-12 d-flex justify-content-end");
    var msg = document.createElement('textarea');
    msg.setAttribute("row", 2);
    msg.setAttribute("class", "col-12 rounded");
    msg.setAttribute("name", "message");
    msg.style.width = "100%";
    var btn = document.createElement('button');
    btn.setAttribute("type","submit");
    btn.setAttribute("class", "btn");
    btn.innerHTML = "Envoyer";
    fg.appendChild(msg);
    formulaire.appendChild(fg);
    fgb.appendChild(btn);
    formulaire.appendChild(fgb);
    divForm[0].appendChild(formulaire);

    run = true;

}

});