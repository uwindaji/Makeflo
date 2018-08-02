
function  AddDemarque () {

    var   code, qt, raison;

    this.init = function () {

        //initial();
        evenement();
        
    };

    var evenement = function () {

        $('#submit-AddDemarque').on('click', function (event) {

            event.stopPropagation();
            event.preventDefault();
            checkData();
        });
    };

    var checkData = function () {

        code = $('#code').val();
        qt =  $('#qt').val();
        raison =  $('#raison').val();

        if (code === '' ) {

            $('#code').css( "background-color", orange );
            elemFocus('#code');
            msg.init('alert', 'Champs Code EAN est vide')

        } else if (qt === '') {

            $('#qt').css( "background-color", orange );
            elemFocus('#qt');
            msg.init('alert', 'Champs Quantité est vide')

        } else if (raison === '') {

            $('#raison').css( "background-color", orange );
            elemFocus('#raison');
            msg.init('alert', 'Champs Raison est vide')

        }  else {

            sendData();
            vide();
        }
    };

    var sendData = function () {

        var form_data = new FormData();

        form_data.append('code', code);
        form_data.append('qt', qt);
        form_data.append('raison', raison);
        form_data.append('request', 'AddDemarque');
        $.ajax({
            url: './php/index.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (result) {
                // alert(result);   
            }
        });
    };

        //methode pour vider formulaire
    var vide = function () {

        var i = 0;
        var input = $('input');

        for (i = 0; i < input.length; i += 1) {

            input[i].value = "";
        }


    };

    var elemFocus = function (elem){

            $(elem).on('focus', function () {
                $(elem).css('background-color', 'white');
                
            });
    }


    var initial = function () {

        var form_data = new FormData();
        form_data.append('request', 'initAddArticle');
        $.ajax({
            url: './php/index.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (result) {
                //alert(result);   // recuperation select en format json
            }
        });
    }



}

var adddemarque= new AddDemarque();
    adddemarque.init();